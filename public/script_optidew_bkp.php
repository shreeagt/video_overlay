
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

//$dr_row["firstname"];
//$dr_row["lastname"];
//$dr_row["city"];
//$dr_row["speciality"];
$doctor_logo = $dr_row["logo"];


$command = "ffmpeg -i /var/www/html/client/video_overlay/overlay_bg_1.png -vf ";
$command .= "\"[in]drawtext=fontsize=30:fontcolor=Black:text='Dr. ".$dr_row["firstname"]."':x=(w)/4:y=50, drawtext=fontsize=30:fontcolor=Black:text='".$dr_row["lastname"]."':x=(w)/4:y=100, drawtext=fontsize=25:fontcolor=Black:text='".$dr_row["city"]."':x=(w)/4:y=140[out]\"";
 $command .= " -y /var/www/html/client/video_overlay/public/logos/overlay_bg_".$doctor_logo;
system($command);

//$command = "ffmpeg -i /var/www/html/client/video_overlay/public/logos/overlay_bg_".$doctor_logo . " -s 1080x1920 /var/www/html/client/video_overlay/public/logos/overlay_bg_l_".$doctor_logo;
//system($command);

$command = "ffmpeg -i /var/www/html/client/video_overlay/public/logos/$doctor_logo -s 250x250 /var/www/html/client/video_overlay/public/logos/dime_".$doctor_logo;
system($command);

$command = "ffmpeg -i /var/www/html/client/video_overlay/public/logos/overlay_bg_$doctor_logo -i /var/www/html/client/video_overlay/public/logos/dime_$doctor_logo -filter_complex \"[1]scale=iw/2:-1[b];[0:v][b] overlay=50:50\" /var/www/html/client/video_overlay/public/logos/overlay_bg_logo_$doctor_logo";
system($command);

$command = "ffmpeg -i /var/www/html/client/video_overlay/public/videos/gallery/" . $video_path . " -i /var/www/html/client/video_overlay/public/logos/overlay_bg_logo_".$doctor_logo;
$command .= " -filter_complex \"[0:v][1:v]";
$command .= " overlay=0:0\""; // closing double quotes
// save in a separate output file
$command .= " -c:a copy /var/www/html/client/video_overlay/public/videos/gallery/output".$video_path;
// execute the command
system($command);


$content = "file '/var/www/html/client/video_overlay/overlay_first.mp4' \n file '/var/www/html/client/video_overlay/public/videos/gallery/output".$video_path."'";
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

