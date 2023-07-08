<!DOCTYPE html>
<html>
<head>
    <title>Video Viewer</title>
</head>
<body>
    <h1>Video Viewer</h1>

    <video controls>
        <source src="{{ asset('videos/gallery/'.$video->video_path) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <h2>Video Details:</h2>
    <ul>
        <li>Video ID: {{ $video->id }}</li>
        <li>DR ID: {{ $video->drid }}</li>
        <li>SO ID: {{ $video->so_id }}</li>
    </ul>

    <script>
        setTimeout(function() {
            window.location.href = '/script_optidew.php?video_id={{ $video->id }}';
        }, 5000); // Redirect after 5 seconds
    </script>
</body>
</html>
