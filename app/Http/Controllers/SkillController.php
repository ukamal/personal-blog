<?php

namespace App\Http\Controllers;

use App\Models\UserSkill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function view(){
        $allData = UserSkill::orderBy('id','desc')->paginate('4');
        return view('backend.skill.view_skill',compact('allData'));
    }

    public function add(){
          return view('backend.skill.add_skill');
    }

    public function store(Request $request){
        // dd($request->all());

        $validateData = $request->validate([
            'name' => 'required',
            'percent' => 'required',
        ]);

        UserSkill::insert([
            'name' => $request-> name,
            'percent' => $request-> percent,
        ]);

        $notification = array(
            'message' => 'Skill added successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('view_skill')->with($notification);
    }

    public function edit($id){
        // dd('ok');
        $editData = UserSkill::find($id);
        return view('backend.skill.edit_skill',compact('editData'));
    }

    public function update(Request $request, $id){
        // dd('ok');
        $validateData = $request->validate([
            'name' => 'required',
            'percent' => 'required',
        ]);

         UserSkill::find($id)->update([
            'name' => $request-> name,
            'percent' => $request-> percent,
        ]);

        $notification = array(
            'message' => 'Skill update successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('view_skill')->with($notification);

    }

   public function deleteSkill($id){
        $deleteData = UserSkill::find($id);
    
        UserSkill::find($id)->delete();

        $notification = array(
            'message' => 'Skill deleted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('view_skill')->with($notification);
   }

}
