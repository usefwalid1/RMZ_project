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



    <div class="txt_center padding_20_top">
            <label class="txt_underlogo">All Courses</label>
    </div></br></br></br>
    

    <div style="overflow-x: auto;">
  <table>
    <tr>
      <th>Id</th>
      <th>Course</th>
      <th>Instructer</th>
    </tr>
    @foreach($courses as $course)
    <tr>
      <td>{{$course->id}}</td>
      <td>{{$course->course_name}}</td>
      <td>{{$course->instructer_name}}</td>
      <td><a href="{{url('delete_course',$course->id)}}" class="reg_bg">Delete Course</a></td>
      <td><a href="{{url('view_attendance',$course->id)}}" class="reg_bg">View Attendance</a></td>
    </tr>
    @endforeach
  </table>
   

    </div>


</body>
</html>
