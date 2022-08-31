<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap cdn -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Post Blog</title>

</head>
<body>

<div class="container">
    <a href="./add-post.php" id="add-post" class="btn btn-primary mt-5">Add a Post</a>
    <form action="" method="POST">
    <label for="category">Select by Category: </label>
    <select name="category" id="category" class="mt-5">
        <option value="select a category" selected disabled>select a category</option>
        <option value=""></option>
        <option value=""></option>
    </select>
</form>
    <div class="row mt-5 blog-content">
     
    </div>


</div>

<script src="./script.js"></script>
 
</body>
</html>