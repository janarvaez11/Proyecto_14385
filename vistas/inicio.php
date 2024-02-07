<?php
session_start();
if (isset($_SESSION['usuario'])) {
	?>


	<!DOCTYPE html>
	<html lang="es">

	<head>
		<title>inicio</title>
		<?php require_once "menu.php"; ?>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Carrusel de Imágenes</title>
		<style>
			.carousel-container {
				position: relative;
				max-width: 600px;
				margin: 0 auto;
			}

			.carousel {
				display: flex;
				overflow: hidden;
			}

			.carousel img {
				width: 100%;
				height: auto;
			}

			.prev-btn,
			.next-btn {
				position: absolute;
				top: 50%;
				transform: translateY(-50%);
				background: none;
				border: none;
				font-size: 24px;
				cursor: pointer;
				z-index: 1;
			}

			.prev-btn {
				left: 0;
			}

			.next-btn {
				right: 0;
			}
		</style>
	</head>

	<body>
		<div class="carousel-container">
			<div class="carousel">
				<img src="../img/Carousel/1.jpg" alt="Imagen 1">
				<img src="../img/Carousel/1.jpg" alt="Imagen 1">
				<img src="../img/Carousel/2.png" alt="Imagen 2">
				<img src="../img/Carousel/3.webp" alt="Imagen 3">
				<!-- Agrega más imágenes aquí según sea necesario -->
			</div>
			<button class="prev-btn">&lt;</button>
			<button class="next-btn">&gt;</button>
		</div>

		<script>
			const carousel = document.querySelector('.carousel');
			const prevBtn = document.querySelector('.prev-btn');
			const nextBtn = document.querySelector('.next-btn');

			let currentIndex = 0;
			const maxIndex = carousel.children.length - 1;
			const imageWidth = carousel.children[0].offsetWidth;

			function showImage(index) {
				if (index < 0) {
					index = maxIndex;
				} else if (index > maxIndex) {
					index = 0;
				}

				carousel.style.transform = `translateX(-${index * imageWidth}px)`;
				currentIndex = index;
			}

			prevBtn.addEventListener('click', () => {
				showImage(currentIndex - 1);
			});

			nextBtn.addEventListener('click', () => {
				showImage(currentIndex + 1);
			});
		</script>
	</body>

	</html>

	<?php
} else {
	header("location:../index.php");
}
?>