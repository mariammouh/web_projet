<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use App\Models\File;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profile = profile::where('id', $id)->get();
       
        $info = $profile->last();
        return view('profile', ['user_profile' => $info]);
    }
    public function store($id, Request $request)
    {
        
        $profile = profile::find($id);
        error_log("eeefgggg");
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);  error_log("eeefff");
error_log($request->file);
      
        $file = $request->file('file');
        if ($file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $filePath = '/storage/' . $filePath;
      
            error_log("hiiii".$fileName);
        }
    error_log($filePath);
            if (empty($profile)) {
                $profile = new profile();
                $profile->id = $id;
                $profile->phone = request('phone');
                $profile->address = request('address');
$profile->pic=$filePath;
                $profile->bio = request('bio');
                $profile->save();
            } else {
                $profile->update([
                    'phone' => request('phone'),
                    'address' => request('address'),
                    'bio' => request('bio'),
                    'pic'=>$filePath,
                ]);
            }
            return redirect()->back();
        }
    
}
