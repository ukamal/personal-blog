<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function view(){
        // dd('ok');
        $countSocial = Social::count();
        $allData = Social::all();
        return view('backend.social.view_social',compact('allData','countSocial'));
    }

    public function add(){
        // dd('ok');
        return view('backend.social.add_social');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'facebook' => 'required',
            'linkedin' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
        ]);

        $data = new Social();
        $data->facebook = $request->facebook;
        $data->linkedin = $request->linkedin;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
        $data->save();

        return redirect()->route('view_social');

    }

    public function edit($id){
        // dd('ok');
        $updateData = Social::findOrFail($id);
        return view('backend.social.edit_social',compact('updateData'));
    }

    public function update(Request $request, $id){
        // dd('ok');
        $uddateData = Social::find($id);
        $uddateData->facebook = $request->facebook;
        $uddateData->linkedin = $request->linkedin;
        $uddateData->twitter = $request->twitter;
        $uddateData->youtube = $request->youtube;
        $uddateData->update();

        $notification = array(
           'message' => "Social updated successfully",
           'alert-type' => "success",
        );
        return redirect()->route('view_social')->with($notification);
    }

    public function deleteSocial($id){
         $deleteData = Social::find($id);
         $deleteData->delete();

        $notification = array(
           'message' => "Social delete successfully",
           'alert-type' => "success",
        );
        return redirect()->back()->with($notification);
    }

}
