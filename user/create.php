<?php
require("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Simple Blog System</title>
</head>

<body>
    <h2>Create a user</h2>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <form action="create.php" method="POST">
            <ul>
                <li>Enter User ID:<input name="userID" placeholder="userID"></li>
                <li>Enter Password:<input name="password" placeholder="password"></li>
                <li>Enter Name:<input name="name" placeholder="name"></li>
            </ul>
            <button>CREATE</button>
        </form>
    <?php } else {
        $userID = $_POST['userID'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        $sql = "INSERT INTO users VALUES (NULL, '$userID', '$password', '$name')";
        $result = $conn->exec($sql);

        echo "User created sucessfully!!!";
        header("Location: search.php");
    ?>

    <?php } ?>
</body>

</html>