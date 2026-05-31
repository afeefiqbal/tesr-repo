<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Product;
use Session;

class ProductBulkExport implements FromView
{
    public function view(): View
    {
        $productList = Product::get();
        return view('backend/products/product/product_excel', [
            'productList' => $productList
        ]);
    }
}
