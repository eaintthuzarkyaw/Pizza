<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // contact page
    public function contactPage()
    {
        return view('user.contact.contactPage');
    }

    // contact
    public function contact(Request $request)
    {
        $contact = $this->getContactData($request);
        $this->accountValidationCheck($request);
        Contact::create($contact);
        return back()->with(['success' => 'Thanks for your message.']);
    }


    private function getContactData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ];
    }

    //contact validation check
    private function accountValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ])->validate();
    }

    // // account validation check
    // private function accountValidationCheck($request)
    // {
    //     Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required',
    //         'message' => 'required',
    //     ])->validate();
    // }
}