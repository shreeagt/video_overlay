


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
      overflow: hidden;
   }

   .d-none{
    display:none!important;
   }

.loader_cover {
  display: grid;
  place-content: center;
  height: 100vh;
  overflow: hidden;
}

.loading {
  text-align: center;
  /* width: min-content; */

}



.loading__text {
  font-weight: 500;
  font-size: 1.5rem;
  color:#1a80b2;
}

.loading_color{
   color:#1a80b2;
}

.loading__bar {
  position: relative;
  height: 5px;
  width: 12rem;
  background-color: darkgray;
  border-radius: 1em;
  overflow: hidden;
  margin:auto;
}

.loading__bar::after {
  position: absolute;
  top: 0;
  left: 0;
  content: "";
  width: 50%;
  height: 100%;
  background: linear-gradient(90deg, #fff5, rgba(230, 230, 230, 0.891));
  animation: loading-animation 1.3s infinite;
  border-radius: 1em;
}

@keyframes loading-animation {
  0% {
    left: -50%;
  }
  100% {
    left: 150%;
  }
}
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
    background-color: #0d6efd;
    color: #FFFFFF;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.noUi-connect {
    background: #0d6efd;
}


video#video-player {
    width: 300px;
}


.trim-slider-container {
    width: 300px;
    margin: auto;
}

/* Hover effect */
/* .download-button:hover {
  background-color: #45a049;
}

.download-button:active {
  background-color: #3e8e41;
} */

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
    background: #06dd72;
    color: black;
    border-radius: 20px;
    /* color: aliceblue; */
    margin: 20px;
}

span input {
    border: 1px solid #EAEAEA;
    border-radius: 6px;
    height: 55px;
    font-weight: 800;
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
    color: rgb(243, 248, 245);
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
    padding: 20px;
    background: #06dd72;
    color: black;
    border-radius: 20px;
    /* color: aliceblue; */
    margin: 20px;
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

a.logo.aj-logo {
    bottom: 30px;
}

.logo_location {
    bottom: 50px;
}


}
</style>
<style>
  /* Existing CSS styles */

  /* New CSS style for form elements */
  .thank_banner input[type="text"],
  .thank_banner select {
    display: inline-block;
    padding: 10px 15px;
    background: #feffff;
    color: rgb(28, 37, 5);
    border-radius: 15px;
    /* color: aliceblue; */
    width:70px;
    font-weight: 900;
    margin: 15px;
    border:none;
  }

  .thank_banner input[type="submit"] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
  }

  .thank_banner input[type="submit"]:hover {
      background-color: #45a049;
  }
</style>
<style>
  /* Existing CSS styles */

  /* Add new CSS style for submit button */
  .thank_banner input[type="submit"] {
      background-color: #4CAF50;
      color: #f1eded;
      transition: background-color 0.3s ease;
  }

  /* Add hover effect for submit button */
  .thank_banner input[type="submit"]:hover {
      background-color: #45a049;
  }

  /* Add active effect for submit button */
  .thank_banner input[type="submit"]:active {
      background-color: #3e8e41;
  }
</style>
<body>

  <div class="loader_cover d-none" id="loader_cover">
    <a href="#" class="logo opti-logo">
       <img src="{{asset('assets/images/home/optidew_dry_eye.png')}}" >
    </a>


    <div class="loading">
       <p class="loading__text">Processing...</p>
       <div class="loading__bar"></div>
       <p class="loading__text loading_color">While we are processing, keep blinking your Eyes</p>
    </div>
 </div>




    <a href="{{ route('trimvideo', ['id' => $video->id]) }}" class="logo aj-logo">
        <img src="{{asset('assets/images/ajanta-light.png')}}" >
    </a>

    <div class="thank_banner" id="thank_banner">

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

      <div class="text-center">
      <form method="post" action="{{ route('trimvideo', ['id' => $video->id]) }}">
        @csrf
        <div class="thank" style="text-align: center;margin:auto;">
        <video id="video-player" controls>
          <source src="{{ asset('videos/gallery/'.$video->video_path) }}" type="video/mp4">
        </video>
        <div class="trim-slider-container">
          <div id="trim-slider"></div>
        </div>
        <div class="un-timer">
          <div class="form-group">
            <label for="starttime">Start Time:</label>
            <input type="text" id="start-time" name="starttime" readonly>
          </div>
          <div class="form-group">
            <label for="endtime">End Time:</label>
            <input type="text" id="end-time" name="endtime" readonly>
          </div>
          <input type="hidden" id="video-id" name="video_id" value="{{ $video->id }}">
        </div>
        <button type="submit" class="download-button">Submit</button>
      </div>
    </form>

    <p class="empower-text">An educational initiative by the <span class="ajanta_color"><img src="{{asset('assets/images/ajanta_light_logo.png')}}" class="ajanta_cover" alt="ajanta"></span><span class="br"> makers of <img src="{{asset('/optidew_logo.png')}}" class="ajanta_cover optidew_logo" alt="ajanta"></span>
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


<script>
  document.addEventListener('DOMContentLoaded', () => {
     const form = document.querySelector('form');
     const loaderCover = document.getElementById('loader_cover');
    //  const videobg = document.getElementById('thank_banner');
     form.addEventListener('submit', (event) => {
        // event.preventDefault(); 

        loaderCover.classList.remove('d-none');
          //  videobg.classList.add('d-none');
          //  form.submit();
     
     });
  });
</script>

</body>
</html>