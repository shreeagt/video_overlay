<?php
echo $_GET['video_id'];

header("Location: /thank_you/output_video=".$video->id);
?>