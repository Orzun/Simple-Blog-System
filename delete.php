<?php
require("connection.php");
$id = $_GET['id'] ?? 0;

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
  <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
  <style>
    table,
    tr,
    th,
    td {
      border: 1px solid black;
    }
  </style>
</head>

<body>


  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="search.php"><em>Ho</em> me</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="search.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="create.php">Add New Article</a></li>
      </ul>
    </nav>
  </header>
  <section class="section contact">
    <div>
      <h1>.</h1>
      <h1>.</h1>
    </div>
    <?php
    $sql = "DELETE FROM articles WHERE id={$id}";
    $result = $conn->exec($sql);
    if ($result) {
      echo " <h1> Article deleted sucessfully </h1>";
    } else {
      echo " <h1> Article failed to delete. </h1>";
    }
    ?>
    </div>
    <div>


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