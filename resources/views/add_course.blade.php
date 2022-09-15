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
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: rgb(135, 127, 209);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #f1f1f1;
}
.form_class{
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    margin-left:20%;
    margin-right:20%;

}

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
            <label class="txt_underlogo">Add Course</label>
    </div></br></br></br>
    <div class="form_class">
    
    <form action="{{url('submit_course')}}" method="POST" >
    @csrf
    <label for="fname">Course Name</label>
    <input type="text" id="course_name" name="course_name" placeholder="Course Name..">

    <label for="lname">Instructer Name</label>
    <input type="text" id="instructer_name" name="instructer_name" placeholder="Instructer Name..">

    <label for="lname">Description</label>
    <input type="text" id="description" name="description" placeholder="Description..">
  
  
    <input type="submit" value="Add">
    </form>
    </div>

    
   

    </div>


</body>
</html>
