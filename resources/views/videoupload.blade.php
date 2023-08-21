<!DOCTYPE html>
<html dir="ltr" lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="generator" content="Hugo 0.87.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- CSRF Token -->
      @stack('title')
      <!-- css file -->
      <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('theme/css/dashbord_navitaion.css')}}">
      <!-- Responsive stylesheet -->
      <link rel="stylesheet" href="{{asset('theme/css/responsive.css')}}">
      <link rel="stylesheet" href="{{asset('theme/css/home.css')}}">
      <!-- Favicon -->
      <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
      <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
   </head>

   <style>
     /* .banner-wrapper h1{
      font-size:18px;
      } */

   body{
      overflow: hidden;
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

video#myVideo {
   position: fixed;
       top: 0;
       left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
}

p.empower-text {
    font-size: 20px;
    color: aliceblue;
}

.opti-logo{
   top:10px;
   left:10px;
}

a.logo.aj-logo {
    left: unset;
    right: unset;
    bottom: 10px;
    top: auto;
}


@media screen and (max-width: 768px){

   .text-custom-center{
   text-align: center;
}
p.empower-text {
    font-size: 14PX;
}

a.logo.aj-logo {
    bottom: 50px;
    top: auto;
}
.a.logo.aj-logo{
   bottom: 50px;
}

.logoposition {
    bottom: 50px;
}


}


