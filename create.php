<?php
require("connection.php");
session_start();
$login_id = $_SESSION['authId'] ?? '';
if ($login_id == '') {
    echo "Please login";
    header("Location:user/check.php");
}
$authName = $_SESSION['authName'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

		<title><?php echo "Welcome, {$authName}!"; ?></title>
    
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

  </head>

<body>
    <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
    <a href="user/check.php"><em>Simple Blog</em> System</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="search.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
  </header>

  
  <section class="section contact" data-section="section6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Current User: 
              <?php echo "{$authName}"; ?>
            </h2>
          </div>
        </div>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <form action="create.php" method="POST">
            <ul>
                <li>Subject :<input name="subject" placeholder="subject"></li>
            </ul>
            <ul>
                <li>Body : <input name="body" placeholder="body"></li>
            </ul>
            <button>CREATE</button>
        </form>
    <?php } else {
        $subject = $_POST['subject'];
        $body = $_POST['body'];
        $author = $login_id;
        $sql = "INSERT INTO articles VALUES (NULL, '$subject', '$body', '$author', NULL )";
        $result = $conn->exec($sql);
        print "<h1>Article created by, {$r['name']}! was sucessful !!!.</h1>";
        header ('Location: search.php');
    ?>
    <?php } ?>
    <button onclick="location.href='logout.php'">Logout</button>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> Copyright 2021 by Pariyar Arjun  
          
           | ID & NAME: <a href="#" rel="sponsored" target="_parent">M19W7367 Pariyar Arjun</a></p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>