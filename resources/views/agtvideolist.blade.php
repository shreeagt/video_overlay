

    <link rel="stylesheet" href="{{ asset('theme/css/video.css') }}">


    <div class="bg-light p-4 rounded">
        <h1>Video</h1>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped" border=10px>
            @php
                $i = 1;
            @endphp
                <thead>

                    <tr>
                        <th>Id</th>
                        <th>Doctor Name</th>
                        <th>Clinic Name</th>
                        <th>Email</th>
                        <th>Contact no</th>
                        <th>Location</th>
                        <th>Video Status</th>
                        <th>So Id</th>
                        <th>Start time</th>
                        <th>End Time</th>
                        {{-- <th>Clinic Name</th> --}}
                        <th>Play</th>
                        <th>Download</th>
                        <th>Dr. Photo</th>
                        <th>Dr. Logo</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($agtvideolist as $video)
                            @php
                                $video_for_modal = 'videos/gallery/' . $video->video_path;
                                $doctor_photo = asset('photos/' . $video->photo);
                                $doctor_logo = asset('logos/' . $video->logo);
                            @endphp
                            <tr>
                                <td>{{ $video->id }}</td>
                                <td>{{ $video->firstname }}</td>
                                <td>{{ $video->lastname }}</td>
                                <td>{{ $video->email }}</td>
                                <td>{{ $video->contacno }}</td>
                                <td>{{ $video->city }}</td>
                                <td>
                                    @if ($video->dr_video_status == '')
                                      pending
                                    @else
                                      {{ $video->dr_video_status }}
                                    @endif
                                  </td>                                
                                <td>{{ $video->so_id }}</td>
                                <td>{{ $video->starttime }}</td>
                                <td>{{ $video->endtime }}</td>
                                <td><a href="#" class="btn btn-info playbtn_video" id="playButton">Play</a></td>
                                <td> <a href="{{ asset($video_for_modal) }}" download class="btn btn-primary">Download</a></td>
                                <td>
                                    @if ($doctor_photo)
                                        <a href="{{ $doctor_photo }}"  class=" download btn btn-primary">Download Photo</a>
                                    @else
                                        <span class="text-muted">No photo available</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($doctor_logo)
                                        <a href="{{ $doctor_logo }}" class="download btn btn-primary">Download Logo</a>
                                    @else
                                        <span class="text-muted">No logo available</span>
                                    @endif
                                </td>
                                <div id="videoModal" class="modal open_video">
                                    <div class="modal-content">
                                        <span class="close close_video">&times;</span>
                                        <video src="{{ asset($video_for_modal) }}" controls
                                            style="justify-content-center align-item-center"></video>
                                    </div>
                                </div>
                            </tr>
                            @php $i++;@endphp
                        @endforeach
                        <tr>
                            {{-- <td colspan='6'>
                                <h1>No videos to show</h1>
                            </td> --}}
                        </tr>
                </tbody>



        </table>
    </div>


    <!-- Modal for the video player -->



<script>
    var playButton = document.getElementsByClassName("playbtn_video");
    console.log(playButton.length);
    var videoModal = document.getElementsByClassName("open_video");
    var closeModal = document.getElementsByClassName("close_video");
    var videoElement = document.getElementsByTagName("video");

    for (let i = 0; i < playButton.length; i++) {
        // console.log("ok");
        playButton[i].addEventListener("click", function() {
            videoModal[i].style.display = "flex";
        })
    }

    for (let i = 0; i < playButton.length; i++) {
        closeModal[i].addEventListener("click", function() {
            videoElement[i].pause();
            videoModal[i].style.display = "none";

        })
    }
</script>
