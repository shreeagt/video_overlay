<!DOCTYPE html> 
<html>
<head>
    <title>Video Viewers</title>
    <!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" />

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>

</head>
<style>
.trim-slider-container {
  position: relative;
  margin-bottom: 20px;
}

.trim-slider-container {
    width: 300px;
}

video#video-player {
    width: 300px;
}
*{
  margin: 0;
  padding:0;
}
</style>
<body>
    <h1>Video Viewer</h1>

    {{-- <video controls>
        <source src="{{ asset('videos/gallery/'.$video->video_path) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video> --}}
    <video id="video-player"  controls>
      <source src="{{ asset('videos/gallery/'.$video->video_path) }}" type="video/mp4">
    </video>
    


    
    <div class="trim-slider-container">
      <div id="trim-slider"></div>
    </div>
    

    <div>
      <label for="start-time">Start Time:</label>
      <input type="text" id="start-time" name="start-time" readonly>
    </div>
    
    <div>
      <label for="end-time">End Time:</label>
      <input type="text" id="end-time" name="end-time" readonly>
    </div>

    <div>
      <button id="play-btn">Play Trimmed Video</button>
    </div>
    
    <div id="preview-container"></div>
    
    <div id="preview-container"></div>
    {{-- <h2>Video Details:</h2>
    <ul>
        <li>Video ID: {{ $video->id }}</li>
        <li>DR ID: {{ $video->drid }}</li>
        <li>SO ID: {{ $video->so_id }}</li>
    </ul> --}}

    {{-- <script>
        setTimeout(function() {
            window.location.href = '/script_optidew.php?video_id={{ $video->id }}';
        }, 5000); 
    </script> --}}

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
