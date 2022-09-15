<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> About us </title>
    <link rel="stylesheet" type="text/css" href="{{url('css/aboutus.css')}}">
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
                <li class="nav_item"><a href="{{url('/')}}">Home</a></li>
                <li class="nav_item"><a href="{{url('show_courses')}}">Courses</a></li>
                <!-- <li class="nav_item"><a href="#">Content</a></li> -->
                @auth
                <li class="nav_item"><a href="{{url('attendance')}}">Attendance</a></li>
                @endauth
                <li class="nav_item"><a href="{{ route('profile.show') }}">Profile</a></li>
                <li class="nav_item"><a href="#">About us</a></li>
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


    <div class="col">
        <div >
            <img src="{{url('images/about us.jpg')}}" class="aboutus_img">
        </div>
    </div>


    <div class="col">
        <div id="board2">
            <div class="text_center margin_5_top ">
                <h1 class="board_header">
                    About us
                </h1>
            </div>
            <div class="help_text">
                we are future learning website for courses that may
                help you alot to have the course you need in al fields
                you can see the courses from the menu bar in the website
                above here you can explore hundreds of free courses or get
                started with a free trial Earn a university degree and
                enjoy high-quality curriculum, affordable pricing, and
                flexible scheduling.Also you can get on-demand lectures
                for desktop and mobile—on your schedule.
                Choose from free courses, hands-on projects, certificate
                programs, and stackable credentials.
            </div>

        </div>



    </div>
</body>

</html>