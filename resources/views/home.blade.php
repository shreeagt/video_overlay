<!DOCTYPE html>
<html dir="ltr" lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
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
  width: min-content;

}

.loading__text {
  font-weight: 500;
  font-size: 2rem;
}

.loading__bar {
  position: relative;
  height: 5px;
  width: 12rem;
  background-color: darkgray;
  border-radius: 1em;
  overflow: hidden;
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
    font-size: 30px;
    color: aliceblue;
}

.opti-logo{
   top:10px;
   left:10px;
}

@media screen and (max-width: 768px){

p.empower-text {
    font-size: 14PX;
}
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
         <div class="loading">
            <p class="loading__text">Processing...</p>
            <div class="loading__bar"></div>
         </div>
      </div>

      <video id="myVideo"   autoplay loop muted>
         <source src="{{asset('assets/images/desk_banner.mp4')}}" class="d-none d-md-block" type="video/mp4">
         <source src="{{asset('assets/images/mob_banner.mp4')}}" class="d-block d-md-none" type="video/mp4">
       </video>

      {{-- <video src="{{asset('assets/images/desk_banner.mp4')}}" id="video_bg" autoplay></video> --}}
      <div class="banner-wrapper pt-md-0 pt-5">
       <a href="#" class="logo ">
            <img src="{{asset('lynx-logo.png')}}" >
         </a>
       <a href="#" class="logo opti-logo">
            <img src="{{asset('assets/images/home/optidew_dry_eye.png')}}" >
         </a>
         <a href="#" class="logo logoposition">
         <img src="{{asset('assets/images/ajantaone-logo.png')}}" alt="logo" >
         </a>
         {{-- <img src="{{asset('Optidewlogo.png')}}" alt="logo" class="logo logoposition"> --}}
         <div class="container">
            <div class="row justify-content-center align-items-center">
               {{-- <div class="col-lg-6">
                  <div class="img-shree-cover">
                    
                     <img src="{{asset('assets/images/home/optidew_dry_eye.png')}}" style="-webkit-animation: bounceHero 5s ease-in-out infinite;" class="img-fluid" alt="docs">
               
                     <h2 class="redley-text"></h2>
                  </div>
               </div> --}}
               <div class="col-lg-6">
                  <div class="col-lg-12">
                     <div class="banner_text ">
                        <h1> Hello,  <span style="color:#fff">Dr. {{ $doctor->firstname }} </span><br>Please Upload your video<span class="red" style="color:red">.</span> </h1>
                        <form action="{{ route('doctors.upload') }}" method="post" enctype="multipart/form-data">
                           <div class="mt-2">
                              @include('layouts.partials.messages')
                          </div>
                           @csrf
                           <div class="drop-zone">
                           <input type="hidden" name="dr_id" value="{{ $doctor->id }}">
                           <input type="hidden" name="so_id" value="{{ $doctor->soid }}">
                              <span class="drop-zone__prompt">Drop file here or click to upload</span>
                              <input type="file" name="video_path" class="drop-zone__input">
                           </div>
                    
                           <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
              
                       </div>
                     </div>
               
                  </div>
                  <p class="empower-text text-center">"An educational initiative by the <span class="ajanta_color"><img src="{{asset('assets/images/ajanta-light.png')}}" style="max-width: 150px" alt="ajanta"></span> makers of <img src="{{asset('/Optidewlogo.png')}}" style="max-width: 150px" alt="ajanta">"
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
         
           // Show thumbnail for image files
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
         const maxSizeInBytes = 10 * 1024 * 1024; // 10MB

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
            alert('File size exceeds the limit of 10MB.');
            return;
         }

         // Show the loader
         loaderCover.classList.remove('d-none');
         videobg.classList.add('d-none')
         // Submit the form
         form.submit();
      });
   });
</script>

{{-- <h2 class="redley-text"></h2> --}}


   </body>
</html>