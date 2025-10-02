<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function view(){
        $allData = Menu::all();
        return view('backend.menus.view_menu',compact('allData'));
    }

    public function add(){
         return view('backend.menus.add_menu');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'menu_name' => 'required',
        ]);

        $data = new Menu();
        $data->menu_name = $request->menu_name;
        $data->save();

        $notification = array(
            'alert-type' => 'Menu create successfully.',
            'message' => 'success'
        );
        return redirect()->route('view_menu')->with($notification);
    }

    public function edit($id){
        $updateData = Menu::findOrFail($id);
        return view('backend.menus.edit_menu',compact('updateData'));
    }

    public function update(Request $request, $id){
        // dd('ok');
        $uddateData = Menu::find($id);
        $uddateData->menu_name = $request->menu_name;
        $uddateData->update();

        $notification = array(
           'message' => "Menu updated successfully",
           'alert-type' => "success",
        );
        return redirect()->route('view_menu')->with($notification);
    }

    public function deletemenu($id){
         $deleteData = Menu::find($id);
         $deleteData->delete();

        $notification = array(
           'message' => "Menu delete successfully",
           'alert-type' => "success",
        );
        return redirect()->back()->with($notification);
    }



}
