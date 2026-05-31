<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\ContactFormRequest;
use App\Models\Contact;
use App\Models\GetQuote;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function contact_list()
    {
        $title = "Contact List";
        $contactList = ContactFormRequest::orderBy('id', 'desc')->get();
        return view('app.contact_us.contact_list', compact('contactList', 'title'));
    }

    public function contact_view($id)
    {
        $title = "View Request";
        $contact = ContactFormRequest::find($id);
        return view('app.contact_us.contact_view', compact('contact', 'title'));

    }

    public function replay_to_contact(Request $request)
    {
        if (isset($request->replay) && $request->replay != null) {
            $contact = ContactFormRequest::find($request->id);
            if ($contact) {
                DB::beginTransaction();
                $contact->replay = $request->replay;
                $contact->replay_date = date('Y-m-d h:i:s');
                if ($contact->save()) {
                    if (SendContactReply($contact)) {
                        DB::commit();
                        echo (json_encode(array('status' => true, 'message' => 'Replay saved successfully')));
                    } else {
                        DB::rollBack();
                        echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                    }
                } else {
                    DB::rollBack();
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function delete_contact(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contact = ContactFormRequest::find($request->id);
            if ($contact) {
                $deleted = $contact->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function delete_multi_contact(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contactArray = explode(',', $request->id);
            $successArray = array();
            foreach ($contactArray as $con) {
                $contact = ContactFormRequest::find($con);
                $deleted = $contact->delete();
                if ($deleted == true) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                echo (json_encode(array('status' => true)));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function contact_page()
    {
        $key = "Update";
        $title = "Contact Page";
        $contact = Contact::first();
        return view('app.contact_us.contact_form',compact('key','title','contact'));
    }
    
    public function contact_page_store(Request $request)
    {
        if($request->id==0){
            $contact = new Contact;
        }else{
            $contact = Contact::find($request->id);
            $contact->updated_at = date('Y-m-d h:i:s');
        }
        $contact->email_id = ($request->email_id)??'';
        $contact->email_recepient = ($request->email_recepient)??'';
        $contact->whatsapp_number = ($request->whatsapp_number)??'';
        $contact->phone_number = ($request->phone_number)??'';
        $contact->alternate_phone_number = ($request->alternate_phone_number)??'';
        $contact->google_map = ($request->google_map)??'';
        $contact->address = ($request->address)??'';
        if($contact->save()){
            session()->flash('success', 'Contact page details has been updated successfully');
            return redirect(sitePrefix().'contact/page');
        }else{
            return back()->with('error', 'Error while updating the contact page details');
        }
    }

    public function site_information()
    {
        $key = "Update";
        $title = "Site Informations";
        $contact = Contact::first();
        return view('app.contact_us.site_form',compact('key','title','contact'));
    }
    
    public function site_information_store(Request $request)
    {
        if($request->id==0){
            $contact = new Contact;
        }else{
            $contact = Contact::find($request->id);
            $contact->updated_at = date('Y-m-d h:i:s');
        }
        $contact->facebook_url = ($request->facebook_url)?$request->facebook_url:'';
        $contact->instagram_url = ($request->instagram_url)?$request->instagram_url:'';
        $contact->twitter_url = ($request->twitter_url)?$request->twitter_url:'';
        $contact->linkedin_url = ($request->linkedin_url)?$request->linkedin_url:'';
        $contact->privacy_policy = ($request->privacy_policy)?$request->privacy_policy:'';
        $contact->terms_conditions = ($request->terms_conditions)?$request->terms_conditions:'';
        $contact->footer_text = ($request->footer_text)?$request->footer_text:'';
        if($contact->save()){
            session()->flash('success', 'Site information has been updated successfully');
            return redirect(sitePrefix().'site-information');
        }else{
            return back()->with('error', 'Error while updating the site information');
        }
    }
    
    public function quote_list()
    {
        $title = "Quote List";
        $contactList = GetQuote::orderBy('id', 'desc')->get();
        return view('app.contact_us.quote_list', compact('contactList', 'title'));

    }

    public function replay_to_quote(Request $request)
    {
        if (isset($request->replay) && $request->replay != null) {
            $contact = GetQuote::find($request->id);
            if ($contact) {
                DB::beginTransaction();
                $contact->reply = $request->replay;
                $contact->reply_date = date('Y-m-d h:i:s');
                if ($contact->save()) {
                    if (sendQuoteReply($contact)) {
                        DB::commit();
                        echo (json_encode(array('status' => true, 'message' => 'Replay saved successfully')));
                    } else {
                        DB::rollBack();
                        echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                    }
                } else {
                    DB::rollBack();
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function delete_quote(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contact = GetQuote::find($request->id);
            if ($contact) {
                $deleted = $contact->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function delete_multi_quote(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contactArray = explode(',', $request->id);
            $successArray = array();
            foreach ($contactArray as $con) {
                $contact = GetQuote::find($con);
                $deleted = $contact->delete();
                if ($deleted == true) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                echo (json_encode(array('status' => true)));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }
}
