<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => array(
                'required',
                'regex:/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i'
            ),
            'message' => array('required', 'min:5', 'max:500'),
        ]);
        Contact::create(array(
            'email' => request('email'),
            'message' => request('message'),
        ));
        return redirect('/');
    }
}
