<?php
$v_id = $_GET['video_id'];

$servername = "shreeagt.cwbsnsfamiiq.ap-south-1.rds.amazonaws.com";
$username = "shreeagt_admin";
$password = "Cshreeagt080";
$dbname = "ajanta_overlay_eye";

$conn= new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die ("Connection failed". $conn->connect_error);
}

$v_sql = "SELECT * FROM videos where id=$v_id";
$v_result = $conn->query($v_sql);
// Check if any rows were returned
if ($v_result->num_rows > 0) {
    $v_row = $v_result->fetch_assoc();

    $dr_sql = "SELECT * FROM doctors where id=".$v_row["drid"];
    $dr_result = $conn->query($dr_sql);
    $dr_row = $dr_result->fetch_assoc();

    $video_path = $v_row["video_path"];

    $doctor_logo = $dr_row["logo"];
    $doctor_photo = $dr_row["photo"];

    $command = "ffmpeg -i /var/www/html/client/video_overlay/pre_shoot_4min.mp4 -vf ";
    $command .= "\"[in]drawtext=fontsize=40:fontcolor=White:text='Dr. ".$dr_row["firstname"]."':x=(w)/2.5:y=500, drawtext=fontsize=30:fontcolor=White:text='".$dr_row["speciality"]."':x=(w)/2.5:y=540, drawtext=fontsize=40:fontcolor=White:text='".$dr_row["lastname"]."':x=(w)/2.5:y=640, drawtext=fontsize=35:fontcolor=White:text='".$dr_row["city"]."':x=(w)/2.5:y=680[out]\"";
     $command .= " -y /var/www/html/client/video_overlay/public/videos/gallery/pre_video_".$video_path;
    system($command);

    $command = "ffmpeg -i /var/www/html/client/video_overlay/public/photos/$doctor_photo -s 250x250 /var/www/html/client/video_overlay/public/logos/dime_".$doctor_photo;
    system($command);

    $command = "ffmpeg -i /var/www/html/client/video_overlay/public/logos/$doctor_logo -s 250x250 /var/www/html/client/video_overlay/public/logos/dime_".$doctor_logo;
    system($command);

    $command = " ffmpeg -i /var/www/html/client/video_overlay/public/videos/gallery/pre_video_$video_path -i /var/www/html/client/video_overlay/public/logos/dime_$doctor_photo -filter_complex \"[1]scale=iw/2:-1[b];[0:v][b] overlay=800:300\" /var/www/html/client/video_overlay/public/videos/gallery/pre_video_final$video_path";
    system($command);


    $command = "ffmpeg -i /var/www/html/client/video_overlay/overlay_bg_5.png -vf ";
    $command .= "\"[in]drawtext=fontsize=40:fontcolor=White:text='Dr. ".$dr_row["firstname"]."':x=(w)/6:y=1000, drawtext=fontsize=35:fontcolor=White:text='".$dr_row["city"]."':x=(w)/2:y=1000[out]\"";
    $command .= " -y /var/www/html/client/video_overlay/public/logos/overlay_bg_".$doctor_logo;
    system($command);
    
    $command = "ffmpeg -i /var/www/html/client/video_overlay/public/logos/overlay_bg_$doctor_logo -i /var/www/html/client/video_overlay/public/logos/dime_$doctor_logo -filter_complex \"[1]scale=iw/2:-1[b];[0:v][b] overlay=50:50\" /var/www/html/client/video_overlay/public/logos/overlay_bg_logo_$doctor_logo";
    system($command);


    $command = "ffmpeg -i /var/www/html/client/video_overlay/public/logos/overlay_bg_logo_".$doctor_logo ." -i /var/www/html/client/video_overlay/public/videos/gallery/" . $video_path;
    $command .= " -filter_complex \"[0:v][1:v]";
    $command .= " overlay=200:200\""; // closing double quotes
    $command .= " -c:a copy /var/www/html/client/video_overlay/public/videos/gallery/output".$video_path;
    system($command);


    $content = "file '/var/www/html/client/video_overlay/public/videos/gallery/pre_video_final$video_path' \n file '/var/www/html/client/video_overlay/public/videos/gallery/output".$video_path."'";
    $textfile = uniqid();
    $fp = fopen("/var/www/html/client/video_overlay/public/videos/gallery/" .$textfile. ".txt","wb");
    fwrite($fp,$content);
    fclose($fp);

    $command = "ffmpeg -f concat -safe 0 -i /var/www/html/client/video_overlay/public/videos/gallery/$textfile.txt -c copy /var/www/html/client/video_overlay/public/videos/gallery/output_merge$video_path";
    system($command);

    $videoPath = "output_merge".$v_row["video_path"];
    $updateSql = "UPDATE videos SET outputvideo='$videoPath' WHERE id=$v_id";
    if ($conn->query($updateSql) === TRUE) {
        echo "Video path updated successfully.";
    } else {
        echo "Error updating video path: " . $conn->error;
    }

} else {
    echo "No videos found.";
}
 header("Location: /thank_you/".$v_id);

?>
