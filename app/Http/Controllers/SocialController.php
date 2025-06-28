<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function view(){
        // dd('ok');
        return view('backend.social.view_social');
    }

    public function add(){
        // dd('ok');
        return view('backend.social.add_social');
    }


}
