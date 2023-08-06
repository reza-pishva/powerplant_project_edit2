<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;
use App\Models\User;
use App\Http\Requests\ClassRoomRequest;
use Illuminate\Support\Facades\DB;

class ClassRoomController extends Controller
{
    //in this function we will compute the current year of school
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
    //here we get all the classrooms which are registered for all grades.
    public function classrooms(){
        $classroom = ClassRoom::all();
        return $classroom;     
    }
    public function classrooms_view(){
        $classroom = DB::table('class_grade_view')->orderByDesc('id')->get();
        return $classroom;     
    }
    //here we get teachers of a specific class.
    public function class_teachers($id){
        $classroom = ClassRoom::find($id);
        return $classroom->users->where('role',2);   
    }
    //here we get students of a specific class.
    public function class_students($id){
        $classroom = ClassRoom::find($id);
        return $classroom->users->where('role',1);     
    }
    //here we get classrooms of current year.
    public function currentClassRooms(){
        $year=$this->getYear();
        $classroom = ClassRoom::year($year)->get();
        return $classroom;        
    }
    // to select a classroom by id
    public function classroom($id){
        $classroom = ClassRoom::find($id);
        return $classroom;
    }
    // to get the lessons of a class
    public function class_lessons($class_id , $grade_id){
        $classroom = ClassRoom::find($class_id);
        return $classroom->lessons->where('grade_id' , $grade_id);
    }
    // to remove one specific classroom by its id
    public function remove($id){
        $result = ClassRoom::find($id)->delete();     
    }
    // to update one specific classroom by its id
    public function update(ClassRoomRequest $request , $id){
        $classroom = ClassRoom::find($id);
        $classroom->update(['year' => $request->year,
                          'name' => $request->name, 
                          'grade_id' => $request->grade_id]);
        return $classroom;  
    }
    // to add one classroom
    public function store(ClassRoomRequest $request){
        $classroom = ClassRoom::create(['year' => $request->year,
                          'name' => $request->name, 
                          'grade_id' => $request->grade_id]);
        return $classroom;  
    }

}
