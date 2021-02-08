<?php
require("connect.php");
session_start();
$login_id = $_SESSION['authId'];
$authName = $_SESSION['authName'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo "Welcome, {$authName}!"; ?></title>
</head>

<body>
    <h2>Users Information</h2>

    <?php
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    echo "<table border = '1'>";

    echo "<tr>
        <th> ID </ font> </ th>
        <th width = '150'> UserID </ font> </ th>
        <th width = '200'> Password </ font> </ th>
        <th width = '200'> Name </ font> </ th>
        </ tr>";

    foreach ($result as $r) {
        echo "
            <tr><td>{$r['id']}</td>
            <td>{$r['userID']}</td>
            <td>{$r['password']}</td>
            <td>{$r['name']}</td>";
        if ($login_id == $r['id']) {
            echo "<td><a href='delete.php?id={$r['id']}'>Delete</a></td>
                <td><a href='update.php?id={$r['id']}'>Update</a></td>
                <td><a href='logout.php?id={$r['id']}'>Logout</a></td>
                </tr>";
        }
    }
    echo "</table>";
    ?>
    <a href="create.php">create new user</a>
    <br>
    <a href="logout.php">Back to Login</a>
</body>

</html>