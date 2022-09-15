<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title> Courses </title>
        <link rel="stylesheet" href="{{url('css/home.css')}}">
       
    </head>

<body>
    <div id="back_ground"></div>
    <div class="nav">
        <div class="nav_col">
            <img src="{{url('images/site logo.png')}}" class="header_logo_img">
        </div>
        
        <div class="nav_col welcome_text">
            Welcome to EduCore
        </div>

        <div class="nav_col nav_list" >
            <ul >
                <li class="nav_item"><a href="{{url('/')}}">Home</a></li>
                <li class="nav_item"><a href="#">Courses</a></li>
                <!-- <li class="nav_item"><a href="#">Content</a></li> -->
                @auth
                <li class="nav_item"><a href="{{url('attendance')}}">Attendance</a></li>
                @endauth
                <li class="nav_item"><a href="{{ route('profile.show') }}">Profile</a></li>
                <li class="nav_item"><a href="{{url('about_us')}}">About us</a></li>
                <li class="nav_item"><a href="{{url('help')}}">Help</a></li>
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
            <label class="txt_underlogo">Available Courses</label>
    </div></br></br></br>
   
    @foreach($courses as $course)
    <div class="col padding_30_top">

        <div class="txt_center course_txt">
       
           <label class="border_txt">
             <h1>{{$course->id}}.{{$course->course_name}}</h1> 
             {{$course->description}}<br> 
             by {{$course->instructer_name}}</label> 
       
        </div>
        <div class="txt_center reg_font_adj padding_30_top">
          @if(Route::has('login'))
          @auth
          <a href="{{url('join_course',$course->id)}}" class="reg_bg">Join Course</a>
          @else
            <a href="{{ route('login') }}" class="reg_bg">Join Course</a>
          @endauth
          @endif
            
        </div>


       
        
        

    </div>


    <div class="col course_img_border">
        <img src="{{url('images/online course.jpg')}}" class="header_logo_img">
       
    </div>

    @endforeach




</body>

</html>