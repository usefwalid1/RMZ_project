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
       <form method="POST" action="{{ route('register') }}" class="form_class">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="role_id" value="{{ __('Role') }}" />
                <select id="role_id" class="form-control m-bot15" name="role_id">
                <option  value="1">Admin</option>
                <option  value="2">Student</option>
                </select>
               
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>



    </div>
</body>

</html>
        

        
    





