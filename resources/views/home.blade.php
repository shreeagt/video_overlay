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
      <div class="banner-wrapper pt-md-0 pt-5">
         <img src="{{asset('assets/images/agantaone-logo.png')}}" alt="logo" class="logo logoposition">
         {{-- <img src="{{asset('Optidewlogo.png')}}" alt="logo" class="logo logoposition"> --}}
         <div class="container">
            <div class="row justify-content-center align-items-center">
               <div class="col-lg-6">
                  <div class="img-shree-cover">
                     {{-- <img src="{{asset('assets/images/home/doc.png')}}" style="-webkit-animation: bounceHero 5s ease-in-out infinite;" class="img-fluid" alt="docs"> --}}
                     <img src="{{asset('assets/images/home/optidew_dry_eye.png')}}" style="-webkit-animation: bounceHero 5s ease-in-out infinite;" class="img-fluid" alt="docs">
                     {{-- <h2 class="redley-text">An initiative by</h2> --}}
                     <h2 class="redley-text"></h2>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="col-lg-12">
                     <div class="banner_text ">
                        <h1> Hello  Dr.<span style="color:brown">{{ $doctor->firstname }} </span><br>Please Upload your video<span class="red" style="color:red">.</span> </h1>
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
               </div>
            </div>
         </div>
 
      {{-- </div> --}}
      {{-- <div class="timeline-cover pt-4">
         <div class="text-center">
            <img src="{{asset('assets/images/ajanta-logo.png')}}" alt="logo" class="logo">
            <h1>ENHANCE YOUR DIGITAL PRESENCE<br>WITH<br>AJANTA PHARMA LIMITED!</h1>
         </div>
         <div class="timeline mt-5">
            <div class="timeline__item">
               <div class="timeline__image">
                  <img src="{{asset('assets/images/home/2.png')}}" alt="Image 1">
               </div>
               <div class="timeline__content">
                  <h3>1.Amplify Your
                     Online Influence
                  </h3>
                  <p>Our Social Media Manager will skyrocket
                     your online presence, positioning you as
                     the go-to eye specialist in your area.
                  </p>
               </div>
            </div>
            <div class="timeline__item">
               <div class="timeline__image">
                  <img src="{{asset('assets/images/home/3.png')}}" alt="Image 2">
               </div>
               <div class="timeline__content">
                  <h3>2.Expand Your
                     Patient Network
                  </h3>
                  <p>Tap into a vast pool of potential patients through
                     targeted social media strategies, allowing you to
                     grow your practice and increase appointments
                  </p>
               </div>
            </div>
            <div class="timeline__item">
               <div class="timeline__image">
                  <img src="{{asset('assets/images/home/4.png')}}" alt="Image 3">
               </div>
               <div class="timeline__content">
                  <h3>3.Engage and
                     Educate
                  </h3>
                  <p>Our expert will captivate your audience with
                     compelling content, delivering valuable eye care
                     information that establishes you as a trusted authority.
                  </p>
               </div>
            </div>
            <div class="timeline__item">
               <div class="timeline__image">
                  <img src="{{asset('assets/images/home/5.png')}}" alt="Image 4">
               </div>
               <div class="timeline__content">
                  <h3>4.Time-Efficient
                     Solution
                  </h3>
                  <p>Let our Social Media Manager handle the complexities
                     of social media, freeing up your valuable time to focus
                     on delivering exceptional patient care.
                  </p>
               </div>
            </div>
            <div class="timeline__item">
               <div class="timeline__image">
                  <img src="{{asset('assets/images/home/6.png')}}" alt="Image 5">
               </div>
               <div class="timeline__content">
                  <h3>5.Ignite Patient
                     Loyalty
                  </h3>
                  <p>Let our Social Media Manager handle the complexities
                     of social media, freeing up your valuable time to focus
                     on delivering exceptional patient care.
                  </p>
               </div>
            </div>
            <div class="timeline__item">
               <div class="timeline__image">
                  <img src="{{asset('assets/images/home/7.png')}}" alt="Image 6">
               </div>
               <div class="timeline__content">
                  <h3>6.Stay Ahead of
                     Competitors
                  </h3>
                  <p>With our cutting-edge social media strategies, you'll outshine
                     your competition, staying at the forefront of the ever-evolving
                     digital landscape.
                  </p>
               </div>
            </div>
         </div>
      </div> --}}
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

         // Submit the form
         form.submit();
      });
   });
</script>

{{-- <h2 class="redley-text"></h2> --}}

<script>
  // Get the target element
  const element = document.querySelector('.redley-text');
  // Define the text to be displayed
  const text = 'An initiative by';
  let index = 0;

  // Function to update the text content
  function updateText() {
    element.textContent = text.slice(0, index);

    // Increment the index until the whole text is displayed
    if (index < text.length) {
      index++;
      setTimeout(updateText, 100); // Delay between each letter (in milliseconds)
    }
  }

  // Call the function to start displaying the text
  updateText();
</script>

   </body>
</html>