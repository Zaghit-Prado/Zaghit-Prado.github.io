<?php
session_start();

$mensaje = "";

if (isset($_POST['btnAccion'])) {
   switch ($_POST['btnAccion']) {

      case 'Agregar':

         if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
            $ID = openssl_decrypt($_POST['id'], COD, KEY);
            $mensaje .= "Ok ID correcto" . $ID . "<br/>";
         } else {
            $mensaje .= "Upss... ID incorrecto" . $ID;
         }
         if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
            $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
            $mensaje .= "Ok nombre " . $NOMBRE . "<br/>";
         } else {
            $mensaje .= "Upss... nombre incorrecto" . "<br/>";
            break;
         }

         if (is_numeric(($_POST['cantidad']))) {
            $CANTIDAD = ($_POST['cantidad']);
            $mensaje .= "Ok cantidad " . $CANTIDAD . "<br/>";
         } else {
            $mensaje .= "Upss... cantidad incorrecto" . "<br/>";
            break;
         }

         if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
            $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
            $mensaje .= "Ok precio " . $PRECIO . "<br/>";
         } else {
            $mensaje .= "Upss... precio incorrecto" . "<br/>";
            break;
         }

         if (!isset($_SESSION['CARRITO'])) {

            $producto = array(
               'ID' => $ID,
               'NOMBRE' => $NOMBRE,
               'CANTIDAD' => $CANTIDAD,
               'PRECIO' => $PRECIO,

            );
            $_SESSION['CARRITO'][0] = $producto;
            $mensaje = "Producto agregado a carrito";
         } else {
            $idProduc = array_column($_SESSION['CARRITO'], "ID");
            if (in_array($ID, $idProduc)) {
               echo "<script>confirm('El Producto ya ha sido Agregado...');</script>";
            } else {



               $NumeroProductos = count($_SESSION['CARRITO']);
               $producto = array(
                  'ID' => $ID,
                  'NOMBRE' => $NOMBRE,
                  'CANTIDAD' => $CANTIDAD,
                  'PRECIO' => $PRECIO,

               );
               $_SESSION['CARRITO'][$NumeroProductos] = $producto;
               $mensaje = "Producto agregado a carrito";
            }
         }
         //$mensaje = print_r($_SESSION, true);

         break;
      case 'Eliminar':

         if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
            $ID = openssl_decrypt($_POST['id'], COD, KEY);

            foreach ($_SESSION['CARRITO'] as $indise => $producto) {
               if ($producto['ID'] == $ID) {
                  unset($_SESSION['CARRITO'][$indise]);
                  echo "<script>alert('Elemento Borrado...');</script>";
               }
            }
         } else {
            $mensaje .= "Upss... precio incorrect" . "<br/>";
         }

         break;
   }
}
if (isset($_SESSION['user_id'])) {
   $records = $pdo->prepare("SELECT * FROM user WHERE id = :id");
   $records->bindParam(':id', $_SESSION['user_id']);
   $records->execute();
   $results = $records->fetch(PDO::FETCH_ASSOC);

   $user = null;

   if (count($results) > 0) {
      $user = $results;
   }
}
