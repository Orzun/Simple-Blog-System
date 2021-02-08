<?php
require("connect.php");

$id = $_GET['id'] ?? 0;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>

<body>
	<?php

	$sql = "DELETE FROM users WHERE id={$id}";
	$result = $conn->exec($sql);
	if ($result) {
		echo "User deleted.";
	} else {
		echo "User could not be deleted.";
	}
	?>
</body>

</html>