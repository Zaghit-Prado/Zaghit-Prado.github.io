<?php
include("Global/config.php");
include("Global/conexion.php");
include("Global/conexionnopdo.php");
include "templates/cabecera.php";
?>
<div class="row">
	<!-- shop -->
	<div class="col-md-4 col-xs-6">
		<div class="shop">
			<div class="shop-img">
				<img src="./img/shop01.png" alt="">
			</div>
			<div class="shop-body">
				<h3>Accesorios de <br>Fijacion</h3>
				<a href="store.php?prod=Accesorios" class="cta-btn">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
	<!-- /shop -->

	<!-- shop -->
	<div class="col-md-4 col-xs-6">
		<div class="shop">
			<div class="shop-img">
				<img src="./img/shop03.png" alt="">
			</div>
			<div class="shop-body">
				<h3>Herramientas<br>Eléctricas</h3>
				<a href="store.php?prod=Herramientas electricas" class="cta-btn">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
	<!-- /shop -->

	<!-- shop -->
	<div class="col-md-4 col-xs-6">
		<div class="shop">
			<div class="shop-img">
				<img src="./img/shop02.png" alt="">
			</div>
			<div class="shop-body">
				<h3>Herramientas<br>Manuales</h3>
				<a href="store.php?prod=Herramientas manuales" class="cta-btn">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
	<!-- /shop -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">




			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">¡No los dejes ir! - NUEVO</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">


								<?php


								$sentencia = $pdo->prepare("CALL `usp_getultimo`();");
								$sentencia->execute();
								$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

								?>
								<?php
								foreach ($listaProductos as $producto) {

								?>
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="<?php echo $producto['img']; ?>" alt="">
											<div class="product-label">

												<?php if ($producto['Descuento'] > null) { ?>
													<span class="sale"><?php echo $producto['Descuento']; ?></span>
												<?php } else { ?>

												<?php } ?>
												<span class="new">NEW</span>


											</div>
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo utf8_encode($producto['categoria']); ?></p>
											<h3 class="product-name"><a href="product.php?idcodigo=<?php echo $producto['idproductos']; ?>"><?php echo utf8_encode($producto['nomprod']); ?></a></h3>
											<h4 class="product-price">S/<?php echo $producto['costoprod']; ?> <del class="product-old-price"><del class="product-old-price">
														<?php if ($producto['antcosto'] > null) { ?>
															S/<?php echo $producto['antcosto'] ?>
														<?php } else { ?>

														<?php } ?></del></del></h4>

											<div class="product-btns">
												<input min="1" max="100" class="form-control" placeholder="Ingrese Cantidad" type="number" id="trord" onblur="document.getElementById('<?php echo ($producto['idproductos']); ?>').value=this.value" maxlength="3" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required />
											</div>
										</div>



										<div class="add-to-cart">
											<form action="" method="post">

												<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['idproductos'], COD, KEY); ?>">
												<input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nomprod'], COD, KEY); ?>">
												<input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['costoprod'], COD, KEY); ?>">
												<input type="hidden" name="cantidad" id="<?php echo ($producto['idproductos']); ?>" class="form-control">
												<button class="add-to-cart-btn" name="btnAccion" value="Agregar" type="submit"><i class="fa fa-shopping-cart"></i> Agregar a Carrito</button>
											</form>
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
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->

<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Nuevos Accesorios</h3>

				</div>
			</div>

			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								<!-- product -->


								<!-- product -->

								<?php

								$sentencia = $pdo->prepare("CALL `usp_getaccesorios`();");
								$sentencia->execute();
								$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

								?>
								<?php
								foreach ($listaProductos as $producto) {

								?>
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="<?php echo $producto['img']; ?>" alt="">
											<div class="product-label">
												<?php if ($producto['Descuento'] > null) { ?>
													<span class="sale"><?php echo $producto['Descuento']; ?></span>
												<?php } else { ?>

												<?php } ?>

											</div>
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo utf8_encode($producto['categoria']); ?></p>
											<h3 class="product-name"><a href="product.php?idcodigo=<?php echo $producto['idproductos']; ?>"><?php echo utf8_encode($producto['nomprod']); ?></a></h3>
											<h4 class="product-price">S/<?php echo $producto['costoprod']; ?> <del class="product-old-price"><del class="product-old-price">
														<?php if ($producto['antcosto'] > null) { ?>
															S/<?php echo $producto['antcosto'] ?>
														<?php } else { ?>

														<?php } ?></del></del></h4>


										</div>




									</div>
									<!-- /product -->
								<?php
								}
								?>


								<!-- /product -->
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Nuevas Herramientas Eléctricas</h3>

				</div>
			</div>

			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">

								<?php

								$sql = "SELECT * FROM `productos` WHERE categoria = 'Herramientas electricas' ORDER BY `productos`.`idproductos` DESC LIMIT 10";
								$res = mysqli_query($conn, $sql);

								while ($producto = mysqli_fetch_array($res)) {
								?>
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="<?php echo $producto['img']; ?>" alt="">
											<div class="product-label">
												<?php if ($producto['Descuento'] > null) { ?>
													<span class="sale"><?php echo $producto['Descuento']; ?></span>
												<?php } else { ?>

												<?php } ?>

											</div>
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo utf8_encode($producto['categoria']) ?></p>
											<h3 class="product-name"><a href="product.php?idcodigo=<?php echo $producto['idproductos']; ?>"><?php echo utf8_encode($producto['nomprod']) ?></a></h3>
											<h4 class="product-price">S/<?php echo $producto['costoprod'] ?> <del class="product-old-price"><del class="product-old-price">
								<?php if ($producto['antcosto'] > null) { ?>
									S/<?php echo $producto['antcosto'] ?>
								<?php } else { ?>

								<?php } ?></del></h4>


										</div>

									</div>
									<!-- /product -->
								<?php
								}
								?>


							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Nuevas Herramientas Manuales</h3>

				</div>
			</div>

			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">

								<?php

								$sql = "CALL `usp_getmanuales`();";
								$res = mysqli_query($conn, $sql);

								while ($fila = mysqli_fetch_array($res)) {
								?>
									<!-- product -->
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
											<h3 class="product-name"><a href="product.php?idcodigo=<?php echo $fila['idproductos']; ?>"><?php echo utf8_encode($fila['nomprod']) ?></a></h3>
											<h4 class="product-price">S/<?php echo $fila['costoprod'] ?> <del class="product-old-price"><del class="product-old-price">
								<?php if ($fila['antcosto'] > null) { ?>
									S/<?php echo $fila['antcosto'] ?>
								<?php } else { ?>

								<?php } ?></del></h4>


										</div>

									</div>
									<!-- /product -->
								<?php
								}
								?>


								<!-- /product -->
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
		</div>
		<!-- /row -->
		<?php include 'templates/pie.php' ?>