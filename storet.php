<?php
include("Global/config.php");
include("Global/conexion.php");
include("Global/conexionnopdo.php");

?>
<?php
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
	<link type="text/css" rel="stylesheet" href="css/styles.css" />
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
	
<link type="text/css" rel="stylesheet" href="css/util.css" 
	/>
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="css/styleZ.css" 
	/>
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


</head>

<body>
	
<style>
	@-webkit-keyframes scroll {
		0% {
			transform: translateX(0);
		}

		100% {
			transform: translateX(calc(-250px * 7));
		}
	}

	@keyframes scroll {
		0% {
			transform: translateX(0);
		}

		100% {
			transform: translateX(calc(-250px * 7));
		}
	}

	.slider {
		background: white;
		box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.125);
		height: 85px;
		margin: auto;
		overflow: hidden;
		position: relative;

	}

	.slider::before,
	.slider::after {
		background: linear-gradient(to right, white 0%, rgba(255, 255, 255, 0) 100%);
		content: "";
		height: 100px;
		position: absolute;
		width: 200px;
		z-index: 2;
	}

	.slider::after {
		right: 0;
		top: 0;
		transform: rotateZ(180deg);
	}

	.slider::before {
		left: 0;
		top: 0;
	}

	.slider .slide-track {
		-webkit-animation: scroll 40s linear infinite;
		animation: scroll 40s linear infinite;
		display: flex;
		width: calc(250px * 14);
	}

	.slider .slide {
		height: 100px;
	}
	.hov-btn2:hover{
	    background-color:#eea307;
	}
	a { text-decoration: none;}
</style>
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
							<div class="col-md-10" style="margin-left: -40px;">
								<input  class="input" type="text" name="busqueda" placeholder="Search here" required>
							</div>	
							<div class="col-md-2">
								<button style="margin-left: -35px;height: 37px;" type="submit" name="enviar" class="search-btn">Search</button>
							</div>	
							</form>
						</div>
					</div>

					<div class="col-md-3 clearfix">
						<div class="header-ctn">

							<div class="dropdown">
								<a class="" aria-expanded="true" href="mostrarcarrito.php">
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
				<ul class="main-nav nav navbar-nav" style="display: flex;
        flex-direction: row;
">


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
	<div class="p-b-140" style="background-color: #f5f5f5;">
	<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">Todas las Categorias</li>

				</ul>
			</div>
		</div>

	</div>

</div>
		<div class="container">

			<div class="row isotope-grid">
							
			<?php
				include("Global/conexionnopdo.php");
				$sql = "CALL `usp_getstoret`();";
				$res = mysqli_query($conn, $sql);
				while ($fila = mysqli_fetch_array($res)) {
				?>
			
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0" style="box-shadow: rgb(0 0 0 / 14%) 0px 0px 5px 1px;">
								<?php if ($fila['Descuento'] > null) { ?>	
									<div class="product-label" style="background-color: #FFF;border-color: #ffc800;border: 2px solid;padding: 2px 10px;color: #ffc800;z-index: 1;position: absolute; top: 6px;left: 4px;">
									
										<span class="sale"><?php echo $fila['Descuento']; ?></span>
									
								</div>
								<?php } else { ?>	

									<?php } ?>		
									        	<img style="background-color: white;" src="<?php echo $fila['img']; ?>" alt="IMG-PRODUCT" >


										<a style="box-shadow: 0 0 8px rgba(0,0,0,0.8);font-family: SANS-SERIF;" type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn2 p-lr-15 trans-04 btn-outline-dark," href="product.php?idcodigo=<?php echo $fila['idproductos'] ?>">
											Ver producto
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="product.php?idcodigo=<?php echo $fila['idproductos'] ?>">
											<b><?php echo utf8_encode($fila['nomprod']) ?></b>
											</a>
											<h6 style="font-size:20px ;color: #ffc800;" class="product-price">S/<?php echo $fila['costoprod'] ?><del style="font-size: 15px ;    color: #8D99AE;" class="product-old-price"> <?php if ($fila['antcosto'] > null) { ?>
												S/<?php echo $fila['antcosto'] ?>
											<?php } else { ?>

											<?php } ?></del>
											
										</div>
									

									</div>
								</div>
							</div>
			
			<?php } ?>
</div>

		</div>
	</div>	



	<!-- Footer -->

	<?php
	include './templates/pie.php'
	?>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>




	




	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->

	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="../js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').php();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').php();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').php();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="../js/main.js"></script>
</body>

</html>