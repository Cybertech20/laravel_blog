<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="border: 2px solid black">
        <h1>Edit Post</h1>
        <form action="/edit-post/{{$post->id}}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{$post->title}}">
            <textarea name="body" id="">{{$post->body}}</textarea>
            <button>Save Changes</button>
        </form>
    </div>

</body>

</html>