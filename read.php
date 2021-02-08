<?php
require("connection.php");
session_start();
$login_id = $_SESSION['authId'];
$authName = $_SESSION['authName'] ?? 'guest';
$id_receive = $_REQUEST['id'];

echo $id_receive;
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
      <a href="user/check.php"><em>Simple Blog</em> System</a>
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

    <hr style="height:2px;border-width:2;color:gray;background-color:gray">
    <div>
      <h1>. </h1>
      <h1>. </h1>
      Current User: <?php echo "{$authName}"; ?>
    </div>
    <h2> Article Information</h2>
    <?php
    $sql = "SELECT articles.*, users.name FROM articles
    JOIN users ON articles.author = users.id";

    $result = $conn->query($sql);

    echo "<table>";

    echo "<tr>
        <th> ID </th>
        <th> Subject </th>
        <th> Body </th>
        <th> Author </ th>
        <th> Modified </ th>
        </ tr>";
    
    while ($r = $result->fetch()) {
      if ($id_receive == $r['id']) {
      echo "
            <tr><td>{$r['id']}</td>
            <td>{$r['subject']}</td>
            <td>{$r['body']}</td>
            <td>{$r['name']}</td>
            <td>{$r['modified']}</td>";
        if ($login_id == $r['author']) {
        echo "<td><a href='delete.php?id={$r['id']}'>Delete</a></td>
                <td><a href='update.php?id={$r['id']}'>Update</a></td>
                </tr>";
        }
      }
    }
    echo "</table>";
    ?>
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