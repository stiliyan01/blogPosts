<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My blog</title>
    <link rel="stylesheet" href="./css/app.css">
</head>
<body>


    @foreach ($posts as $post)
    <h1><a href="post/{{$post->slug}}">{{$post->title}}</a></h1>
    {{$post->excerpt}}
    @endforeach

<script src="./js/app.js"></script>
</body>
</html>
