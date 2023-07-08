


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" />

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>

    <title>Ajanta Dry Eyes edit</title>
</head>
<style>
    body{
        font-family: 'Open Sans', sans-serif;
    }
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap');
    /* Default button styles */
    .download-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    margin-top: 10px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    border: none;
    background-color: #4CAF50;
    color: #FFFFFF;
    cursor: pointer;
    transition: background-color 0.3s ease;
}


video#video-player {
    width: 300px;
}


.trim-slider-container {
    width: 300px;
    margin: auto;
}

/* Hover effect */
.download-button:hover {
  background-color: #45a049;
}

/* Active effect */
.download-button:active {
  background-color: #3e8e41;
}

.thank {
    max-width: 600px;
    margin: 10px;
    text-align: center;
    /* background: rgba(25,129,179,0.5); */
    background: rgba(0,0,0,0.5);
    padding: 30px;
    border-radius: 20px;
}
.thank h1 {
    font-size: 50px;
    color: #75bdd9;
}

.thank h2 {
    font-size: 20px;
    color: #fff;
}

.thank_banner {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
        /* background-color: rgb(0, 0, 0); */
        position: relative;
    /* background-image: url('/assets/images/thank_you.jpg'); */
    background-image: url('/assets/images/login_banner.jpeg');
    background-repeat: no-repeat;
    background-position-y: center;
    background-position-x: center;
    background-size: cover;
    height: 100vh;
    display: flex;
    align-items: center;
    z-index: 0;

}

.thank_banner::before {
    display: block;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: -1;
    background-color: rgba(0, 0, 0, 0.15);
    padding: 0;
    width: 100%;
    content: '';
}

.thank span {
    display: inline-block;
    padding: 20px;
    background: #ffc107;
    color: black;
    border-radius: 50%;
    margin: 20px;
}

.preview{
    background: #ffc107;
}

.logo img {
    max-width: 150px;
}

.logo{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 4;
}

.logo_location {
    right: 10px;
    left: auto;
    top:unset;
    bottom: 10px;
}


video#videoPlayer {
    max-width: 200PX;
    max-height: 200PX;
}

.video_box {
    padding: 10px;
    background: #598b9e;
    border-radius: 20px;
    max-width: 300px;
    max-height: 300px;
}

.ajanta_cover{
    max-width:120px;
    vertical-align: middle;
}

.optidew_logo{
  display: block;
  margin: auto;
}

*{
    margin:0;
    padding:0;
}

p.empower-text {
    font-size: 20px;
    color: aliceblue;
    text-align: center;
}

.opti-logo{
   top:10px;
   left:10px;
}

span.br {
    display: block;
}

a.logo.aj-logo {
    bottom: 10px;
    top: unset;
    left: 10px;
}

@media screen and (max-width:1024px){
    p.empower-text {
    font-size: 18px;
}
}
@media screen and (max-width: 768px){
    .ajanta_cover{
    max-width:100px;
}

span.br {
    display: block;
}

.thank_banner {
    width: auto;
    padding: 10px;
}

.thank span {
    display: inline-block;
    padding: 14px;
    margin: 15px;
}

.thank {
    margin: 10px;
    padding: 20px;
    border-radius: 20px;
}

.thank h1 {
    font-size: 20px;
    color: #75bdd9;
}

a.logo.aj-logo {
    left: 10px;
    right: unset;
}
.logo img {
    max-width: 80px;
}

p.empower-text {
    font-size: 14PX;
}
}

