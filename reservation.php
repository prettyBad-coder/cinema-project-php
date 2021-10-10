
<?php
	require './config.php';
	$sql = "SELECT * FROM movies WHERE movies.id = '{$_GET['id']}'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
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
	<?php require_once './components/header.php' ?>

	<div class="container single-movie">
		<div class="single-movie__info">
			<div class="single-movie__title">
				<?php echo $row['title'] ?>
			</div>
			<div class="single-movie__description">
				<?php echo $row['description'] ?>
			</div>
			<button class="single-movie__reservation-button">
				Reserve
			</button>
		</div>
		<div class="single-movie__container"></div>
	</div>

	

	<?php require_once './components/footer.php' ?>
	<script src="./js/reservation.js" movie_id="<?php echo $_GET['id']?>" user_id="<?php echo $_SESSION['username'] ?>" id="reservation" ></script>
</body>
</html>