<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- bootstrap cdn -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Post Blog</title>
    <title>Add Post</title>

</head>
<body>
    <div class="container mt-5 p-5">
        <h1>Add a new Post</h1>
 <form>
  <div class="form-group mb-5">
    <label for="title" class="fw-bold">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group mb-5">
    <label for="author" class="fw-bold">Author</label>
    <input type="text" class="form-control" id="author" name="author">
  </div>
  <div class="form-group mb-5">
    <label for="category" class="fw-bold mb-2">Select a Category</label>
    <select class="form-control" id="category" name="category">
      
    </select>
  </div>
   <div class="form-group mb-5">
    <label for="body" class="fw-bold">Body</label>
    <textarea class="form-control" id="body" rows="3" name="body"></textarea>
  </div>
  <button type="button" class="btn btn-primary" class="add-post">Submit</button>
</form>
        
    </div>
<script src="./add-post.js"></script>
</body>
</html>