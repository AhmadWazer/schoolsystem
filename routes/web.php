<?php

use App\Http\Middleware\CheckRole;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\school\StudentController;
use App\Http\Controllers\school\TeacherController;
use App\Http\Controllers\school\AttendanceController;
use App\Http\Controllers\school\ClassController;
use App\Http\Controllers\school\ParentController;
use App\Http\Controllers\school\SubjectController;
use App\Http\Controllers\school\UserController;
use App\Http\Controllers\school\RoleparmisionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth','role'])->group(function () { 
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/studentattend/{id}', [HomeController::class, 'studentAtten'])->name('studentAtten');
Route::post('/studentattend', [HomeController::class, 'save'])->name('save.stdatten');

Route::post('/studentData',[HomeController::class,'stdData']);
Route::post('/studAttendanceA',[HomeController::class,'studAttendance']);//show attendance in teacher page
Route::post('/studAttendanceP',[HomeController::class,'studAttendancesssssss']);//show attendance in parent page
// user route
Route::get('/useraccount', [UserController::class, 'index'])->name('useraccount.index');
Route::get('/useraccount/add-new-useraccount', [UserController::class, 'create'])->name('useraccount.create');
Route::get('/useraccount/update-useraccount/{id}', [UserController::class, 'edit'])->name('useraccount.edit');
Route::post('/useraccount/store', [UserController::class,'store'])->name('useraccount.store');
Route::post('/useraccount/update-useraccount/{id}', [UserController::class, 'update'])->name('useraccount.update');
Route::get('/useraccount/delete/{id}', [UserController::class, 'destroy'])->name('useraccount.destroy');

Route::post('/useraccountRole',[UserController::class,'userRole']);
//student
Route::get('/student',[StudentController::class,'student'])->name('student');
Route::get('/student/show/{id}',[StudentController::class,'show'])->name('student.show');
Route::get('/student/addedit',[StudentController::class,'addeditstudent']);
Route::post('/student/store', [StudentController::class,'store'])->name('student.store');
Route::get('/student/update/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::post('/student/update/{id}',[StudentController::class,'update'])->name('student.update');
Route::get('/student/delete/{id}',[StudentController::class,'delete'])->name('student.delete');
Route::get('/student/datesheet',[StudentController::class,'datesheet'])->name('student.datesheet');
Route::get('/student/showAttend',[StudentController::class,'showattend']);
Route::post('/classdetails', [StudentController::class, 'stdatten'])->name('stdatten');
Route::post('/getClassDetails', [StudentController::class, 'classDetails'])->name('getClassDetails');

Route::post('/showstudentAttend', [StudentController::class, 'showStudentAttend'])->name('show_student_Attend');
//teacher
Route::get('/teacher',[TeacherController::class,'teacher'])->name('teacher');
Route::get('/teacher/show/{id}',[TeacherController::class,'show'])->name('teacher.show');
Route::get('/teacher/addedit',[TeacherController::class,'addeditteacher']);
Route::post('/teacher/store',[TeacherController::class,'store'])->name("teacher.store");
Route::get('/teacher/update/{id}',[TeacherController::class, 'edit'])->name('teacher.edit');
Route::post('/teacher/update/{id}',[TeacherController::class, 'update'])->name('teacher.update');
Route::get('/teacher/delete/{id}',[TeacherController::class, 'delete'])->name('teacher.delete');
Route::get('/teacher/datesheet',[TeacherController::class,'datesheet'])->name('teacher.datesheet');
Route::post('/teacher/datesheet',[TeacherController::class,'saveDS']);
Route::get('/teacher/stdattendance',[TeacherController::class,'stdattend']);

Route::get('/teacher/attenddatashow',[TeacherController::class,'datashow']);
//Parents
Route::get('/parent',[ParentController::class,'parent'])->name('parent');
Route::get('/parent/show/{id}',[ParentController::class,'show'])->name('parent.show');
Route::get('/parent/addedit',[ParentController::class,'addeditparent']);
Route::post('/parent/store',[ParentController::class,'store'])->name('parent.store');
Route::get('/parent/update/{id}',[ParentController::class, 'edit'])->name('parent.edit');
Route::post('/parent/update/{id}',[ParentController::class, 'update'])->name('parent.update');
Route::get('/parent/delete/{id}',[ParentController::class, 'delete'])->name('parent.delete');
//Attendance
Route::get('/attendance',[AttendanceController::class,'attendance']);
Route::post('/cattendance',[AttendanceController::class,'attendanceShow'])->name('attendance.show');
Route::post('/searchAttendance',[AttendanceController::class,'searchattend']);
Route::post('/subAttendance',[AttendanceController::class,'subAttend']);
//class
Route::get('/class',[ClassController::class,'class'])->name('class');
Route::get('/class/show/{id}',[ClassController::class,'show'])->name('class.show');
Route::get('/class/addedit',[ClassController::class,'addeditclass']);
Route::post('/class/store',[ClassController::class,'store'])->name('class.store');
Route::get('/class/update{id}',[ClassController::class,'edit'])->name('class.edit');
Route::post('/class/update{id}',[ClassController::class,'update'])->name('class.update');
Route::get('/class/delete{id}',[ClassController::class,'delete'])->name('class.delete');
//Subjects
Route::get('/subject',[SubjectController::class,'subject'])->name('subject');
Route::get('/subject/addedit',[SubjectController::class,'addeditsubject']);
Route::post('/subject/store',[SubjectController::class,'store'])->name('subject.store');
Route::get('/subject/update{id}',[SubjectController::class,'edit'])->name('subject.edit');
Route::post('/subject/update{id}',[SubjectController::class,'update'])->name('subject.update');
Route::get('/subject/delete{id}',[SubjectController::class,'delete'])->name('subject.delete');
//role & permission
Route::get('/roleparmision',[RoleparmisionController::class,'roleparmision']);

});

// this route is for pending users
Route::get('/pending',[HomeController::class,'pending'])->name('pending');
