<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title> Home </title>
        <link rel="stylesheet" type="text/css" href="{{url('css/home.css')}}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                text-align: center;
                padding: 8px;
            }

            tr:nth-child(even) {background-color: #f2f2f2;}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    </head>
    <body>
    <div id="back_ground"></div>
    <div class="nav">
        <div class="nav_col">
            <img src="{{url('images/site logo.png')}}" class="header_logo_img">
        </div>

        <div class="nav_col welcome_text">
            welcome to EduCore
        </div>

        <div class="nav_col nav_list">
            <ul>
                <li class="nav_item"><a href="/">Home</a></li>
                <li class="nav_item"><a href="{{url('show_courses_admin')}}">Our Courses</a></li>
                <li class="nav_item"><a href="{{url('add_course')}}">Add Course</a></li>
                <li class="nav_item"><a href="{{ route('profile.show') }}">Profile</a></li>

                @if (Route::has('login'))
                @auth
                <li class="nav_item">
                     <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                </li>
                @else
                <li class="nav_item"><a href="{{ route('login') }}">Log in</a></li>
                @if (Route::has('register'))
                            <li class="nav_item"><a href="{{ route('register') }}">Register</a></li>
                           
                @endif
                @endauth
                @endif
                
                
            </ul>
        </div>

    </div>


    </br></br></br>
    <div class="txt_center padding_20_top">
            <label class="txt_underlogo">{{$course->course_name}} Course</label>
    </div></br></br></br>
    

    <div style="overflow-x: auto;">
  <table>
    <tr>
      <th>Id</th>
      <th>Student</th>
      <th>Email</th>
      <th>Attendance</th>
    </tr>
    @foreach($students as $student)
    <tr>
      <td>{{$student->id}}</td>
      <td>{{$student->name}}</td>
      <td>{{$student->email}}</td>
      <td>{{$student->attendance}}</td>
      
      <td><a href="{{url('add_attendance',$student->id)}}" class="reg_bg">Add Attendance</a>
      <a href="{{url('remove_attendance',$student->id)}}" class="reg_bg">Remove Attendance</a></td>
      <td><a href="{{url('remove_student',$student->id)}}" class="reg_bg">Remove Student</a></td>
    </tr>
    @endforeach
  </table>
   

    </div>


</body>
</html>
