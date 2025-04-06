<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Post</title>
  <style>
   /* body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      padding: 30px;
    }*/

   /* .form-container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
*/
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 16px;
    }

    textarea {
      resize: vertical;
      height: 150px;
    }

    button {
      margin-top: 20px;
      padding: 10px 20px;
      background: #007BFF;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Create a New Post</h2>
    <form action="#" method="POST">
      <label for="title">Title</label>
      <input type="text" id="title" name="title" required>

      <label for="content">Content</label>
      <textarea id="content" name="content" required></textarea>

      <button type="submit">Create Post</button>
    </form>
  </div>
</body>
</html>
