<?php

namespace App\Http\Controllers;

use App\Models\SubMenu;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    public function view(){
        $allData = SubMenu::all();
        return view('backend.sub_menus.view_sub_menu',compact('allData'));
    }

    public function add(){
         return view('backend.sub_menus.add_sub_menu');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'sub_menu_name' => 'required',
        ]);

        $data = new SubMenu();
        $data->sub_menu_name = $request->sub_menu_name;
        $data->save();

        $notification = array(
            'alert-type' => 'SubMenu create successfully.',
            'message' => 'success'
        );
        return redirect()->route('view_sub_menu')->with($notification);
    }

    public function edit($id){
        $updateData = SubMenu::findOrFail($id);
        return view('backend.sub_menus.edit_sub_menu',compact('updateData'));
    }

    public function update(Request $request, $id){
        // dd('ok');
        $uddateData = SubMenu::find($id);
        $uddateData->sub_menu_name = $request->sub_menu_name;
        $uddateData->update();

        $notification = array(
           'message' => "SubMenu updated successfully",
           'alert-type' => "success",
        );
        return redirect()->route('view_sub_menu')->with($notification);
    }

    public function deleteSubMenu($id){
         $deleteData = SubMenu::find($id);
         $deleteData->delete();

        $notification = array(
           'message' => "SubMenu delete successfully",
           'alert-type' => "success",
        );
        return redirect()->back()->with($notification);
    }

}
