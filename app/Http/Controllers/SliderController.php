<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function view(){
        $allData = Slider::orderBy('id','desc')->paginate('4');
        return view('backend.slider.view_slider',compact('allData'));
    }

    public function add(){
          return view('backend.slider.add_slider');
    }

    public function store(Request $request){
        // dd($request->all());

        $validateData = $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'slider_image' => 'required',
        ]);

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(600,400)->save('upload/slider_image/'.$name_gen);
        $save_url = 'upload/slider_image/'.$name_gen;

        Slider::insert([
            'title' => $request-> title,
            'sub_title' => $request-> sub_title,
            'slider_date' => $request-> slider_date,
            'slider_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Slider added successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('view_slider')->with($notification);
    }

    public function edit($id){
        // dd('ok');
        $editData = Slider::find($id);
        return view('backend.slider.edit_slider',compact('editData'));
    }

    public function update(Request $request, $id){
        // dd('ok');
        $oldImag = $request->old_image;
        if($request->file('slider_image')){
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,400)->save('upload/slider_image/'.$name_gen);
            $save_url = 'upload/slider_image/'.$name_gen;

            if(file_exists($oldImag)){
                unlink($oldImag);
            }

            Slider::find($id)->update([
                'title' => $request-> title,
                'sub_title' => $request-> sub_title,
                'slider_date' => $request-> slider_date,
                'slider_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider update successfully.',
                'alert-type' => 'success',
            );

            return redirect()->route('view_slider')->with($notification);

        }else{
            Slider::find($id)->update([
                'title' => $request-> title,
                'sub_title' => $request-> sub_title,
                'slider_date' => $request-> slider_date,
            ]);

            $notification = array(
                'message' => 'Slider update without image successfully.',
                'alert-type' => 'success',
            );

            return redirect()->route('view_slider')->with($notification);
        }

    }

   public function deleteSubslider($id){
        $deleteData = Slider::find($id);
        $image = $deleteData->slider_image;

        unlink($image);

        Slider::find($id)->delete();

        $notification = array(
            'message' => 'Slider deleted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('view_slider')->with($notification);
   }

    

}
