@extends('layout')

@section('title', 'New Password')

@section('content')
<div class="container-fluid text-center">
    <div class="row" style="justify-content: center;">
        <div class="col-5">
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
            <h2 style="margin-top: 50px; color:rgb(210, 149, 70);">Forgot Password</h2>
            <form method="POST" action="{{route('password.reset.post')}}">
                @csrf
                <input type="text" name="token" hidden value="{{$token}}">
                <div class="form-group" style="color: bisque">
                  <label for="email">Provide Email address</label>
                  <input type="email" class="form-control"  name="email" placeholder="Enter email" value="{{old('email')}}">
                  <span class="text-danger">
                    @error('email')
                {{$message}}
            @enderror</span>
                </div>
                <div class="form-group" style="color: bisque">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control"  name="password" placeholder="Enter new password">
                    <span class="text-danger">
                      @error('password')
                  {{$message}}
              @enderror</span>
                  </div>
                  <div class="form-group" style="color: bisque">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control"  name="confirm-password" placeholder="Confirm Password">
                    <span class="text-danger">
                      @error('confirm-password')
                  {{$message}}
              @enderror</span>
                  </div>
                <button type="submit" class="btn btn-success shadow-lg">Set New Password</button>
              </form>

        </div>
        

    </div>
    
</div>

@endsection