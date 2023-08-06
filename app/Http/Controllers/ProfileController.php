<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Profile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function profiles(){
        $profiles = Profile::all();
        return $profiles;
    }
    public function profile($id){
        $profiles = Profile::find($id);
        return Profile::find($id);
    }
    public function remove($id){
        $result = Profile::find($id)->delete();     
    }
    public function profile_user($id){
        $profile = Profile::find($id);        
        return $profile->user;
    }
    public function update(ProfileRequest $request , $id){
        $profiles = Profile::find($id);
        $profiles->update(['father_job'=>$request->father_job,
                           'mother_job'=>$request->mother_job,
                           'father_phone_number'=>$request->father_phone_number,
                           'mother_phone_number'=>$request->mother_phone_number,
                           'address'=>$request->address,
                           'consideration'=>$request->consideration,
                           'birthday'=>$request->birthday,
                           'major'=>$request->major,
                           'user_id'=>$request->user_id]);
        return $profiles;  
    }
    public function store(ProfileRequest $request){

        if(Profile::where('user_id',$request->user_id)->get()->count()==0){
            Profile::create(['father_job'=>$request->father_job,
            'mother_job'=>$request->mother_job,
            'father_phone_number'=>$request->father_phone_number,
            'mother_phone_number'=>$request->mother_phone_number,
            'address'=>$request->address,
            'consideration'=>$request->consideration,
            'birthday'=>$request->birthday,
            'major'=>$request->major,
            'user_id'=>$request->user_id]); 
            return true;
        }else{
            return false;
        }
        
        
    }
}
