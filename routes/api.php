<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ExamTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\ExamNameController;
use App\Http\Controllers\TeacherLessonController;
use App\Http\Controllers\TeacherClassController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\ClassProgramController;
use App\Http\Controllers\ExamUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Grade table routes */
Route::get('/school/grade/grades',[GradeController::class,'grades']);
Route::get('/school/grade/{id}',[GradeController::class,'grade']);
Route::delete('/school/grade/remove/{id}',[GradeController::class,'remove']);
Route::put('/school/grade/update/{id}',[GradeController::class,'update']);
Route::post('/school/grade/store',[GradeController::class,'store']);
/* Exam type table routes */
Route::get('/school/exam/exam-types',[ExamTypeController::class,'examTypes']);
Route::get('/school/exam/exam-type/{id}',[ExamTypeController::class,'examType']);
Route::delete('/school/exam/exam-type/remove/{id}',[ExamTypeController::class,'remove']);
Route::put('/school/exam/exam-type/update/{id}',[ExamTypeController::class,'update']);
Route::post('/school/exam/exam-type/store',[ExamTypeController::class,'store']);
/* user table routes */
Route::get('/school/user/users',[UserController::class,'users']);
Route::get('/school/user/users-view-by-class-id/{class_id}',[UserController::class,'users_class_view']);
Route::get('/school/user/users-view',[UserController::class,'users_view']);
Route::post('/school/user/users-view-search',[UserController::class,'report_query']);
Route::get('/school/user/students',[UserController::class,'students']);
Route::get('/school/user/teachers',[UserController::class,'teachers']);
Route::get('/school/user/personels',[UserController::class,'personels']);
Route::get('/school/user/user-class/{user_id}/{year}',[UserController::class,'user_class']);
Route::get('/school/user/user-classes/{user_id}',[UserController::class,'user_classes']);
Route::get('/school/user/user-lessons/{user_id}/$year',[UserController::class,'user_lessons']);
Route::get('/school/user/men',[UserController::class,'men']);
Route::get('/school/user/women',[UserController::class,'women']);
Route::get('/school/user-profile/{id}',[UserController::class,'user_profile']);
Route::get('/school/user/{id}',[UserController::class,'user']);
Route::delete('/school/user/remove/{id}',[UserController::class,'remove']);
Route::put('/school/user/update/{id}',[UserController::class,'update']);
Route::post('/school/user/store',[UserController::class,'store']);
Route::post('/school/user/add-user',[UserController::class,'add_user_class']);
Route::post('/school/user/remove-user',[UserController::class,'remove_user_class']);
Route::post('/school/user/add-lesson',[UserController::class,'add_user_lesson']);
Route::get('/school/user/user-lessons/{id}/{year}',[UserController::class,'user_lessons']);
Route::get('/school/user/user-lessons-current-year/{id}',[UserController::class,'user_lessons_current_year']);
Route::post('/school/user/add-class',[UserController::class,'addClass']);
/* lesson table routes */
Route::get('/school/lesson/lessons/{grade_id}',[LessonController::class,'lessons']);
Route::get('/school/lesson/lessons-view',[LessonController::class,'lessons_view']);
Route::get('/school/lesson/{id}',[LessonController::class,'lesson']);
Route::delete('/school/lesson/remove/{id}',[LessonController::class,'remove']);
Route::put('/school/lesson/update/{id}',[LessonController::class,'update']);
Route::post('/school/lesson/store',[LessonController::class,'store']);
/* profile table routes */
Route::get('/school/profile/profiles',[ProfileController::class,'profiles']);
Route::get('/school/profile/{id}',[ProfileController::class,'profile']);
Route::get('/school/profile-user/{id}',[ProfileController::class,'profile_user']);
Route::delete('/school/profile/remove/{id}',[ProfileController::class,'remove']);
Route::put('/school/profile/update/{id}',[ProfileController::class,'update']);
Route::post('/school/profile/store',[ProfileController::class,'store']);
/* classroom table routes */
Route::get('/school/classroom/classrooms',[ClassRoomController::class,'classrooms']);
Route::get('/school/classroom/classrooms-view',[ClassRoomController::class,'classrooms_view']);
Route::get('/school/classroom/current-classrooms',[ClassRoomController::class,'currentClassRooms']);
Route::get('/school/classroom/{id}',[ClassRoomController::class,'classroom']);
Route::get('/school/classroom/class-lessons/{class_id}/{grade_id}',[ClassRoomController::class,'class_lessons']);
Route::get('/school/classroom/class-students/{id}',[ClassRoomController::class,'class_students']);
Route::get('/school/classroom/class-teachers/{id}',[ClassRoomController::class,'class_teachers']);
Route::delete('/school/classroom/remove/{id}',[ClassRoomController::class,'remove']);
Route::put('/school/classroom/update/{id}',[ClassRoomController::class,'update']);
Route::post('/school/classroom/store',[ClassRoomController::class,'store']);
/* exam table routes */
Route::get('/school/exam/exam_names',[ExamNameController::class,'exams']);
Route::get('/school/exam/exam-view',[ExamNameController::class,'exams_view']);
Route::get('/school/exam/exam-view/{id}',[ExamNameController::class,'exams_view_grade_id']);
Route::get('/school/exam/exam-view2/{id}',[ExamNameController::class,'exams_view_exam_id']);
Route::get('/school/exam/{id}',[ExamNameController::class,'exam']);
Route::get('/school/exam/exam-by-grade/{id}',[ExamNameController::class,'exam_by_grade']);
Route::delete('/school/exam/remove/{id}',[ExamNameController::class,'remove']);
Route::put('/school/exam/update/{id}',[ExamNameController::class,'update']);
Route::post('/school/exam/store',[ExamNameController::class,'store']);
/* lessons table routes */
Route::get('/school/teacher-lesson/lessons',[TeacherLessonController::class,'lessons']);
Route::get('/school/teacher-lesson/current-lessons',[TeacherLessonController::class,'currentLessons']);
Route::get('/school/teacher-lesson/{id}',[TeacherLessonController::class,'lesson']);
Route::get('/school/teacher-lesson/remove/{id}',[TeacherLessonController::class,'remove']);
Route::put('/school/teacher-lesson/update/{id}',[TeacherLessonController::class,'update']);
Route::post('/school/teacher-lesson/store',[TeacherLessonController::class,'store']);
/* teacher-class table routes */
Route::get('/school/teacher-class/teacher-classes',[TeacherClassController::class,'teacher_classes']);
Route::get('/school/teacher-class/{id}',[TeacherClassController::class,'teacher_class']);
Route::get('/school/teacher-class/remove/{id}',[TeacherClassController::class,'remove']);
Route::put('/school/teacher-class/update/{id}',[TeacherClassController::class,'update']);
Route::post('/school/teacher-class/store',[TeacherClassController::class,'store']);
/* class-program table routes */
Route::get('/school/class-program/programs',[ClassProgramController::class,'programs']);
Route::get('/school/class-program/program/{id}',[ClassProgramController::class,'program']);
Route::delete('/school/class-program/remove/{id}',[ClassProgramController::class,'remove']);
Route::put('/school/class-program/update/{id}',[ClassProgramController::class,'update']);
Route::post('/school/class-program/store',[ClassProgramController::class,'store']);
/* exam table routes */
Route::get('/school/exam-user/exams',[ExamUserController::class,'exams']);
Route::get('/school/exam-user/exams-view/{user_id}/{lesson_id}/{grade_id}',[ExamUserController::class,'exams_view']);
Route::get('/school/exam-user/user/{id}',[ExamUserController::class,'exam']);
Route::get('/school/exam-user/user/{grade_id}/{user_id}',[ExamUserController::class,'exams_score_avg']);
Route::get('/school/exam-user/user/{grade_id}/{user_id}/{lesson_id}',[ExamUserController::class,'exams_score_user_linechart']);
Route::delete('/school/exam-user/remove/{id}',[ExamUserController::class,'remove']);
Route::put('/school/exam-user/update/{id}',[ExamUserController::class,'update']);
Route::post('/school/user-exam/store',[ExamUserController::class,'store']);
