<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> About us </title>
    <link rel="stylesheet" type="text/css" href="{{url('css/aboutus.css')}}">
    <style>
input[type=text],[type=password],[type=email], select {
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
button{
    width: 100%;
  background-color: rgb(135, 127, 209);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
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
                <li class="nav_item"><a href="{{url('/')}}">Home</a></li>
                <li class="nav_item"><a href="{{url('show_courses')}}">Courses</a></li>
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

</br>
</br>
</br>
    <form method="POST" action="{{ route('login') }}" class="form_class">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>


            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                </br>

                <x-jet-button class="ml-4" style="background-color: rgb(135, 127, 209);
    color: #ffffff;
    text-decoration: none;
    padding: 10px 20px;">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>



    </div>
</body>

</html>
        

        
    
