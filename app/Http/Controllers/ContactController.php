<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function create() {
        return view('theme.contact');
    }
    public function store(StoreContactRequest $request) {
        $data = $request->validated();
        Contact::create($data);

        return back()->with('status', 'Your message has been sent successfully');
    }
}
