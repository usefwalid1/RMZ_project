<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Attendance;
use App\Models\User;
use DB;

class adminController extends Controller
{
    //
    public function show_courses_admin()
      {
        $course=new Course; 
        $courses= DB::table('courses')
                 ->select('*')
                 ->get();

        return view('show_courses_admin',compact('courses'));
      }

      public function delete_course($id)
      {
        $data=attendance::where('course_id', '=', $id);
        $data->delete();

        $course= Course::where('id', '=', $id);
        $course->delete();
          return redirect()->back();
      }
      public function view_attendance($id)
      {
        $students = User :: where ('attendances.course_id','like',$id)
                 ->join('attendances', 'attendances.user_id', '=', 'users.id')
                 ->get();
        $course=Course::find($id);
        return view('view_attendance',compact('students','course'));
      }

      public function add_attendance($id)
      {
        $attendance = Attendance::find($id);
        $attendance->attendance= $attendance->attendance + 1;
        $attendance->save();
        return redirect()->back();
      }

      public function remove_attendance($id)
      {
        $attendance = Attendance::find($id);
        $attendance->attendance= $attendance->attendance - 1;
        $attendance->save();
        return redirect()->back();
      }

      public function remove_student($id)
      {
        $attendance = Attendance::find($id);
        $attendance->delete();
        return redirect()->back();
      }

      public function add_course()
      {
        return view('add_course');
      }
      public function submit_course(Request $request)
      {
          $course=new Course;
          $course->course_name=$request->course_name;
          $course->instructer_name=$request->instructer_name;
          $course->description=$request->description;
          
          $course->save();

          $courses=new Course;
          $courses= DB::table('courses')
                 ->select('*')
                 ->get();

          return view('show_courses_admin',compact('courses'));
          
        
       
      }
}
