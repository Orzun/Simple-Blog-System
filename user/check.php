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
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../assets/css/templatemo-grad-school.css">
  <link rel="stylesheet" href="../assets/css/lightbox.css">

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
        <li><a href="logout.php"></a></li>
      </ul>
    </nav>
  </header>


  <section class="section contact" data-section="section6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Login Information</h2>

            </h2>
          </div>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        ?>
          <div class="col-md-6">
            <form id="contact" action="" method="POST">
              <div class="row">
                <div class="col-md-12">
                  <fieldset>
                    UserID: <input name="userID" type="text" class="form-control" id="userID" placeholder="UserID" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    Password: <input name="password" type="password" class="form-control" id="password" placeholder="Your Password" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" name="id" id="form-submit" class="button">Login</button>
                    <button onclick="window.location.href='create.php'" style="float: right;">Create</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        <?php
        } else {
          $u = $_POST["userID"];
          $p = $_POST["password"];
          try {
            require("connect.php");
            $result = $conn->query(
              "SELECT * FROM users WHERE userID='{$u}' AND password='{$p}'"
            );
            $r = $result->fetch();
          } catch (PDOException $e) {
            die($e->getMessage());
          }
          if ($r) {
            session_start();
            $_SESSION['authId'] = $r['id'];
            $_SESSION['authName'] = $r['name'];

            echo "<h1>Welcome, {$r['name']}! Login succeeded.</h1>";
            echo "<div class ='col-md-12'>";
            echo "<hr>";
            echo "<div class='col-md-6'>" . "<button onclick=\"location.href='search.php'\">Search user</button>" . "</div>";
            echo "<hr>";
            echo "<div class='col-md-6'>" . "<button onclick=\"location.href='../search.php'\">Search Article</button>" . "</div>";
            echo "</div>";

          } else {
            echo "<h1>Login failed.</h1>";
            echo "<button onclick=\"location.href='check.php'\">Login Again</button>";
          }
        }
        ?>

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