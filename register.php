<?php
	include 'config.php';

	if(isset($_POST['submit'])) {
		$username = $_POST['login'];
		$password = md5($_POST['password']);
		$phone = $_POST['phone'];

		$sql2 = "SELECT * from users WHERE users.name = '$username' or users.phone = '$phone'";
		$result = mysqli_query($link, $sql2);

		if($result->num_rows == 0) {
			$sql = "INSERT INTO users (name , password, phone) VALUES('$username', '$password', '$phone')";
			$result = mysqli_query($link, $sql);
			header('Location: login.php');
		} else echo "<script>alert('NIE MOZNA DODAC BO JUZ TAKI JESTT USER WTF')</script>";
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
				Register
			</div>
			<input type="text" name="login" class="register__input" placeholder="Login">
			<input type="password" name="password" class="register__input" placeholder="Password">
			<input type="tel" name="phone" class="register__input" placeholder="telephone">
			<button type="submit" name="submit" class="register__submit">
				Register
			</button>
		</form>
	</div>
	<?php include './components/footer.php' ?>
</body>
</html>