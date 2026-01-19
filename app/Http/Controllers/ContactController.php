<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request){
        // dd($request->all());
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        $notification = array(
            'message' => 'Contact message sent successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function view(){
        // dd('ok');
        $contacts = Contact::all();
        return view('backend.contact.contact_list',compact('contacts'));
    }

    public function deletecontact($id){
        // dd('ok');
        $contact = Contact::find($id);
        $contact->delete();
        $notification = array(
            'message' => 'Contact message deleted successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
