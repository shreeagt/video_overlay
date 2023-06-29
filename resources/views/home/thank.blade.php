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
    margin: auto;
    text-align: center;
    /* background: rgba(25,129,179,0.5); */
    background: rgba(0,0,0,0.5);
    padding: 30px;
    border-radius: 20px;
}
.thank h1 {
    font-size: 70px;
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


*{
    margin:0;
    padding:0;
}
</style>
<body>
    <div class="thank_banner">
        <div class="thank">
            <h1>THANK YOU!</h1>
                <div>
                    <span><i class="fa fa-check" style="font-size:36px"></i></span>
                </div>
                <div>
                    <h2 style="">Preview</h2>
                    <video id="videoPlayer" controls>
                        <source src="path_to_your_video.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                </div>
                
            {{-- <button class="download-button preview">Preview</button> --}}
            <button class="download-button">Download</button>
        </div>
    </div>
</body>
</html>