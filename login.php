<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: welcome.php");
    }
?>
<?php
$login = false;
    include('connection.php');
    if (isset($_POST['submit'])) {
        $email = $_POST['user'];
        $password = $_POST['pass'];


$sql = "SELECT * FROM users WHERE (username='$email' OR email='$email') AND password='$password'";

echo $sql;

// Execute SQL query
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Matching record found
    $row = $result->fetch_assoc();

    // Store data in session variables
    $_SESSION['email'] = $row['email']; 
    $_SESSION['username']= $row['username'];
    $_SESSION['loggedin'] = true;


    header("Location: welcome.php");

    echo  '<script>
                        
    alert("Welcome!!")
    window.location.href = "welcome.php";
</script>';




    
    echo "<script>setTimeout(function() { window.location.href = 'welcome.php'; }, 2000);</script>";
} else {
    // No matching record found
    echo "user not found";
    echo "<script>setTimeout(function() { window.location.href = 'signup.php'; }, 2000);</script>";
}

// Close connection
$conn->close();
    }
    ?>
    <?php 
    include("connection.php");
    include("navbar.php");

    ?>
    
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <br><br>
        <div id="form">
            <h1 id="heading">Login Form</h1>
            <form name="form" action="login.php" method="POST" required>
                <label>Enter Username/Email: </label>
                <input type="text" id="user" name="user"></br></br>
                <label>Password: </label>
                <input type="password" id="pass" name="pass" required></br></br>
                <input type="submit" id="btn" value="Login" name = "submit"/>
            </form>
        </div>
        <script>
            function isvalid(){
                var user = document.form.user.value;
                if(user.length==""){
                    alert(" Enter username or email id!");
                    return false;
                }
                
            }
        </script>
    </body>
    <footer>
        <div class="container">
            <p>&copy; 2024 WarningNow. All rights reserved.</p>
        </div>
    </footer>
</html>