@extends('layouts.app-master')

@section('content')

<link rel="stylesheet" href="{{asset('theme/css/video.css')}}">


    <div class="bg-light p-4 rounded">
        <h1>Video</h1>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            @php
                $i=1;
            @endphp
            @if(Auth::user()->hasRole('so'))
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Clinick Name</th>  
                    <th>Button</th>
                    <th>Video status</th> 
                    <th>Play</th>                   
                </tr>
            </thead>
            <tbody>
                @foreach($videos as $video)
                    <tr>
                        @php
                        $video_for_modal="videos/gallery/".$video->video_path;
                    @endphp
                        <td>{{$i}}</td>
                        <td>{{$video->firstname}}</td>
                        <td>{{$video->lastname}}</td>
                        <td>
                            @if($video->dr_video_status=="")
                            <a href ="{{ route('videoList.update', $column_id=$video->id)}}" class="btn btn-success">Approve</a>
                            <a href ="{{ route('videoLiist.reject', $column_id=$video->id)}}" class="btn btn-danger btn-info">Reject</a>
                            @else
                            <a href ="#" class="btn btn-secondary ">Approve</a>
                            <a href ="#" class="btn btn-secondary ">Reject</a>
                            @endif
                        </td>
                         <td>
                            @if($video->dr_video_status=="")
                            <a href ="#" class="btn btn-warning">Pending</a>
                            @elseif($video->dr_video_status=="Approved")
                            <a href ="#" class="btn btn-primary">Approve</a>
                            @else
                            <a href ="#" class="btn btn-dark">Rjected</a>
                            @endif
                        </td>
                        <td><a href ="#" class="btn btn-info playbtn_video" id="playButton">Play</a></td>
                        <div id="videoModal" class="modal open_video">
                            <div class="modal-content">
                              <span class="close close_video">&times;</span>
                              <embed src="{{asset($video_for_modal)}}" controls autoplay style="justify-content-center align-item-center"/>
                            </div>
                          </div>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>

            @else          
            <thead>
        
                <tr>
                    <th>So Name</th>
                    <th>Doctor Name</th>
                    <th>Clinick Name</th> 
                    <th>Clinick Address</th> 
                    <th>Play</th>                   
                </tr>
            </thead>
            <tbody>
                @foreach($doctor_details as $details)
                @php
                $video_for_modal="videos/gallery/".$details->video_path;
            @endphp
                    <tr>

                        @foreach($so_details as $so_detail)
                        @if($so_detail->id==$details->soid)
                        <td>{{$so_detail->firstname}}</td>
                        @endif
                        @endforeach
                        <td>{{$details->firstname}}</td>
                        <td>{{$details->lastname}}</td>
                        <td>{{$details->city}}</td>
                        <td><a href ="#" class="btn btn-info playbtn_video" id="playButton">Play</a></td>
                        <div id="videoModal" class="modal open_video">
                            <div class="modal-content">
                              <span class="close close_video">&times;</span>
                              <embed src="{{asset($video_for_modal)}}" controls autoplay style="justify-content-center align-item-center"/>
                            </div>
                    </tr>
                @endforeach
            </tbody>
            @endif 

           
            
        </table>
    </div>


     <!-- Modal for the video player -->
    
  <script>
    var playButton = document.getElementsByClassName("playbtn_video");console.log(playButton.length);
    var videoModal = document.getElementsByClassName("open_video");
    var closeModal = document.getElementsByClassName("close_video");

    for (let i = 0; i < playButton.length; i++) {
       // console.log("ok");
        playButton[i].addEventListener("click", function() {
       videoModal[i].style.display = "flex";
     })
    }

    for (let i = 0; i < playButton.length; i++) {
        closeModal[i].addEventListener("click", function() {
       videoModal[i].style.display = "none";
     })
    }

    // Open the modal when the button is clicked
    // playButton.addEventListener("click", function() {
    //   videoModal.style.display = "flex";
    // });

    // // Close the modal when the close button is clicked
    // closeModal.addEventListener("click", function() {
    //   videoModal.style.display = "none";
    // });
  </script>
@endsection
