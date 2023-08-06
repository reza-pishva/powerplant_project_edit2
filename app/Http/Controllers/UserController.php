<?php

namespace App\Http\Controllers;
use App\Models\ClassRoom;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Profile;
use App\Models\UserToClass;
use App\Http\Requests\UserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getYear(){
        $date = \Morilog\Jalali\Jalalian::now();
        $year = substr($date,0,4); 
        $month = substr($date,5,2); 
        $day = substr($date,8,2); 
        if($month<4){
          return $year-1; 
        }
        return $year; 
    }


    public function users(){
        $user=User::all();
        return $user;
    }
    public function users_view(){
        $user=DB::table('user_classes_view8')->where('role',1)->get();
        return $user;
    }
    public function users_class_view($class_id){
        $user=DB::table('user_classes_view8')->where('class_id',$class_id)->get();
        return $user;
    }
    public function report_query(Request $request)
    {
        $f_name=$request->input('f_name');
        $l_name=$request->input('l_name');
        $grade_id=$request->input('grade_id');
        $class_id=$request->input('class_id');
        $national_code=$request->input('national_code');
        $year=$request->input('year');

        if($f_name==""){
            $query1="user_id>0";
        }else{
            $query1="f_name LIKE '%".$f_name."%'";
        }

        if($l_name==""){
            $query2="user_id>0";
        }else{
            $query2="l_name LIKE '%".$l_name."%'";
        }

        if($grade_id==""){
            $query3="user_id>0";
        }else{
            $query3="grade_id=".$grade_id;
        }

        if($class_id==""){
            $query4="user_id>0";
        }else{
            $query4="class_id=".$class_id;
        }

        if($national_code==""){
            $query5="user_id>0";
        }else{
            $query5="national_code=".$national_code;
        }

        if($year==""){
            $query6="user_id>0";
        }else{
            $query6="year=".$year;
        }

        $query="SELECT * FROM user_classes_view8 WHERE role=1 AND ". $query1 ." AND ".$query2." AND ".$query3." AND ".$query4." AND ".$query5." AND ".$query6." ORDER BY user_id ASC";
        $requests = DB::select($query);
        return $requests;
    }
    public function users_view_search(Request $request){
        $result = [];
        $query=DB::table('user_classes_view5');
        if($request->has('f_name')){
            $query->where('f_name','like','%'.$request->input('f_name').'%');
        }
        if($request->has('l_name')){
            $query->where('l_name','like','%'.$request->input('l_name').'%');
        }
        if($request->has('grade_id')){
            $query->where('grade_id',$request->input('grade_id'));
        }
        if($request->has('class_id')){
            $query->where('class_id',$request->input('class_id'));
        }
        if($request->has('national_code')){
            $query->where('national_code','like','%'.$request->input('national_code').'%');
        }
        if($request->has('year')){
            $query->where('year','like','%'.$request->input('year').'%');
        }
        $result = $query->get();
        if($request->input('f_name')=="" and 
           $request->input('l_name')=="" and 
           $request->input('national_code')=="" and 
           $request->input('year')=="" and 
           $request->input('class_id')=="" and 
           $request->input('grade_id')==""){
            return DB::table('user_classes_view5')->get();
           }else{
            return $query->get();
           }
    }
    public function user_class($user_id,$year){
        $user=User::find($user_id);
        return $user->classes->where('year',$year);
    }
    public function user_profile($id){
        $user=User::find($id);
        return $user->profile;
    }
    public function user_classes($user_id){
        $user=User::find($user_id);
        return $user->classes;
    }
    public function students(){
        $user=User::role(1)->get();
        return $user;
    }
    public function teachers(){
        $user=User::role(2)->get();
        return $user;
    }
    public function personels(){
        $user=User::role(3)->get();
        return $user;
    }
    public function user_lessons_current_year($user_id){
        $grade_id = User::find($user_id)->classes->where('year',$this->getYear())->first()->grade_id;
        $lessons = DB::table('lessons')->where('grade_id', $grade_id)->get();
        return $lessons;
    }
    public function user_lessons($user_id, $year){
        $grade_id = User::find($user_id)->classes->where('year',$year)->first()->grade_id;
        $lessons = DB::table('lessons')->where('grade_id', $grade_id)->get();
        return $lessons;
    }
    public function men(){
        $user=User::gender(1)->get();
        return $user;
    }
    public function women(){
        $user=User::gender(2)->get();
        return $user;
    }
    public function user($id){
        $user = User::find($id);
        return $user;
    }
    public function remove($id){
        $result = User::find($id)->delete();     
    }
    public function update(UserRequest $request , $id){
        $user = User::find($id);
        $user->update(['f_name' => $request->f_name,
                       'l_name' => $request->l_name,
                       'father_name' => $request->father_name,
                       'national_code' => $request->national_code,
                       'gender' => $request->gender,
                       'role' => $request->role,
                       'email ' => $request->email,
                       'password' => $request->password]);
        return $user;  
    }
    public function store(UserRequest $request){
        User::create(['f_name' => $request->f_name,
                      'l_name' => $request->l_name,
                      'father_name' => $request->father_name,
                      'national_code' => $request->national_code,
                      'gender' => $request->gender,
                      'role' => $request->role,
                      'email' => $request->email,
                      'password' => $request->password]); 
        return $request->all();
    }
    public function add_user_class(Request $request){
        $class = ClassRoom::find($request->class_id);
        $user = User::find($request->user_id);
        $result = $user->classes()->attach($class);
        return $result;
    }

    public function remove_user_class(Request $request){
        $class = ClassRoom::find($request->class_id);
        $user = User::find($request->user_id);
        $result = $user->classes()->detach($class);
        return $result;
    }

    public function addClass(Request $request){

        $users = $request->data[0];
        UserToClass::whereIn('user_id', $users)->delete(); 
        foreach($users as $user){
            $result=DB::table('user_to_classes')->insert([
                ['user_id' => $user, 'class_id' => $request->data[1]],
            ]);
        }
        return 1;
    }



   

}
