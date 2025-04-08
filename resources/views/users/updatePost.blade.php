<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Post</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      padding: 2rem;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 1rem;
      font-size: 1rem;
      resize: vertical;
    }

    button {
      width: 100%;
      padding: 0.75rem;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50;
      color: white;
      font-size: 1rem;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Update Post</h2>
    <form action="{{route('post.update')}}" method="POST">
     
      <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
      <input type="hidden" name="id" value="{{$post['id']}}"> 

      <label for="title">Title</label>
      <input type="text" id="title" name="title" value="{{$post['title']}}">

      <label for="content">Content</label>
      <textarea id="content" name="content" rows="6">{{$post['content']}}</textarea>

      <button type="submit">Update</button>
    </form>
  </div>

</body>
</html>