.loading_color{
   color:#1a80b2;
}
@keyframes loading-animation {
  0% {
    left: -50%;
  }
  100% {
    left: 150%;
  }
}
   </style>
   <body> 
      <div class="loader_cover d-none" id="loader_cover">
         <a href="#" class="logo opti-logo">
            <img src="{{asset('assets/images/home/zaha_logo_final.png')}}" >
         </a>


         <div class="loading">
            <p class="loading__text">Uploading...</p>
            <div class="loading__bar"></div>
            <p class="loading__text loading_color">While we are uploading, keep blinking your Eyes</p>
         </div>
      </div>

      <video id="myVideo"   autoplay loop muted>
         <source src="{{asset('assets/images/desk_banner.mp4')}}" class="d-none d-md-block" type="video/mp4">
         <source src="{{asset('assets/images/mob_banner.mp4')}}" class="d-block d-md-none" type="video/mp4">
       </video>

      {{-- <video src="{{asset('assets/images/desk_banner.mp4')}}" id="video_bg" autoplay></video> --}}
      <div class="banner-wrapper pt-md-0 pt-5">
         <a href="#" class="logo logoposition">
    
            <img src="{{asset('lynx-logo.png')}}" >
         </a>
       <a href="#" class="logo opti-logo">
            <img src="{{asset('assets/images/home/zaha_logo_final.png')}}" >
         </a>

         
         <a href="#" class="logo aj-logo">
            <img src="{{asset('assets/images/ajanta-light.png')}}" >
        </a>

         <a href="#" class="logo ">
         <img src="{{asset('assets/images/ajantaone-logo.png')}}" alt="logo" >
         </a>

         <div class="container">
            <div class="row justify-content-center align-items-center">
               <div class="col-lg-6">
                  <div class="col-lg-12">
                     <div class="banner_text ">
                        <h1> Hello,  <span style="color:#fff">You Can Upload </span><br>Please Upload your video. </h1>
                        <form action="{{ route('agtoutputupload', ['id' => $video->id]) }}" class="text-custom-center" method="post" enctype="multipart/form-data">
                           <div class="mt-2">
                              @include('layouts.partials.messages')
                          </div>
                           @csrf
                           <div class="drop-zone">
                           {{-- <input type="hidden" name="dr_id" value="{{ $doctor->id }}">
                           <input type="hidden" name="so_id" value="{{ $doctor->soid }}"> --}}
                              <span class="drop-zone__prompt">Drop file here or click to upload</span>
                              <input type="file" name="outputvideo" class="drop-zone__input">
                           </div>
                    
                           <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
              
                       </div>
                     </div>
               
                  </div>
                  <p class="empower-text text-center">An educational initiative by the <span class="ajanta_color"><img src="{{asset('assets/images/ajanta_light_logo.png')}}" class="ajanta_cover " alt="ajanta"></span><span class="br"> makers of <img src="{{asset('/zaha_logo_final.png')}}" class="ajanta_cover optidew_logo" alt="ajanta"></span>
                  </p>
               </div>
            </div>
         </div>
 
      <script>
         document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
           const dropZoneElement = inputElement.closest(".drop-zone");
         
           dropZoneElement.addEventListener("click", (e) => {
             inputElement.click();
           });
         
           inputElement.addEventListener("change", (e) => {
             if (inputElement.files.length) {
               updateThumbnail(dropZoneElement, inputElement.files[0]);
             }
           });
         
           dropZoneElement.addEventListener("dragover", (e) => {
             e.preventDefault();
             dropZoneElement.classList.add("drop-zone--over");
           });
         
           ["dragleave", "dragend"].forEach((type) => {
             dropZoneElement.addEventListener(type, (e) => {
               dropZoneElement.classList.remove("drop-zone--over");
             });
           });
         
           dropZoneElement.addEventListener("drop", (e) => {
             e.preventDefault();
         
             if (e.dataTransfer.files.length) {
               inputElement.files = e.dataTransfer.files;
               updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
             }
         
             dropZoneElement.classList.remove("drop-zone--over");
           });
         });
         
         
         function updateThumbnail(dropZoneElement, file) {
           let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
         
           
           if (dropZoneElement.querySelector(".drop-zone__prompt")) {
             dropZoneElement.querySelector(".drop-zone__prompt").remove();
           }
         
           
           if (!thumbnailElement) {
             thumbnailElement = document.createElement("div");
             thumbnailElement.classList.add("drop-zone__thumb");
             dropZoneElement.appendChild(thumbnailElement);
           }
         
           thumbnailElement.dataset.label = file.name;
         
  
           if (file.type.startsWith("image/")) {
             const reader = new FileReader();
         
             reader.readAsDataURL(file);
             reader.onload = () => {
               thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
             };
           } else {
             thumbnailElement.style.backgroundImage = null;
           }
         }
               
      </script>
 

 <script>
   document.addEventListener('DOMContentLoaded', () => {
      const form = document.querySelector('form');
      const loaderCover = document.getElementById('loader_cover');
      const videobg = document.getElementById('myVideo');
      form.addEventListener('submit', (event) => {
         event.preventDefault(); // Prevent the default form submission

         const fileInput = document.querySelector('.drop-zone__input');
         const allowedExtensions = ['mp4', 'avi', 'mov']; // Allowed video file extensions
         const maxSizeInBytes = 200 * 1024 * 1024; // 10MB

         const file = fileInput.files[0];

         // Check if a file is selected
         if (!file) {
            alert('Please select a file.');
            return;
         }

         // Check the file extension
         const fileName = file.name;
         const fileExtension = fileName.split('.').pop().toLowerCase();
         if (!allowedExtensions.includes(fileExtension)) {
            alert('Please select a valid video file.');
            return;
         }

         // Check the file size
         if (file.size > maxSizeInBytes) {
            alert('File size exceeds the limit of 200 MB.');
            return;
         }

         // Create a temporary video element to load the selected video
         // const videoElement = document.createElement('video');
         // videoElement.addEventListener('loadedmetadata', () => {
         //    const targetWidth = 16;
         //    const targetHeight = 9;
         //    const videoWidth = videoElement.videoWidth;
         //    const videoHeight = videoElement.videoHeight;

         //    const ratio = videoWidth / videoHeight;
         //    const expectedRatio = targetWidth / targetHeight;

         //    if (Math.abs(ratio - expectedRatio) > 0.01) {
         //       alert('The video must have a size ratio of 16:9.');
         //       return;
         //    }

            // Show the loader
            loaderCover.classList.remove('d-none');
            videobg.classList.add('d-none');

            // Submit the form
            form.submit();
         });

         // Set the video source to the selected file
         videoElement.src = URL.createObjectURL(file);
      });
</script>

{{-- <h2 class="redley-text"></h2> --}}


   </body>
</html>
