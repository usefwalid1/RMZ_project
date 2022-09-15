<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Attendance;
use DB;

class mainController extends Controller
{
    //
    public function show_courses()
      {
        $course=new Course; 
        $courses= DB::table('courses')
                 ->select('*')
                 ->get();

        return view('show_courses',compact('courses'));
      }
      public function about_us()
      {
        return view('about_us');
      }
      public function help()
      {
        return view('help');
      }
      public function join_course($id)
      {
       
        $course = DB::table('attendances')
        ->where('user_id', '=', Auth::user()->id)
        ->where('course_id', '=', $id)
        ->first();
       /* $course = Attendance :: where ('attendances.user_id','like',Auth::id())
        ->where ('attendances.course_id','like',$id)
        ->get();*/

        if (is_null($course))
        {
          $user_course=new Attendance;
          $user_course->user_id=Auth::id();
          $user_course->course_id=$id;
          $user_course->attendance=0;
          $user_course->save();
        }
        
      
        $courses = Attendance :: where ('attendances.user_id','like',Auth::id())
                 ->join('courses', 'courses.id', '=', 'attendances.course_id')
                 ->get();
        
        return view('attendance',compact('courses'));
        
      }
      public function drop_course($id)
      {
        $data=attendance::where ('user_id','like',Auth::id())
              ->where('course_id', '=', $id);
        $data->delete();
          return redirect()->back();
      }
      public function attendance()
      {
        $courses = Attendance :: where ('attendances.user_id','like',Auth::id())
                 ->join('courses', 'courses.id', '=', 'attendances.course_id')
                 ->get();
        
        return view('attendance',compact('courses'));;
      }

      public function index(){
    
        $date = date('Y-m-d',time());
        if (Auth::id())
        {
            if(Auth::user()->role_id==1)
            {
             return view('welcome_admin');
    
            }
    
            elseif(Auth::user()->role_id==2)
            {
             
              return view('welcome');
            }
           
        }

        else{

          return view('welcome');
          
        }
        }
}
