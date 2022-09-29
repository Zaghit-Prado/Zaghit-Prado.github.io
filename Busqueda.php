<?php
include("Global/config.php");
include("Global/conexion.php");
include("Global/conexionnopdo.php");
include "templates/cabecera.php";
?>

</div>

<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">Busqueda</li>

					<li class="active"></li>


				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->



</div>
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div id="store" class="col-md-12">


				<?php

				if (isset($_GET['enviar'])) {

					$busqueda = $_GET['busqueda'];
					$consulta = $conn->query("SELECT * FROM productos WHERE nomprod LIKE '%$busqueda%'");
					while ($fila = $consulta->fetch_array()) {



				?>
						<!-- product -->
						<div class="col-md-3 col-xs-10">

							<div class="product">

								<div class="product-img">
									<img src="./imgproduc/<?php echo $fila['idproductos']; ?>.png" alt="">
									<div class="product-label">
										<?php if ($fila['Descuento'] > null) { ?>
												<span class="sale"><?php echo $fila['Descuento']; ?></span>
										<?php } else { ?>
                
										<?php } ?>
									</div>
								</div>
								<div class="product-body">
									<p class="product-category"><?php echo utf8_encode($fila['categoria']) ?></p>
									<h3 class="product-name"><a href="product.php?idcodigo=<?php echo $fila['idproductos'] ?>"><?php echo utf8_encode($fila['nomprod']) ?></a></h3>
									<h4 class="product-price">S/<?php echo $fila['costoprod'] ?> <del class="product-old-price"><?php echo $fila['antcosto'] ?></del></h4>

									
								</div>


							</div>
						</div>
						<!-- /product -->

				<?php
					}
				}
				?>

				<!-- /store products -->

			</div>
			<!-- /STORE -->
		</div>
	</div>
	<!-- /STORE -->
</div>
</div>
<!-- /row -->
<?php
include("templates/pie.php");
?>