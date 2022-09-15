<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Help </title>
    <link rel="stylesheet" type="text/css" href="{{url('css/help.css')}}">
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

        <div class="nav_col nav_list">
        <ul>
                <li class="nav_item"><a href="{{url('/')}}">Home</a></li>
                <li class="nav_item"><a href="{{url('show_courses')}}">Courses</a></li>
                <!-- <li class="nav_item"><a href="#">Content</a></li> -->
                @auth
                <li class="nav_item"><a href="{{url('attendance')}}">Attendance</a></li>
                @endauth
                <li class="nav_item"><a href="{{ route('profile.show') }}">Profile</a></li>
                <li class="nav_item"><a href="{{url('about_us')}}">About us</a></li>
                <li class="nav_item"><a href="#">Help</a></li>
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


    <div class="col" >

        <div >
           <img src="{{url('images/help center.jpg')}}" class="help_img">
        </div>
        
    </div>


    <div class="col" >
        

        <div id="board">

            <div class="text_center margin_5_top ">
                <h1 class="board_header">
                    Help center
                </h1>
            </div>
            <div class="help_text">
                This is the help center where we can help
                you to solve you problem for any problem
                you contact us on this number (+20 1234567890)
                or you could send a mail on this email address
                (CourseProject@RMZ.com)<a href="mailto://CourseProject@RMZ.com">send an email now</a>
                a technical team will
                solve your problem and support you with all
                information you need .
            </div>
        </div>


    </div>
</body>

</html>