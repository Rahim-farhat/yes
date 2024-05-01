<?php

    session_start();
    include("connection.php");
    $sql = "SELECT * FROM posting";
    $result = $conn->query($sql);
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
  <?php
    include "navbar.php";
    ?>
    
    <div id="form">
        <h1>All Posts</h1>
    <div class="post-container">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="post">
                <h2><?php echo $row['title']; ?></h2>
                <img src="<?php echo $row['images']; ?>" alt="Post Image">
                <p><strong>Location:</strong> <?php echo $row['locations']; ?></p>
                <p><strong>Details:</strong> <?php echo $row['details']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>