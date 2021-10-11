
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
	<?php require_once './components/header.php' ?>
	
	<div class="container text-big">
		<?php
			if(isset($_SESSION['username'])) {
				echo 'Choose your movie!';
			} else {
				echo 'Please log in or register';
			}
		?>
	</div>


	<?php require_once './components/footer.php' ?>
</body>
</html>