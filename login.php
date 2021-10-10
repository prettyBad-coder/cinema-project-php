<?php
	include 'config.php';

	session_start();

	if(isset($_POST['submit'])) {
		$username = $_POST['login'];
		$password = md5($_POST['password']);
		$sql = "SELECT * FROM users WHERE name='$username' AND password='$password' ";
		$result = mysqli_query($link, $sql);
		if($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $row['id'];
			header('Location: profile.php');
		} else {
			echo "<script> alert('Login or password incorrect!') </script>";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./css/main.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
	<?php include './components/header.php' ?>
	<div class="container">
		<form method="POST" class="register">
			<div class="register__title">
				Login
			</div>
			<input type="text" name="login" class="register__input" placeholder="Login">
			<input type="password" name="password" class="register__input" placeholder="Password">
			<button type="submit" name="submit" class="register__submit">
				Login
			</button>
		</form>
	</div>
	<?php include './components/footer.php' ?>
</body>
</html>