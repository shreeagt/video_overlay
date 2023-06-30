<?php
$v_id = $_GET['video_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "videooverlay";

$conn= new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
    die ("Connection failed". $conn->connect_error);
}

$v_sql = "SELECT * FROM videos where id=$v_id";
$v_result = $conn->query($v_sql);
// Check if any rows were returned
if ($v_result->num_rows > 0) {
    $v_row = $v_result->fetch_assoc(); 
    echo "Video ID: " . $v_row["id"] . "<br>";
    echo "Dr id: " . $v_row["drid"] . "<br>";
    echo "<br>";


    $dr_sql = "SELECT * FROM doctors where id=".$v_row["drid"];
    $dr_result = $conn->query($dr_sql);
    $dr_row = $dr_result->fetch_assoc(); 
    echo "Dr Name: " . $dr_row["firstname"] . "<br>";
    echo "Clinic id: " . $dr_row["lastname"] . "<br>";
    echo "Logo id: " . $dr_row["logo"] . "<br>";
    echo "City : " . $dr_row["city"] . "<br>";
    echo "Speciality : " . $dr_row["speciality"] . "<br>";
    echo "<br>";


    $videoPath = $v_row["video_path"];
    $updateSql = "UPDATE videos SET outputvideo='$videoPath' WHERE id=$v_id";
    if ($conn->query($updateSql) === TRUE) {
        echo "Video path updated successfully.";
    } else {
        echo "Error updating video path: " . $conn->error;
    }

} else {
    echo "No videos found.";
}
// header("Location: /thank_you/output_video=".$video->id);

?>