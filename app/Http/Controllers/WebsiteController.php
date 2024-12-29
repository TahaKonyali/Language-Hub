<?php

namespace App\Http\Controllers;

use App\Models\ContactQuery;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return view('home.index');
    }


    public function contact(){
        return view('contact.index');
    }


    public function storeContactQuery(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        try {
            $contact_query = new ContactQuery;
            $contact_query->name = $request->name;
            $contact_query->email = $request->email;
            $contact_query->message = $request->message;
            $contact_query->save();

            return redirect()->back()->withErrors(['success' => 'Query sent. Our team will contact you shortly.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['danger' => $e->getMessage()]);
        }
    }
}
