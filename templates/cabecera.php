<?php
require("Global/conexion.php");
require("Global/conexionnopdo.php ");

require("carrito.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/gg.png">
	<title>Ferreteria - Tornillo Feliz</title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css" 
	/>
	
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


</head>

<body>
	<header>
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +01 925-929-447</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> regtil@email.com</a></li>
				</ul>
				<ul class="header-links pull-right">
					<?php if (!empty($user)) : ?>
						<li style="color:#ffc800">Bienvenido. <?= $user['email']; ?></li>
						<li><a href="logout.php">
								Cerrar Sesion
							</a></li>


					<?php else : ?>
						<li><a href="login.php">INICIAR SESIÓN</a> o <a href="signup.php">CREAR CUENTA</a></li>
					<?php endif; ?>


				</ul>
			</div>
		</div>

		<div id="header">
			<div class="container">
				<div class="row">

					<div class="col-md-3">
						<div class="header-logo">
							<?php require 'partials/header.php' ?>
						</div>
					</div>

					<div class="col-md-6">
						<div class="header-search">
							<form action="Busqueda.php" method="get">

								<input class="input" type="text" name="busqueda" placeholder="Search here" required>
								<button type="submit" name="enviar" class="search-btn">Search</button>
							</form>
						</div>
					</div>

					<div class="col-md-3 clearfix">
						<div class="header-ctn">

							<div class="dropdown">
								<a class="dropdown-toggle" aria-expanded="true" href="mostrarcarrito.php">
									<i class="fa fa-shopping-cart"></i>
									<span>Tu Carrito</span>
									<div class="qty"><?php
														echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);

														?></div>
								</a>


							</div>

							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>

						</div>
					</div>

				</div>

			</div>

		</div>

	</header>
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">


					<li><a href="/Tienda">Home</a></li>
					<li><a href="storet.php">Todas las Categorias</a></li>
					<li><a href="store.php?prod=Accesorios">Accesorios</a></li>
					<li><a href="store.php?prod=Herramientas electricas">Herramientas eléctricas</a></li>
					<li><a href="store.php?prod=Herramientas manuales">Herramientas manuales</a></li>

				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">