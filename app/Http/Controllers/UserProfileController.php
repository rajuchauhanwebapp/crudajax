<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function get_records()
    {
        $users = UserProfile::all();
        return response()->json([
            'user_list'=>$users
        ]);

    }

    public function create_profile_form()
    {
        return view('create');
    }

    public function create_profile(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required',
            'role'=> 'required',
            'profile_image'=> 'required|image',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status'=>'400',
                'message'=>$validated->getMessageBag()
            ]);
        }
        else {
            $user = new UserProfile();
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->role = $request->role;
            if ($request->hasFile('profile_image')) {
                $file_name = time().'.'. $request->file('profile_image')->extension();
                $request->file('profile_image')->move(public_path('profile_images'), $file_name);
            }
            $user->profile_image = 'profile_images/' . $file_name;
            $user->save();

            return response()->json([
                'status'=>'200',
                'message'=>'Account Create Successfully!!'
            ]);
        }
        
    }

    public function edit_profile($id)
    {
        $user = UserProfile::find($id);
        $context = [
            'user'=> $user,
        ];

        if ($user) {
            return response()->json([
                'status'=> 200,
                'user'=>$user
            ]);
        } else {
            return response()->json([
                'status'=>404,
                'message'=>'User Not Found!'
            ]);
        }
        

        // return view('update', $context);
    }
    
    public function update_profile(Request $request)
    {
        if ($request->hasFile('profile_image')) {
            $validated = Validator::make($request->all(), [
                'name'=> 'required',
                'mobile'=> 'required',
                'email'=> 'required',
                'role'=> 'required',
                'profile_image'=> 'required|image',
            ]);
        } else {
            $validated = Validator::make($request->all(), [
                'name'=> 'required',
                'mobile'=> 'required',
                'email'=> 'required',
                'role'=> 'required',
                // 'profile_image'=> 'required|image',
            ]);
        }

        if ($validated->fails()) {
            return response()->json([
                'status'=>'400',
                'message'=>$validated->getMessageBag()
            ]);
        }
        else {
            $user = UserProfile::find($request->userid);
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->role = $request->role;
            if ($request->hasFile('profile_image')) {
                $file_name = time().'.'. $request->file('profile_image')->extension();
                $request->file('profile_image')->move(public_path('profile_images'), $file_name);
                $user->profile_image = 'profile_images/' . $file_name;
            }
            $user->save();

            return response()->json([
                'status'=>'200',
                'message'=>'Account Updated Successfully!!'
            ]);
        }
    }

    public function delete_profile($id)
    {
        $user = UserProfile::find($id)->delete();
        return response()->json([
            'status'=>'200',
            'message'=>'Account Deleted Successfully!!'
        ]);
    }
}
