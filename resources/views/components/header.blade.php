<nav class="navbar navbar-expand-sm shadow-lg" style="background-image: linear-gradient(to right, #1c1102, #2c230a);
border-radius:10px;">
    <a class="navbar-brand" href="{{route('choose')}}" style="color: rgba(246, 209, 161, 0.767); font-weight:bold;" >Cura</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        
        @auth('web')
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}" style="color: rgba(246, 209, 161, 0.744);
          font-size:20px; font-weight:bold;">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('patientprofile')}}" style="color: rgb(246, 209, 161);
          font-size:20px; font-weight:bold;">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}" style="color: rgb(246, 209, 161);
          font-size:20px; font-weight:bold;">Logout</a>
        </li>
        @elseauth('nurse')
        <li class="nav-item active">
          <a class="nav-link" href="{{route('nursedash')}}" style="color: rgba(246, 209, 161, 0.744);
          font-size:20px; font-weight:bold;">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('nurse_balance')}}" style="color: rgb(246, 209, 161);
          font-size:20px; font-weight:bold;">Balance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('nurselogout')}}" style="color: rgb(246, 209, 161);
          font-size:20px; font-weight:bold;">Logout</a>
        </li>
        @elseauth('admin')
        <li class="nav-item active">
          <a class="nav-link" href="{{route('admindash')}}" style="color: rgba(246, 209, 161, 0.744);
          font-size:20px; font-weight:bold;">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        
        

        <li class="nav-item">
          <a class="nav-link" href="{{route('adminlogout')}}" style="color: rgb(246, 209, 161);
          font-size:20px; font-weight:bold;">Logout</a>
        </li>
        @else 
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}" style="color: rgb(246, 209, 161);
          font-size:20px; font-weight:bold;">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}" style="color: rgb(246, 209, 161);
          font-size:20px; font-weight:bold;">Registration</a>
        </li>
        @endauth
      </ul>
      @auth('web')
      <span class="navbar-text" style="font-size: 18px; font-weight: bolder; color:#b4a070">
        Welcome, {{auth()->user()->name}}
      </span>
      @elseauth('nurse')
      <span class="navbar-text" style="font-size: 18px; font-weight: bolder; color:#b4a070">
        Welcome, Nurse {{auth()->guard('nurse')->user()->name}}
      </span>
      @elseauth('admin')
      <span class="navbar-text" style="font-size: 18px; font-weight: bolder; color:#b4a070">
        Welcome, Admin {{auth()->guard('admin')->user()->name}}
      </span>
      @endauth
    </div>
  </nav>

  