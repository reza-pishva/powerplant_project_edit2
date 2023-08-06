<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;
use Illuminate\Support\Facades\DB;
class ExamNameController extends Controller
{
    //to return all defined exam
    public function exams(){
        $exams = Exam::all();
        return $exams;
    }
    public function exams_view(){
        $exams = DB::table('exam_grade_lesson_view')->get();
        return $exams;
    }
    public function exams_view_grade_id($id){
        $exams = DB::table('exam_grade_lesson_view')->where('grade_id',$id)->get();
        return $exams;
    }
    public function exams_view_exam_id($id){
        $exams = DB::table('exam_grade_lesson_view')->where('id',$id)->get();
        return $exams;
    }
    //to get an exam by id
    public function exam($id){
        $exams = Exam::find($id);
        return Exam::find($id);
    }

    public function exam_by_grade($id){
        $exams = DB::table('exams')->where('grade_id',$id)->get();
        return Exam::find($id);
    }

    public function remove($id){
        $result = Exam::find($id)->delete();     
    }
    public function update(ExamRequest $request,$id){
        $exams = Exam::find($id);
        $exams->update(['grade_id'=>$request->grade_id,
                        'exam_type_id'=>$request->exam_type_id,
                        'lesson_id'=>$request->lesson_id]);
        return $exams;  
    }
    public function store(ExamRequest $request){
        Exam::create(['grade_id'=>$request->grade_id,
                      'exam_type_id'=>$request->exam_type_id,
                      'lesson_id'=>$request->lesson_id]); 
        return $request->all();
    }
}
