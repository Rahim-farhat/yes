<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">


    <nav>
      
        <div class="container">
        <div class="logname">
        <svg xmlns="http://www.w3.org/2000/svg" class="logo" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
        <h1 class="warning">WarningNow</h1>
        </div>
            <ul>
                <li><a class="btn  mx-2 active" aria-current="page" href="welcome.php">Home</a></li>
                <li><a class="btn  mx-2 active" aria-current="page" href="post.php">Post</a></li>
                <?php if(isset($_SESSION['username'])): ?>
            <li><a class="btn btn-outline-info mx-2" href="update.php">Update <?php echo $_SESSION['username']; ?>'s Profile</a></li>
            <li><a class="btn btn-outline-danger mx-2" href="logout.php">Logout</a></li>
          <?php else: ?>
            <li><a class="btn btn-outline-success mx-2" href="signup.php">Signup</a></li>
            <li><a class="btn btn-outline-primary mx-2" href="login.php">Login</a></li>
          <?php endif; ?>
            </ul>
        </div>
    </nav>


    
  
  </div>
</nav>