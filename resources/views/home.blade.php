<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>HOme</title>
</head>
<body>

  @auth
  <div class="container mt-4">
    <p>Congrats, You are logged in!</p>
    <form action="/logout" method="POST">
      @csrf
      <button class="btn btn-danger">Log out</button>
    </form>
  </div>
  <div class="container mt-4">
    <h2>Create a New Post</h2>
    <form action="/create-post" method="POST">
      @csrf
      <div class="mb-3">
        Title: <input name="title" type="text" class="form-control" placeholder="Title">
        body: <input name="body" type="text" class="form-control" placeholder="Body">
        <input type="submit" value="Save Post">
      </div>
    </form>
  </div>
  {{-- Showing posts --}}
  <div class="container mt-4">
      <h2>All Posts</h2>
      @foreach($posts as $post)
        <div class="bg-secondary p-2 m-2">
          <h3>{{$post['title']}} by {{$post->user->name}}</h3>
          <p>{{$post['body']}}</p>
          <p><a href="/edit-post/{{$post->id}}" class="btn btn-primary">Edit</a></p>
          <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">DELETE</button>
          </form>
        </div>
      @endforeach
  </div>
  @else
  {{-- Registration --}}
  <div class="container mt-5 bg-light">
    <h2>Register</h2>
    <form action="/register" method="POST">
      @csrf
      <div class="mb-3">
        Name: <input name="name" type="text" class="form-control">
      </div>
      <div class="mb-3">
        Email: <input name="email" type="text" class="form-control">
      </div>
      <div class="mb-3">
        Passsword: <input name="password" type="password" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
  {{-- Login --}}
  <div class="container mt-5 bg-light">
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf
      <div class="mb-3">
        Name: <input name="loginname" type="text" class="form-control">
      </div>
      <div class="mb-3">
        Passsword: <input name="loginpassword" type="password" class="form-control">
      </div>
      <button type="submit" class="btn btn-success">Login</button>
    </form>
  </div>
  @endauth
  
</body>
</html>