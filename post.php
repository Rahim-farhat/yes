<?php
    session_start();
    
?>
<?php
    include("connection.php");
    if(isset($_POST['submit_post'])){
        $image_link = mysqli_real_escape_string($conn, $_POST['image_link']);
        $Details = mysqli_real_escape_string($conn, $_POST['Details']);
        $Locations = mysqli_real_escape_string($conn, $_POST['Locations']);
        $Title = mysqli_real_escape_string($conn, $_POST['Title']);
        
        $sql1 = "INSERT INTO posting(title, images, locations, details) VALUES ('$Title', '$image_link', '$Locations', '$Details')";
        $sql2 = "INSERT INTO testing(a,b) VALUES ('$Title', '$Locations')";
        // Execute SQL statement
if ($conn->query($sql1) === TRUE) {
    echo  '<script>
        alert("Post Added ")
        window.location.href = "posts.php";
    </script>';
    header("Location: welcome.php");
} else {
    echo '<script>alert("Error: ' . $conn->error . '");</script>';
}

    }
?>
<?php
    include("navbar.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Create a New Post</h2>
    <form action="post.php" method="post" class="post-form">
        <label for="Title" class="form-label">Title:</label><br>
        <textarea id="Title" name="Title" rows="4" cols="50" class="form-textarea"></textarea><br>
        <label for="Locations" class="form-label">Location:</label><br>
        <textarea id="Locations" name="Locations" rows="4" cols="50" class="form-textarea"></textarea><br>
        <label for="Details" class="form-label">Details:</label><br>
        <textarea id="Details" name="Details" rows="4" cols="50" class="form-textarea"></textarea><br>
        <label for="image_link" class="form-label">Image Link:</label><br>
        <input type="text" id="image_link" name="image_link" class="form-input"><br><br>
        <input type="submit" id="btn" value="Post" name="submit_post" class="btn-submit">
    </form>
</body>
 
</html>

