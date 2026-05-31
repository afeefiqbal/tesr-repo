<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\SiteInformation;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\ProductCategory;
use App\Models\SectionHeading;

if (!function_exists('loggedUserName')) {
    function loggedUserName() {
        $logged = Auth::guard('admin')->user();
        if($logged){
            $user = Admin::find($logged->user_id);
            if($user){
                return $user->name;
            }
        }
    }
}

if (!function_exists('loggedUserProfileImage')) {
    function loggedUserProfileImage() {
        $logged = Auth::guard('admin')->user();
        $image = asset('app/dist/img/user-default.png');
        if($logged && $logged->profile_image!=NULL){
            $image = asset($logged->profile_image);
        }
        return $image;
    }
}

if (!function_exists('sitePrefix')) {
    function sitePrefix() {
        return strtolower('admin/');
    }
}


if (!function_exists('loggedUserType')) {
    function loggedUserType() {
        return strtolower(Auth::guard('admin')->user()->user_type);
    }
}

if (!function_exists('SendContactMail')) {

    function SendContactMail($contact)
    {
        $siteInfo = Contact::first();
        $data = array(
            'name' => $contact->first_name.' '.$contact->last_name,
            'email_id' => $contact->email,
            'phone' => $contact->phone,
            'content' => $contact->comments,
            'site_name' => config('app.name')
        );
        Mail::send('mail_template.contact_enquiry', $data, function ($message) use($siteInfo,$contact) {
            $message->to(array(
                $siteInfo->email_id => $siteInfo->email_recepient
            ));
            $message->subject('Contact Enquiry');
        });
        return true;
    }
}

if (!function_exists('sendContactReply')) {

    function sendContactReply($enquiry)
    {
        $data = array(
            'name' => $enquiry->first_name.' '.$enquiry->last_name,
            'content' => $enquiry->comments,
            'reply' => $enquiry->reply,
            'site_name' => config('app.name')
        );
        Mail::send('mail_template.contact_enquiry_reply', $data, function ($message) use($enquiry) {
            $message->to(array(
                $enquiry->email => $enquiry->first_name
            ));
            $message->subject(config('app.name') . ' - Contact Enquiry Reply');
        });
        return true;
    }
}

if (!function_exists('SendQuoteMail')) {

    function SendQuoteMail($contact)
    {
        $siteInfo = Contact::first();
        $data = array(
            'name' => $contact->first_name.''.$contact->last_name,
            'email_id' => $contact->email,
            'phone' => $contact->phone,
            'content' => $contact->message,
            'productImage' => asset($contact->product_image),
            'site_name' => config('app.name')
        );
        Mail::send('mail_template.quote_enquiry', $data, function ($message) use($siteInfo,$contact) {
            $message->to(array(
                $siteInfo->email_id => $siteInfo->email_recepient
            ));
            $message->subject(config('app.name') . ' - Quote Enquiry');
        });
        return true;
    }
}

if (!function_exists('sendQuoteReply')) {

    function sendQuoteReply($enquiry)
    {
        $data = array(
            'name' => $enquiry->first_name.''.$enquiry->last_name,
            'content' => $enquiry->message,
            'reply' => $enquiry->reply,
            'site_name' => config('app.name')
        );
        Mail::send('mail_template.quote_enquiry_reply', $data, function ($message) use($enquiry) {
            $message->to(array(
                $enquiry->email => $enquiry->first_name
            ));
            $message->subject(config('app.name') . ' - Replay for the Quote Enquiry');
        });
        return true;
    }
}

if (!function_exists('ForgotMail')) {
    function ForgotMail($contact)
    {
        $data = array(
            'name' => $contact->first_name.''.$contact->last_name,
            'link' => $link,
            'site_name' => config('app.name'),
        );
        Mail::send('mail_template.forgot_password', $data, function ($message) use($user){
            $message->to(array(
                $contact->email => $contact->first_name
            ));
            $message->subject(config('app.name') . ' - Reset Password Notification');
        });
        return true;
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file, $fileName = null, $location)
    {
        if (!File::exists(public_path($location))) {
            mkdir(public_path($location), 0777, true);
        }
        if ($fileName == null) {
            list($name, $ext) = explode('.', $file->getClientOriginalName());
            $fileName = $name;
        }
        $fileName = str_replace(' ', '-', strtolower($fileName));
        $fileName = preg_replace('/[^A-Za-z0-9\-]/', '-', $fileName) . '.' . $file->getClientOriginalExtension();
        $fileName = str_replace('--', '-', $fileName);
        $target = $location . $fileName;
        if (File::exists(public_path($target))) {
            $increment = 0;
            list($name, $ext) = explode('.', $fileName);
            while (File::exists(public_path($target))) {
                $increment++;
                $fileName = str_replace(' ', '', strtolower($name));
                $fileName = preg_replace('/[^A-Za-z0-9\-]/', '-', $fileName) . '-' . $increment . '.' . $ext;
                $fileName = str_replace('--', '-', $fileName);
                $target = $location . $fileName;
            }
        }
        $file->move(public_path($location), $fileName);
        return $target;
    }
}

if (!function_exists('limit_text')) {
    function limit_text($text, $limit) {
        $text = strip_tags($text);
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
}

if( !function_exists('categories')) {
    function categories($type, $id=NULL, $i=NULL, $flag=NULL){
        if($id==NULL){
            $i=0;
            $parentCategories = ProductCategory::where([['status','active'],['parent_id',0]])->latest()->get();
        }else{
            $parentCategories = ProductCategory::where([['status','active'],['parent_id',$id]])->latest()->get();
        }
        $specialClass=$toggleMenu=$mobileDownArrow='';
        if($type=="mobile"){
            $specialClass='Mobile';
            $toggleMenu = 'data-bs-toggle="dropdown"';
            $mobileDownArrow = '<svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.6813 5.21379L7.86788 2.0272C8.21071 1.68438 8.21071 1.13071 7.86788 0.787882C7.52505 0.445055 6.97138 0.445055 6.62856 0.787882L4.06249 3.35566L1.49643 0.787882C1.1536 0.445054 0.599933 0.445054 0.257105 0.787882C-0.0857229 1.13071 -0.085723 1.68438 0.257105 2.0272L3.44369 5.21379C3.7848 5.5549 4.34018 5.5549 4.6813 5.21379Z" fill="#6D737A"/>
            </svg>';
        }
        if($parentCategories->isNotEmpty()){
            foreach($parentCategories as $parentCategory){?>
                <li>
                    <a id="testSeriesUpsc<?=$specialClass;?>Menu<?=$i?>" class="dropdown-item <?=($flag==NULL)?'dropdown-itemSubmenu':'';?>" <?=$toggleMenu;?> href="<?=url('service/'.$parentCategory->short_url);?>">
                        <?=$parentCategory->title;?>
                        <?=$mobileDownArrow;?>
                    </a>
                    <?php if($parentCategory->sub->isNotEmpty()){?>
                        <ul class="submenu dropdown-menu">
                            <?php categories($type, $parentCategory->id, $i, 1);?>
                        </ul>  
                    <?php }?>
                </li>
            <?php $i++;}
        }
    }
}

if(!function_exists('headingContent')) {
    function headingContent($section){
        return SectionHeading::where('section', $section)->first();
    }
}

