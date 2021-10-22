<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function index(): View
    {
        return view('contacts.index');
    }

    public function store()
    {
        $body = $this->validate(request(), [
            'email' => [
                'required',
                'regex:/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i'
            ],
            'message' => ['required', 'min:5', 'max:500'],
        ]);
        Contact::create($body);
        return redirect('/');
    }
}
