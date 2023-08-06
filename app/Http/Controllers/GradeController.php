<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\ClassRoom;
use App\Models\Lesson;
use App\Http\Requests\GradeRequest;


class GradeController extends Controller
{
    public function grades(){
        $grade = Grade::orderByDesc('id')->get();
        return $grade;
    }
    public function grade($id){
        $grade = Grade::find($id);
        return Grade::find($id);
    }
    public function remove($id){
        $result = Grade::find($id)->delete();     
    }
    public function update(GradeRequest $request , $id){
        $grade = Grade::find($id);
        $grade->update(['grade_name'=>$request->grade_name]);
        return $grade;  
    }
    public function store(GradeRequest $request){
        Grade::create(['grade_name' => $request->grade_name]); 
        return $request->all();
    }
}
