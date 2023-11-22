@extends('layout')

@section('title', 'Nurse Reviews')

@section('content')
    <div class="container">
        <div class="row" style="justify-content: center;color:rgba(255, 228, 196, 0.882);">
            <h2 style="margin: 12px;">Nurse Reviews</h2>
            
        </div>
        <hr style="border-color:rgba(250, 235, 215, 0.309);">
        
        <div class="row" style="color:bisque;background-color:#0132206f;
        padding:15px;border-radius:20px;">
                <img src="{{URL::asset("uploads/".$nurse->photo)}}" width="140px" height="150px" style="border-radius:15px;margin-left:30px;">
                <h3 style="margin-left: 60px;margin-top:60px;">Nurse: {{$nurse->name}}</h3>
                @if ($comment_finder->rating === 5)
                <h4 style="margin-left: 60px;margin-top:60px;">
                    Overall Rating: <img src="{{URL::asset("images/5star.png")}}" 
                    width="140px" height="30px" style="border-radius:15px;margin-left:30px;"></h4>
                
                @elseif ($comment_finder->rating === 4)
                <h4 style="margin-left: 60px;margin-top:60px;">
                    Overall Rating: <img src="{{URL::asset("images/4star.png")}}" 
                    width="140px" height="30px" style="border-radius:15px;margin-left:30px;"></h4>
                
                @elseif ($comment_finder->rating === 3)
                <h4 style="margin-left: 60px;margin-top:60px;">
                    Overall Rating: <img src="{{URL::asset("images/3star.png")}}" 
                    width="140px" height="30px" style="border-radius:15px;margin-left:30px;"></h4>
                    
                @elseif ($comment_finder->rating === 2)
                <h4 style="margin-left: 60px;margin-top:60px;">
                    Overall Rating: <img src="{{URL::asset("images/2star.png")}}" 
                    width="140px" height="30px" style="border-radius:15px;margin-left:30px;"></h4>

                @else
                <h4 style="margin-left: 60px;margin-top:60px;">
                    Overall Rating: <img src="{{URL::asset("images/1star.png")}}" 
                    width="140px" height="30px" style="border-radius:15px;margin-left:30px;"></h4>

            
                @endif
                
                

        </div>

        <div class="row" style="justify-content: center;color:rgba(225, 216, 205, 0.882);">
            <h5 style="margin: 12px;">Patients' Testimonials</h5>
            
        </div>
        <hr style="border-color:rgba(250, 235, 215, 0.309);">

        <div class="box" style="margin:10px;">

        
            @foreach ($all_reviews as $review )
            <div class="row" style="color: rgb(228, 208, 179); 
            background-color:#bbca8d52;padding:10px;margin:10px;border-radius:20px;">

                <div class="col-3" style="margin-top:25px;">
                    <img src="{{URL::asset("uploads/".$review['patient_image'])}}" width="140px" height="90px" style="border-radius:15px;margin-left:50px;">

                </div>
                <div class="col-9">
                    <div class="row">
                        <h3 style="margin-left:20px;margin-top:25px;">Patient: {{$review['patient_name']}}</h3>
                    </div>
                    <div class="row">
    
                    
                        @if ($review['rating'] === 5)
                        <img src="{{URL::asset("images/5star.png")}}" 
                            width="140px" height="30px" style="border-radius:15px;margin-left:30px;">
                        
                        @elseif ($review['rating'] === 4)
                        <img src="{{URL::asset("images/4star.png")}}" 
                            width="140px" height="30px" style="border-radius:15px;margin-left:30px;">
                        
                        @elseif ($review['rating'] === 3)
                        <img src="{{URL::asset("images/3star.png")}}" 
                            width="140px" height="30px" style="border-radius:15px;margin-left:30px;">
                            
                        @elseif ($review['rating'] === 2)
                        <img src="{{URL::asset("images/2star.png")}}" 
                            width="140px" height="30px" style="border-radius:15px;margin-left:30px;">
    
                        @else
                        <img src="{{URL::asset("images/1star.png")}}" 
                            width="140px" height="30px" style="border-radius:15px;margin-left:30px;">
    
                    
                        @endif
                        <h5 style="margin-left: 15px;padding:10px;">Comment: {{$review['comment']}}</h5>
                    </div>

                </div>
                


        </div>
        
            
            @endforeach
        </div>
        

    </div>
@endsection