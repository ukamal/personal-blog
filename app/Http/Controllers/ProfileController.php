<?php

namespace App\Http\Controllers;

use Image;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.layouts.profile.profile',compact('userData'));
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request, $id): RedirectResponse
    // {
    //     dd($id);

    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }


    public function update(Request $request, $id){
        // dd($request->all());

        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $userData = User::findOrFail($id);
        $userData->name = $request->name;
        $userData->description = $request->description;

        if($request->hasFile('image')){
            if($userData->image && File::exists(public_path($userData->image))){
                File::delete(public_path($userData->image));
            }
        
            $image = $request->file('image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            $path = public_path('backend/assets/images/' . $filename);
            Image::make($image)->fit(300,300)->save($path);
            $userData->image = 'backend/assets/images/' . $filename;
        }



        $userData->save();
        return redirect()->back();
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function PasswordChange(){
        // dd('ok');
        return view('backend.admin.password-change');
    }

    public function UpdatePassword(Request $request){
        // dd('ok');
        $request->validate([
            'oldpassword' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashPassword)){
            $user = Auth::user();
            $user->password = bcrypt($request->new_password);
            $user->save();

            Auth::logout(); // log out the user

            $notification = array(
                'message' => 'Password changed successfully! Please login again.',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        } else {
            return back()->with([
                'message' => 'Oops! The current password is incorrect.',
                'alert-type' => 'error'
            ]);
        }

    }


}
