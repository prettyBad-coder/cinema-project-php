<?php

	session_start();

	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
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
	<?php require_once './components/header.php' ?>

	<div class="container container-movies">
		<?php
			$genres_arr = [];
			require './config.php';
			// $sql = 'SELECT * FROM movies INNER JOIN genres ON movie.genre = genres.name';
			$sql = 'SELECT * FROM movies';

			$sql_genre =  'SELECT * FROM genres';
			$result_genre = mysqli_query($link, $sql_genre);
			while($row = mysqli_fetch_assoc($result_genre)) {
				array_push($genres_arr, $row['name']);
			}


			$result = mysqli_query($link, $sql);
			while($row = mysqli_fetch_assoc($result)) {
				echo '
					<a class="movie" href="/reservation.php?id='.$row['id'].'"><div class="movie__genre">'.$genres_arr[$row['genre'] - 1].'</div><div class="movie__title">'.$row['title'].'</div><div class="movie__image-wrapper"><img class="movie__image" src="'.$row['image'].'"alt="movie-image"></div><div class="movie__description">'. $row['description'] .'</div></a>
				';
			}
			

		?>
	</div>
	<?php require_once './components/footer.php' ?>
</body>
</html>