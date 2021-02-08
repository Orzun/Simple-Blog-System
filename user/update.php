<?php
require("connect.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <h2>Update a user</h2>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'] ?? 0;
        $sql = "SELECT * FROM users WHERE id = {$id}";
        $result = $conn->query($sql);
        $r = $result->fetch();

    ?>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo ($id); ?>">
            <ul>
                <li><input name="userID" value="<?php echo ($r['userID']); ?>"></li>
                <li><input name="password" value="<?php echo ($r['password']); ?>"></li>
                <li><input name="name" value="<?php echo ($r['name']); ?>"></li>
            </ul>
            <button value="submit">UPDATE</button>
        </form>
    <?php } else {
        $id = $_POST['id'];
        $userID = $_POST['userID'];
        $password = $_POST['password'];
        $name = $_POST['name'];


        $sql = "UPDATE users SET name = '$name',
                      password = '$password', userID = '$userID'
                      WHERE id = {$id}";
        $result = $conn->exec($sql);

        if ($result) {

            // header('location:read1.php');
            echo "User updated.";
        } else {
            echo "User could not be updated.";
        }

    ?>


    <?php } ?>

</body>

</html>