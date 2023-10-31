<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title', 'Cura')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
  </head>
  <body style="background-color: #013220">
    <div class="container-fluid">
      @if(session()->has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      
      <div class="row" style="justify-content: center">
        <div class="box" 
        style="background-color: rgba(131, 105, 66, 0.285);
        margin:20px;
        border-radius:20px">
          <img src="{{URL::asset('/images/logo.png')}}" class="img-fluid" alt="Responsive image" 
        style="height:130px; padding:10px">

        </div>
        
      </div>
      <div class="row" style="justify-content: center">
        <div class="col-5">
          @yield('content')
        </div>
      </div>


        
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>