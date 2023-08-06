<?php

namespace App\Http\Controllers;
use App\Models\LessonProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassProgramController extends Controller
{
    public function programs(){
        $program = DB::table('prog_view')->orderByDesc('id')->get();
        return $program;
    }
    public function program($id){
        $program = LessonProgram::find($id);
        return $program;
    }
    public function remove($id){
        $result = LessonProgram::find($id)->delete();     
    }
    public function update(Request $request , $id){
        $program = LessonProgram::find($id);
        $program->update(['lesson_id' => $request->lesson_id,
                          'class_id' => $request->class_id,
                          'time_start' => $request->time_start,
                          'time_end' => $request->time_end, 
                          'dayOfWeek' => $request->dayOfWeek]);
        return $program;  
    }
    public function store(Request $request){
        LessonProgram::create(['lesson_id' => $request->lesson_id,
                              'class_id' => $request->class_id,
                              'time_start' => $request->time_start,
                              'time_end' => $request->time_end, 
                              'dayOfWeek' => $request->dayOfWeek]); 
        return $request->all();
    }
}
