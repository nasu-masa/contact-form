<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);

        $request->session()->put('contact_data', $contact);

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        if(!$request->session()->has('contact_data')) {
            return redirect('/contact')->with('error', 'もう一度入力してください');
        }

        $contact = $request->session()->get('contact_data');

        Contact::create($contact);

        $request->session()->forget('contact_data');

        return view('thanks');
    }

}