@media screen and (max-width: 768px){
    .thank_banner {
    /* background-image: url('/assets/images/thank_mob.png'); */
    background-image: url('/assets/images/login_mob.jpeg');
}
}
</style>
<body>

    <a href="/" class="logo">
        {{-- <img src="{{asset('Optidewlogo.png')}}"> --}}
        <img src="{{asset('assets/images/ajantaone-logo.png')}}">
      </a>

      <a href="#" class="logo opti-logo">
        <img src="{{asset('assets/images/home/optidew_dry_eye.png')}}" >
     </a>
     
    <a href="/" class="logo logo_location">
        {{-- <img src="{{asset('Optidewlogo.png')}}"> --}}
        <img src="{{asset('lynx-logo.png')}}">
      </a>

    <a href="#" class="logo aj-logo">
        <img src="{{asset('assets/images/ajanta-light.png')}}" >
    </a>

    <div class="thank_banner">
        <div class="text-center" >
        <div class="thank" style="text-align: center;margin:auto;">
            <video id="video-player"  controls>
              <source src="{{ asset('videos/gallery/'.$video->video_path) }}" type="video/mp4">
            </video>
            <div class="trim-slider-container">
              <div id="trim-slider"></div>
            </div>
            <div class="un-timer">
              <span>
              <label for="start-time">Start Time:</label>
              <input type="text" id="start-time" name="start-time" readonly>
            </span>
            <span>
              <label for="end-time">End Time:</label>
              <input type="text" id="end-time" name="end-time" readonly>
            </span>
            </div>
        
            <div>
              <button id="play-btn">Play Trimmed Video</button>
            </div>
            
            <div id="preview-container"></div>
            
          </div>

        </div>
     
        </p>
    </div>
    </div>


    <script>
      // Initialize the video player
      const videoPlayer = document.getElementById('video-player');
      const trimSlider = document.getElementById('trim-slider');
      const startTimeInput = document.getElementById('start-time');
      const endTimeInput = document.getElementById('end-time');
      const playBtn = document.getElementById('play-btn');
      let startTime = 0;
      let endTime = 0;
      let previewVideo = null;
      
      // Calculate the video duration
      videoPlayer.addEventListener('loadedmetadata', function() {
        const videoDuration = videoPlayer.duration;
      
        // Initialize the noUiSlider
        noUiSlider.create(trimSlider, {
          start: [0, videoDuration],
          connect: true,
          range: {
            'min': 0,
            'max': videoDuration
          }
        });
      
        // Update the start and end time inputs when the slider values change
        trimSlider.noUiSlider.on('update', function(values, handle) {
          startTime = parseFloat(values[0]);
          endTime = parseFloat(values[1]);
      
          startTimeInput.value = formatTime(startTime);
          endTimeInput.value = formatTime(endTime);
        });
      
        // Update the video player time based on the slider values
        trimSlider.noUiSlider.on('slide', function(values, handle) {
          const startValue = parseFloat(values[0]);
      
          videoPlayer.currentTime = startValue;
        });
      });
      
      // Create and play the trimmed preview video
      playBtn.addEventListener('click', function() {
        if (previewVideo) {
          // Remove the existing preview video if it exists
          previewVideo.parentNode.removeChild(previewVideo);
          previewVideo = null;
        }
      
        const videoSource = `{{ asset('videos/gallery/'.$video->video_path) }}#t=${startTime},${endTime}`;
      
        previewVideo = document.createElement('video');
        previewVideo.width = 400;
        previewVideo.controls = true;
      
        const sourceTag = document.createElement('source');
        sourceTag.src = videoSource;
        sourceTag.type = 'video/mp4';
      
        previewVideo.appendChild(sourceTag);
      
        const fallbackMessage = document.createTextNode('');
        previewVideo.appendChild(fallbackMessage);
      
        const previewContainer = document.getElementById('preview-container');
        previewContainer.innerHTML = '';
        previewContainer.appendChild(previewVideo);
      });
      
      // Helper function to format time in HH:MM:SS format
      function formatTime(time) {
        const hours = Math.floor(time / 3600);
        const minutes = Math.floor((time % 3600) / 60);
        const seconds = Math.floor(time % 60);
      
        return `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
      }
      
      // Helper function to pad single digits with leading zeros
      function pad(number) {
        return String(number).padStart(2, '0');
      }
      
          </script>

</body>
</html>