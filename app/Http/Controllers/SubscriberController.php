<?php

namespace App\Http\Controllers;

use App\Http\Requests\FooterSubscribeRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(FooterSubscribeRequest $request) {
        $data = $request->validated();
        Subscriber::create($data);
        return back()->withErrors($data, 'subscribe')->with('status' , 'subscribed successfully');
    }
}
