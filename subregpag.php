<?php
include("Global/config.php");
include("Global/conexion.php");
include "templates/cabecera.php";
?>

<div class="section">
    <div class="container">
        <div class="col-md-12">
            <!-- row -->
            <div class="row">
                <br>
                <h3>Validar datos de Cliente</h3>
                <form action="https://formsubmit.co/regtil1003@gmail.com" method="POST">
                    <div class="form-row">
                    <input type="hidden" name="text"  value="Gracias por comprar en tornillo feliz: <?= $user['email']; ?>"class="form-control">
                        <div class="form-group col-md-6">
                            <label>Nombre</label>
                            
                            <input type="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $user['email']; ?>" disabled>
                            
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="inputState">Pais: </label>
                            <select id="inputState" class="form-control">
                                <option selected>...</option>
                                <option>Peru</option>
                                <option>Argentina</option>
                                <option>Colombia</option>
                                <option>Brasil</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCity">Direccion</label>
                            <input type="Direcction" name="Direcction" class="form-control" id="inputCity" value="<?= $user['Direccion']; ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputState">Productos </label>
                            <?php if (!empty($_SESSION['CARRITO'])) { ?>
                                <table type="Product" name="_template" class="table table-light table-bordered" >
                                    <tbody>
                                        <tr>
                                            <th width="40%">Descripcion</th>
                                            <th width="15%" class="text-center">Cantidad</th>
                                            <th width="20%" class="text-center">Precio</th>
                                            <th width="20%" class="text-center">Total</th>

                                        </tr>

                                        <?php $total = 0; ?>
                                        <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                                            <tr>
                                                <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
                                                <td width="15%" class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
                                                <td width="20%" class="text-center">S/<?php echo $producto['PRECIO'] ?></td>
                                                <td width="20%" class="text-center">S/<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2); ?></td>

                                                <input type="hidden" name="<?php echo $producto['NOMBRE'] ?>"  class="form-control" value="Cantidad: <?php echo $producto['CANTIDAD'] ?>"> 


                                                </td>
                                            </tr>

                                            <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
                                        <?php } ?>

                                        <tr>
                                            <td colspan="3" align="right">
                                                <h3>Total</h3>
                                            </td>
                                            <td align="right">
                                                <h3 style="color:#ffc800">S/<?php echo number_format($total, 2); ?></h3>
                                            </td>

                                        </tr>

                                            
                                    </tbody>
                                </table>

                                        
                            <?php } else { ?>
                                <div class="alert alert-success">
                                    No hay productos en el carrito...
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>DNI</label>
                            <input type="dni" name="dni" class="form-control" maxlength="8" required>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="cart-btns">
                                <a href="mostrarcarrito.php" style="background-color: #161616;" class="primary-btn cta-btn" ><i class="fa fa-arrow-circle-left"></i> Volver a carrito </a>
                            </div>
                        </div>
                        <input type="hidden" name="Nota"  value="Se le enviara en un lapso de 3 dias sus productos o puede ir a nuestros locales a recoger su producto. muchas gracias por su compra:D"class="form-control">               
                        <input type="hidden" name="_cc" value="<?= $user['email']; ?>"> 
                        <input type="hidden" name="_template" value="table">
                        <input type="hidden" name="_captcha" value="false">
                        <input type="hidden" name="_subject" value="Tornillo Feliz - compra en tramite:<?= $user['email']; ?>">
                        <div class="form-group col-md-2">
                            <div class="cart-btns">
                                <button type="submit" class="primary-btn cta-btn" >Comprar <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>

</html>