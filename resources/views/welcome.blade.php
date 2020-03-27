<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos em Vídeo - Brasil</title>
</head>
<body>
    <video src="./abella.mp4" width="400" height="400">
        <source>
    </video>

    <video width="400" controls>
        <source src="{{ asset('videos/teste.mp4') }}" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
</body>
</html>
