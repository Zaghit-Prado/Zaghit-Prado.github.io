<?php
include("Global/config.php");
include("Global/conexion.php");
include("Global/conexionnopdo.php");
include("templates/cabecera.php");
?>

</div>
<?php

global $id_codigo;
$id_codigo = $_GET['idcodigo'];
$sql = "SELECT productos.idproductos,productos.nomprod,productos.costoprod,productos.Descuento,productos.antcosto,productos.categoria ,producto.Caracteristicas,producto.Description,producto.img2,producto.img3,producto.img4,producto.img5,productos.img FROM productos,producto WHERE productos.idproductos='$id_codigo' and producto.idproducto='$id_codigo';";
$res = mysqli_query($conn, $sql);
$producto = mysqli_fetch_assoc($res);

?>

<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li><a href="storet.php">Categoria</a></li>
					<li class="active"><?php echo $producto['categoria'] ?></li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<div class="product-preview">
						<img src="<?php echo $producto['img']; ?>" alt="">
					</div>

					<div class="product-preview">
						<img src="<?php echo $producto['img2']?>" alt="">
					</div>


					<?php if ($producto['img3'] > null) { ?>
						<div class="product-preview">
							<img src="<?php echo $producto['img3']?>" alt="">
						</div>
					<?php } else { ?>

					<?php } ?>
					<?php if ($producto['img4'] > null) { ?>
						<div class="product-preview">
							<img src="<?php echo $producto['img4']?>" alt="">
						</div>
					<?php } else { ?>

					<?php } ?>

					<?php if ($producto['img5'] > null) { ?>
						<div class="product-preview">
							<img src="<?php echo $producto['img5']?>" alt="">
						</div>
					<?php } else { ?>

					<?php } ?>


				</div>
			</div>

			<div class="col-md-2  col-md-pull-5">

				<div id="product-imgs">

					<div class="product-preview">
						<img src="<?php echo $producto['img']; ?>" alt="">
					</div>

					<div class="product-preview">
						<img src="<?php echo $producto['img2']?>" alt="">
					</div>
					<?php if ($producto['img3'] > null) { ?>
						<div class="product-preview">
							<img src="<?php echo $producto['img3']?>" alt="">
						</div>
					<?php } else { ?>

					<?php } ?>
					<?php if ($producto['img4'] > null) { ?>
						<div class="product-preview">
							<img src="<?php echo $producto['img4']?>" alt="">
						</div>
					<?php } else { ?>

					<?php } ?>
					<?php if ($producto['img5'] > null) { ?>
						<div class="product-preview">
							<img src="<?php echo $producto['img5']?>" alt="">
						</div>
					<?php } else { ?>

					<?php } ?>


				</div>
			</div>

			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name"><?php echo $producto['nomprod'] ?></h2>

					<div>
						<h3 class="product-price">S/<?php echo $producto['costoprod'] ?>

							<del class="product-old-price">
								<?php if ($producto['antcosto'] > null) { ?>
									S/<?php echo $producto['antcosto'] ?>
								<?php } else { ?>

								<?php } ?></del>
						</h3>
					</div>
					<p><?php echo utf8_encode($producto['Description']) ?></p>



					<div class="add-to-cart">
						<div class="qty-label">
							Cantidad
							<div class="input-number">
								<input min="1" max="100" class="form-control" placeholder="0" type="number" onblur="document.getElementById('<?php echo ($producto['idproductos']); ?>').value=this.value" maxlength="3" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required />

							</div>
						</div>

						<form action="" method="post">

							<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['idproductos'], COD, KEY); ?>">
							<input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nomprod'], COD, KEY); ?>">
							<input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['costoprod'], COD, KEY); ?>">
							<input type="hidden" name="cantidad" id="<?php echo ($producto['idproductos']); ?>" class="form-control" required>
							<br><button class="add-to-cart-btn" name="btnAccion" value="Agregar" type="submit"><i class="fa fa-shopping-cart"></i> Agregar a Carrito</button>
						</form>
					</div>
					<ul class="product-links">
						<li>Category:</li>
						<li><a href="#"><?php echo utf8_encode($producto['categoria']) ?></a></li>
					</ul>



				</div>
			</div>

			<div class="col-md-12">
				<div id="product-tab">
					<ul class="tab-nav">
						<li class="active"><a data-toggle="tab" href="#tab1">Ficha tecnica</a></li>
						<li><a data-toggle="tab" href="#tab2">Caracteristicas</a></li>

					</ul>

					<div class="tab-content">
						<!-- tab1  -->
						<div id="tab1" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12">
									<img src="./fitec/<?php echo $producto['idproductos']?>.png" width="800" height="650" style="width: 100%; height: auto;">
								</div>
							</div>
						</div>

						<div id="tab2" class="tab-pane fade in">
							<div class="row">
								<div class="col-md-12">
									<p><?php echo utf8_encode($producto['Caracteristicas']) ?></p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

	</div>

</div>


<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Relacionados</h3>
				</div>
			</div>
			<!-- /section title -->

			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">


								<?php
								$bus = $producto['categoria'];
								$consulta = $conn->query("SELECT * FROM `productos` where `categoria` LIKE '$bus' ORDER BY `productos`.`idproductos` DESC LIMIT 10;");
								while ($fila = $consulta->fetch_array()) {

								?>
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./imgproduc/<?php echo $fila['idproductos']; ?>.png" alt="">
											<div class="product-label">
												<span class="sale"><?php echo $fila['Descuento']; ?></span>

											</div>
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo utf8_encode($fila['categoria']); ?></p>
											<h3 class="product-name"><a href="product.php?idcodigo=<?php echo $fila['idproductos']; ?>"><?php echo utf8_encode($fila['nomprod']); ?></a></h3>
											<h4 class="product-price">S/<?php echo $fila['costoprod']; ?> <del class="product-old-price"><?php echo $fila['antcosto']; ?></del></h4>


										</div>

									</div>
									<!-- /product -->
								<?php
								}

								?>

							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Section -->
</div>

</div>

</div>
<?php include 'templates/pie.php' ?>