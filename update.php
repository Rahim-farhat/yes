<?php
    session_start();
    include("connection.php");
    include("navbar.php");

    // Check if user is logged in
    if(!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    // Fetch user's current information
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Update user's information if form is submitted
    if(isset($_POST['update'])) {
        $newUsername = mysqli_real_escape_string($conn, $_POST['new_username']);
        $newEmail = mysqli_real_escape_string($conn, $_POST['new_email']);
        $newPassword = $_POST['new_password'];

        if (empty($newPassword)) {
            $newPassword = $row['password'];
        }

        $updateSql = "UPDATE users SET username = '$newUsername', email = '$newEmail', password = '$newPassword' WHERE username = '$username'";
        if(mysqli_query($conn, $updateSql)) {
            echo '<script>alert("Information updated successfully!");</script>';
        } else {
            echo '<script>alert("Error updating information!");</script>';
        }
        
    }

    if(isset($_POST['delete'])) {
        $deleteSql = "DELETE FROM users WHERE username = '$username'";
        if(mysqli_query($conn, $deleteSql)) {
            session_unset(); // unset all session variables
            session_destroy(); // destroy the session
            echo '<script>alert("User deleted!");</script>';
            header("Location: login.php");
            exit();
        } else {
            echo '<script>alert("Error deleting account!");</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Info</title>
    <title>WarningNow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post" class="post-form">
    <h2>Update Profile</h2>
        <label for="new_username">New Username:</label><br>
        <input type="text" id="new_username" name="new_username" value="<?php echo $row['username']; ?>"><br><br>
        
        <label for="new_email">New Email:</label><br>
        <input type="email" id="new_email" name="new_email" value="<?php echo $row['email']; ?>"><br><br>
        
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password"><br><br>
        
        <input class="btn btn-warning mx-2" type="submit" name="update" value="Update">
        
    </form>
    <form action="" method="post" class="deletecon">
        <input type="submit" name="delete" value="Delete Account" class="delete">
    </form>
</body>
<footer>
        <div class="container">
            <p>&copy; 2024 WarningNow. All rights reserved.</p>
        </div>
    </footer>
</html>
