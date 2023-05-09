<!DOCTYPE html>
<html>
<head>
	<title>Idea Feed Results</title>
</head>
<body>
	<h1>Ideas</h1>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$idea = $_POST['idea'];
			echo "<p><strong>Name:</strong> $name</p>";
			echo "<p><strong>Email:</strong> $email</p>";
			echo "<p><strong>Idea:</strong> $idea</p>";
		}
	?>
</body>
</html>
