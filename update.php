<?php
require("connection.php");
session_start();
$login_id = $_SESSION['authId'] ?? '';
if ($login_id == '') {
    header("Location:check.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title>Simple Blog System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>


  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>Simple Blog</em>System</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
      <li><a href="logout.php">Home</a></li>
      <li><a href="read.php">View Articles</a></li>
      </ul>
    </nav>
  </header>


  <section class="section contact" data-section="section6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Update Article</h2>

            </h2>
          </div>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'] ?? 0;
            $sql = "SELECT * FROM articles WHERE id = {$id}";
            $result = $conn->query($sql);
            $r = $result->fetch();
        ?>
          <div class="col-md-6">
            <form id="contact" action="update.php" method="POST">
              <div class="row">
                <div class="col-md-12">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <fieldset>
                    New Subject <input name="subject" type="text" class="form-control" value="<?php echo $r['subject']; ?>">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    New Body: <input name="body" type="text" class="form-control" value="<?php echo $r['body']; ?>">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" value="submit" class="button">Update</button>
                    <button onclick="window.location.href='read.php'" style="float: right;">Back</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        <?php
        } else {
            $id = $_POST['id'];
            $subject = $_POST['subject'];
            $body = $_POST['body'];
            $sql = "UPDATE articles SET subject = '$subject',
                          body = '$body'
                          WHERE id = {$id}";
            $result = $conn->exec($sql);
    
            if ($result) {
                echo "Articles updated successfully";
            } else {
                echo "Articlies failed to update";
            }
    
        ?>
    
    
        <?php } ?>

      </div>
    </div>
    </div>
  </section>

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