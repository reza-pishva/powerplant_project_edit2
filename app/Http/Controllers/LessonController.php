<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Http\Requests\LessonRequest;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function lesson($id){
        $lesson = Lesson::find($id);
        return $lesson;
    }
    public function lessons_view(){
        $lesson = DB::table('lesson_grade_view')->orderByDesc('id')->get();
        return $lesson;     
    }
    public function lessons($grade_id){
        return Lesson::where('grade_id',$grade_id)->get();
    }
    public function remove($id){
        $result = Lesson::find($id)->delete();     
    }
    public function update(LessonRequest $request , $id){
        $lesson = Lesson::find($id);
        $lesson->update(['lesson_name' => $request->lesson_name,
                         'grade_id' => $request->grade_id]);
        return $lesson;  
    }    
    public function store(LessonRequest $request){
        Lesson::create(['lesson_name' => $request->lesson_name,
                        'grade_id' => $request->grade_id]); 
        return $request->all();
    }
}
