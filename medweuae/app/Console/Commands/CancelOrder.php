<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\CronTest;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\OrderCustomer;
use App\Models\OrderProduct;
use App\Models\Contact;
use App\Models\ShippingCharge;
use App\Models\OrderCoupon;
use App\Models\CreditPoint;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\DB;

class CancelOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancelOrder:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pendingOrders = OrderLog::where('status','Pending')->latest()->get();
        if($pendingOrders->isNotEmpty()){
            foreach($pendingOrders as $orderL){
                $orderTime = $orderL->created_at;
                $order_product_id = $orderL->order_product_id;
                if($order_product_id){
                    DB::beginTransaction();
                    $orderLog = new OrderLog;
                    $orderLog->order_product_id = $order_product_id;
                    $orderLog->status = 'Cancelled';
                    if($orderLog->save()){
                        $orderProduct = OrderProduct::find($order_product_id);
                        if($orderProduct){
                            $order = Order::find($orderProduct->order_id);
                            $orderCustomer = OrderCustomer::where('order_id',$orderProduct->order_id)->first();
                            $cartProducts = OrderProduct::where('order_id',$orderProduct->order_id)->get();
                            $valid = $couponValid = true;
                            $siteInformation = Contact::first();
                            $orderSubTotal = Order::getActiveProductTotal($orderProduct->order_id);
                            $orderProductTotal = $orderSubTotal = $tax_amount = 0;
                            if($siteInformation->tax!=0){
                                $tax_amount = $orderSubTotal*$siteInformation->tax/100;
                                if($siteInformation->tax_type=="Outside"){
                                    $orderSubTotal = $orderSubTotal+$tax_amount;
                                }
                            }
                            $shippingAmount = 0;
                            if($orderCustomer->user_type=="User"){
                                $customer = CustomerAddress::find($orderCustomer->address_id);
                                if($customer){
                                    $shippingAmount = ShippingCharge::getShippingCharge($customer->country,$customer->state,$orderProductTotal);
                                }
                            }else{
                                if($orderCustomer->country_id && $orderCustomer->state_id){
                                    $shippingAmount = ShippingCharge::getShippingCharge($orderCustomer->country_id,$orderCustomer->state_id,$orderProductTotal);
                                }
                            }
                            $coupon = OrderCoupon::where([['order_id',$orderProduct->order_id],['status','Active']])->first();
                            if($coupon!=NULL){
                                $valid = $second_valid = $third_valid = $fourth_valid = $minimum_valid = $maximum_valid = true;
                                if($coupon->minimum_spend!='0.00'){
                                    if($coupon->minimum_spend<=$orderProductTotal){
                                        $minimum_valid = true;
                                    }else{
                                        $minimum_valid = false;
                                    }
                                }
                                if($coupon->maximum_spend!='0.00'){
                                    if($coupon->maximum_spend>=$orderProductTotal){
                                        $maximum_valid = true;
                                    }else{
                                        $maximum_valid = false;
                                    }
                                }
                                if($minimum_valid==true && $maximum_valid==true){
                                    $excludedProductList = $productCharge = $includedProducts = [];
                                    $includedProductCost = $excludedProductCost = $proNotSaved = [];
                                    foreach($cartProducts as $product){
                                        if($orderL->status=="Cancelled" || $orderL->status=="Refunded" || $orderL->status=="Failed"){
                                            $quantity = $productData->stock+$product->quantity;
                                            $productData->stock = ($quantity>0)?$quantity:'0';
                                            if($productData->stock==0){
                                                $productData->quantity = 'Out of stock';
                                            }else{
                                                $productData->quantity = 'Instock';
                                            }
                                            if($productData->save()){
                                                $proSaved = 1;
                                            }else{
                                                $proNotSaved = 1;
                                            }
                                        }
                                    }
                                    if($orderSubTotal!=0 && empty($proNotSaved)){
                                        if(!empty($includedProducts)){
                                            if(count($excludedProductList)>0){
                                                $third_valid = false;
                                            }
                                        }
                                        if($third_valid==false){
                                            if($coupon->type=="Fixed"){
                                                $disabled = true;
                                            }else{
                                                if(count($includedProductCost)>0){
                                                    $coupon_value = array_sum($includedProductCost)*$coupon->coupon_value/100;
                                                }else{
                                                    $coupon_value = $orderSubTotal*$coupon->coupon_value/100;
                                                }
                                                $final_amount_after_coupon = $orderSubTotal - $coupon_value;
                                                $fourth_valid = true;
                                            }
                                        }else{
                                            if($coupon->type=="Fixed"){
                                                $coupon_value = $coupon->coupon_value;
                                                if(count($includedProductCost)>0){
                                                    $final_amount_after_coupon = array_sum($includedProductCost) - $coupon_value;
                                                }else{
                                                    $final_amount_after_coupon = $orderSubTotal - $coupon_value;
                                                }
                                            }else{
                                                if(count($includedProductCost)>0){
                                                    $coupon_value = array_sum($includedProductCost)*$coupon->coupon_value/100;
                                                }else{
                                                    $coupon_value = $orderSubTotal*$coupon->coupon_value/100;
                                                }
                                                $final_amount_after_coupon = $orderSubTotal - $coupon_value;
                                            }
                                            $fourth_valid = true;
                                        }
                                        if($fourth_valid == true){
                                            $couponValid = true;
                                            $disabled = false;
                                        }else{
                                            $disabled = true;
                                        }
                                    }else{
                                        $disabled = true;
                                    }
                                }else{
                                    $disabled = true;
                                }
                                if($disabled==true){
                                    $couponValid = true;
                                }
                            }
                            if($couponValid == true){                    
                                if($order->save()){
                                    $valid = true;
                                }else{
                                    $valid = false;    
                                }
                                if($order->orderCustomer->user_type=="User"){
                                    $orderData = Order::with(['orderProducts'=>function($t){
                                        $t->with('productData');
                                    }])->with(['orderCustomer'=>function($c) use ($orderCustomer){
                                        $c->with('customerData');
                                        $c->with('CustomerAddressData');
                                        $c->where('customer_id','=',$orderCustomer->customer_id);
                                    }])->with('orderCoupon')->find($orderProduct->order_id);
                                }else{
                                    $orderData = Order::with(['orderProducts'=>function($t){
                                        $t->with('productData');
                                    }])->with('orderCustomer')->with('orderCoupon')->find($orderProduct->order_id);
                                }
                                $produtName = $orderProduct->productData->title;                         
                                $orderMail = Order::sendOrderStatusMail($orderData,'Failed',$produtName);
                                $statusReturn = true;
                                $orderPoints = CreditPoint::where('order_id',$order->id)->first();
                                if($orderPoints){
                                    $orderPoints->status='Inactive';                            
                                    if($orderPoints->save()){
                                        $statusReturn = true;
                                    }else{
                                        $statusReturn = false;
                                    }
                                }
                                if($statusReturn == true){
                                    DB::commit();
                                    echo "Success";
                                }else{
                                    DB::rollBack();
                                    echo "Error";
                                }
                            }else{
                                DB::rollBack();
                                echo "Error";
                            }
                        }
                    }else{
                        DB::rollBack();
                        echo "Error";
                    }
                }else{
                    echo "Not found";
                }
            }
        }
    }
}
