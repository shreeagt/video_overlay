<?php
$file = "https://optidew-dryeye-awareness-month.bombaytech.com/videos/gallery/64a81356e858c.mp4";
$thumb_start = "thumbnail1.jpg";
$thumb_finish = "thumbnail2.jpg";

if (isset($_POST['time_string'])) {
    if ($_POST['type'] === 'start') {
        exec("ffmpeg -y -ss {$_POST['time_string']} -i $file -vframes 1 -q:v 1 $thumb_start");
    } else {
        exec("ffmpeg -y -ss {$_POST['time_string']} -i $file -vframes 1 -q:v 1 $thumb_finish");
    }
} elseif (!file_exists("thumbnail1.jpg") || !file_exists("thumbnail2.jpg")) {
    exec("ffmpeg -y -ss 00:00:01 -i $file -vframes 1 -q:v 1 $thumb_start");
    exec("ffmpeg -y -ss 00:00:01 -i $file -vframes 1 -q:v 1 $thumb_finish");
}
?>
<html lang="en">
<head>
    <title>Create video trim command concept</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.0/litera/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="text-center">Create video trim command</h2>
                </div>
                <div class="card-body px-4">
                    <div class="row">
                        <div class="col-6">
                            <?php
                            function getSeconds(string $file): float
                            {
                                return exec("ffprobe -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 $file");
                            }

                            $seconds = getSeconds($file);
                            ?>
                            <img id="thumbnail-start" class="img-fluid" src="<?= $thumb_start ?>" width="100%"
                                 alt="<?= $file ?> video thumbnail">
                        </div>
                        <div class="col-6">
                            <img id="thumbnail-finish" class="img-fluid" src="<?= $thumb_finish ?>" width="100%"
                                 alt="<?= $file ?> video thumbnail">
                        </div>
                    </div>
                    <div class="row text-center mt-4">
                        <div id="slider"></div>
                    </div>
                    <div class="row text-center mt-3">
                        <div class="col-6">
                            <p>Start: <code><span class="start">00:00:01</span></code></p>
                        </div>
                        <div class="col-6">
                            <p>Finish: <code><span class="finish"><?= gmdate("H:i:s", $seconds) ?></span></code></p>
                        </div>
                    </div>
                    <div class="row text-center mt-3">
                        <div class="col-12">
                            <code>ffmpeg -ss <span class="start">00:00:00</span> -i INPUT.mp4 -t <span class="finish">00:00:00</span>
                                -c copy OUTPUT.mp4</code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
<script type="application/javascript">
    let slider = document.getElementById("slider");

    noUiSlider.create(slider, {
        start: [0, <?=$seconds?>],
        connect: true,
        step: 1,
        range: {
            min: 0,
            max: <?=$seconds?>
        }
    });

    let start_element = document.getElementsByClassName("start");
    let finish_element = document.getElementsByClassName("finish");

    slider.noUiSlider.on("change", function (values, handle) {
        let old_start = start_element[0].innerHTML;
        let old_finish = finish_element[0].innerHTML;
        let slider_values = slider.noUiSlider.get();
        let start_string = new Date(slider_values[0] * 1000).toISOString().substr(11, 8);
        let finish_string = new Date(slider_values[1] * 1000).toISOString().substr(11, 8);
        let duration = new Date((slider_values[1] - slider_values[0]) * 1000).toISOString().substr(11, 8);
        start_element[0].innerHTML = start_string;
        start_element[1].innerHTML = start_string;
        finish_element[0].innerHTML = finish_string;
        finish_element[1].innerHTML = duration;
        if (old_start !== start_string) {
            createThumb(start_string, 'start');
        }
        if (old_finish !== finish_string) {
            createThumb(finish_string, 'finish');
        }
    });

    function createThumb(time, type) {
        $.ajax({
            type: "POST",
            url: "index.php",
            data: {"time_string": time, "type": type},
            success: function (result) {
                let d = new Date();
                if (type === 'start') {
                    $("#thumbnail-start").attr("src", "thumbnail1.jpg?" + d.getTime());
                } else {
                    $("#thumbnail-finish").attr("src", "thumbnail2.jpg?" + d.getTime());
                }
            }
        });
    }

</script>
</body>
</html>
