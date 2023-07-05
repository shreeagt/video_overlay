<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Ajanta Dry Eyes Thankyou</title>
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
    bottom: 10px;
    left: 10px;
    z-index: 4;
}

.logo_location {
    right: 10px;
    left: auto;
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
    max-width:150px;
    vertical-align: middle;
}
*{
    margin:0;
    padding:0;
}

p.empower-text {
    font-size: 30px;
    color: aliceblue;
    text-align: center;
}

.opti-logo{
   top:10px;
   left:10px;
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

    <div class="thank_banner">
        <div class="text-center" >
        <div class="thank" style="text-align: center;margin:auto;">
            <h1>THANK YOU!</h1>
            {{-- <div>
                <span><i class="fa fa-check" style="font-size:36px"></i></span>
            </div>
            <div>
                <h2>Preview</h2>
                <video id="videoPlayer" controls>
                    <source src="/videos/gallery/{{ $video->video_path }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div> --}}

            <div>
                <span><i class="fa fa-check" style="font-size:36px"></i></span>
            </div>
            <div class="video_box" style="text-align: center;margin:auto;">
                <h2 style="">Preview</h2>
                <video id="videoPlayer" controls>
                    {{-- <source src="{{asset('/videos/gallery/sample-5s.mp4')}}" type="video/mp4"> --}}
                    <source src="/videos/gallery/{{ $video->outputvideo }}" type="video/mp4">
            
                  </video>
            </div>

            <button class="download-button">Download</button>
        </div>
        <p class="empower-text text-center">"An educational initiative by the <span class="ajanta_color"><img src="{{asset('assets/images/ajanta-light.png')}}" class="ajanta_cover" alt="ajanta"></span><span class="br"> makers of <img src="{{asset('/Optidewlogo.png')}}" class="ajanta_cover" alt="ajanta">"</span>
        </p>
    </div>
    </div>

    <script>
        document.querySelector('.download-button').addEventListener('click', function() {
            var videoSrc = document.querySelector('video source').getAttribute('src');
            var link = document.createElement('a');
            link.href = videoSrc;
            link.download = videoSrc.split('/').pop();
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>
</body>
</html>