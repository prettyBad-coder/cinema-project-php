<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}


	
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="./css/main.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@1,300&display=swap" rel="stylesheet">
</head>

<body>
	<?php require_once './components/header.php' ?>

	<div class="container">
		<h1><?php echo 'Witaj, ' . $_SESSION['username'] ?></h1>
	</div>

	<?php require_once './components/footer.php' ?>
</body>

</html>