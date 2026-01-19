<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function view(){
        $alData = Comment::all();
        return view('backend.comment.comment_list',compact('alData'));
    }

    public function store(Request $request){
        // dd('ok');
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'message' => 'required',
        ]);

        $data = new Comment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->website = $request->website;
        $data->message = $request->message;
        $data->status = 0;
        $data->save();
        
        $notification = array(
            'message' => 'Comment sent successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification); 
    }

    public function deleteComment($id){
        $deleteData = Comment::find($id);
        $deleteData->delete();

        $notification = array(
            'message' => 'Comment deleted successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification); 
    }

    public function status($id){
        $status = Comment::find($id);
        if($status->status == 1){
            $status->status = 0;
            $status->update();
        }else{
            $status->status = 1;
            $status->update();
        }

        $notification = array(
            'message' => 'Status updated successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


}
