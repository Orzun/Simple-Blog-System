<?php
require("connect.php");
session_start();
$login_id = $_SESSION['authId'];
$authName = $_SESSION['authName'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php echo "Welcome, {$authName}!"; ?></title>
</head>

<body>
	<?php echo "<h1><b>Welcome {$authName} </b></h1>"; ?>
	<h2>Search users</h2>
	<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
		<form action="search.php" method="POST">
			<input name="key"><button>SEARCH</button>
		</form>
	<?php } else {
		$key = $_POST['key'];

		$sql = "SELECT * FROM users WHERE name LIKE '%$key%'";
		$result = $conn->query($sql);

		echo "<table border = '1'>";

		echo "<tr>
		<th> ID </ font> </ th>
		<th> UserID </ font> </ th>
		<th> Password </ font> </ th>
		<th> Name </ font> </ th>
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
		echo '</br>';
		echo "<button onclick=\"location.href='search.php'\">Back to search user</button>";
		echo '</br>';
		echo "<button onclick=\"location.href='logout.php'\">Logout</button>";
		echo '</br>';
	}
	?>
	<a href="create.php">create new user</a>
	<br>
	<a href="logout.php">Back to Login</a>
	<a href="read.php">View Users</a>
</body>

</html>