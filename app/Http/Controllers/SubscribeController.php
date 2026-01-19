<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required',
        ]);

        $data = new Subscribe();
        $data->email = $request->email;
        $data->save();
        return redirect()->back()->with('success', 'Successfully Subscribed!');
    }

    public function viewSubscriber(){
        $subscribe = Subscribe::all();
        return view('backend.subscribe.subscribe_list',compact('subscribe'));
    }
}
