<?php
namespace App\Http\Controllers;
use App\Models\ExamUser;
use Illuminate\Http\Request;
use App\Http\Requests\ExamUserRequest;
use Illuminate\Support\Facades\DB;

class ExamUserController extends Controller
{
    public function exams(){
        $exams = ExamUser::all();
        return $exams;
    }
    public function exam($id){
        $exams = ExamUser::find($id);
        return $exams;
    }
    public function exams_view($user_id,$lesson_id,$grade_id){
        $exams = DB::table('exam_user_lesson_view3')->where('user_id',$user_id)->
                                                      where('grade_id',$grade_id)->
                                                      where('lesson_id',$lesson_id)->get();
        return $exams;
    }


    public function exams_score_avg($grade_id,$user_id){
        $lessons = DB::table('lessons')->where('grade_id',$grade_id)->select('id')->get();
        $lesson_ids=[];
        foreach($lessons as $lesson){
            $lesson_ids[]=$lesson->id;
        }
        $avg_score=[];
        $avg_score_grade=[];
        foreach($lesson_ids as $lesson_id){
            $score = DB::table('exam_user_lesson_view3')->where('user_id',$user_id)->where('lesson_id',$lesson_id)->avg('score');
            $avg_score[]=$score;
            $score2 = DB::table('exam_user_lesson_view3')->where('grade_id',$grade_id)->where('lesson_id',$lesson_id)->avg('score');
            $avg_score_grade[]=$score2;
        }
        
        return [$avg_score,$avg_score_grade];
    }

    public function exams_score_user_linechart($grade_id,$user_id,$lesson_id){
        $exams = DB::table('exam_user_lesson_view3')->where('grade_id',$grade_id)
                                                    ->where('lesson_id',$lesson_id)
                                                    ->where('user_id',$user_id)
                                                    ->select('exam_id')->get();
        $exam_ids=[];
        foreach($exams as $exam){
            $exam_ids[]=$exam->exam_id;
        }
        $scores=[];
        $avg_score_grade=[];
        foreach($exam_ids as $exam_id){
            $score = DB::table('exam_users')->where('user_id',$user_id)
                                                        ->where('exam_id',$exam_id)
                                                        ->first()->score;
            $scores[]=$score;
            $score2 = DB::table('exam_users')->where('grade_id',$grade_id)->where('exam_id',$exam_id)->avg('score');
            $avg_score_grade[]=$score2;


        }        
        return [$scores,$avg_score_grade,$exam_ids];
    }

    public function remove($id){
        $result = ExamUser::find($id)->delete();     
    }
    public function update(Request $request,$id){
        $exams = ExamUser::find($id);
        $exams->update(['score'=>$request->score,                        
                        'exam_id'=>$request->exam_id]);
        return $exams;  
    }
    public function store(ExamUserRequest $request){
        ExamUser::create(['score' => $request->score,
                          'date_shamsi' => $request->date_shamsi,
                          'exam_id' => $request->exam_id,
                          'grade_id' => $request->grade_id,
                          'user_id' => $request->user_id]); 
        return $request;
    }
}
