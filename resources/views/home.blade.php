<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>
<body>
    {{-- Successfull registered --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
        
    @endif
    {{--End of Successfull registered --}}


    {{-- Error message --}}
    @if ($errors->any())

        
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <p>{{$error}}</p>
                </div>
            @endforeach
        

    @endif

    {{-- End of error message --}}

    @auth
        <p>Congrats you are logged in</p>
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-warning">Log Out</button>
        </form>

        <div style="border: 2px solid black; padding: 20px;">
            @if (session('post'))
            <div class="alert alert-success">
                {{session('post')}}
            </div>

            @endif
            <h2>Create Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" class="form-control mb-2" placeholder="Post Title">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Body content..." id="floatingTextarea2"
                        style="height: 100px" name="body"></textarea>
                    <label for="floatingTextarea2">Body Content...</label>
                </div>
                <button class="btn btn-primary">Upload</button>
            </form>
        </div>

        <div style="border: 2px solid black; padding: 20px;">
            @foreach ($posts as $post)
                <div style="background-color: grey; padding: 10px; margin: 10px;">
                    <h3>{{$post->title}}</h3>
                    {{$post->body}}
                    <div class="d-flex">
                    <a href="/edit-post/{{$post->id}}" class="btn btn-primary">Edit</a>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                </div>
                
            @endforeach
        </div>

    @else
        {{-- Register --}}
        <div style="border: 2px solid black; padding: 20px;">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" class="form-control mb-2" value="{{ old('name') }}" placeholder="Name">
                <input type="text" name="email" class="form-control mb-2" value="{{ old('email') }}" placeholder="Email">
                <input type="password" name="password" class="form-control mb-2" placeholder="Password">
                <button class="btn btn-primary">Register</button>
            </form>
        </div>

        {{-- Log In --}}
        <div style="border: 2px solid black; padding: 20px;" class="mt-2">
            <h2>Log In</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" name="logemail" class="form-control mb-2" value="{{ old('email') }}" placeholder="Email">
                <input type="password" name="logpassword" class="form-control mb-2" placeholder="Password">
                <button class="btn btn-primary">Log In</button>
            </form>

            @if (session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            
            @endif
        </div>
    @endauth

    
</body>
</html>