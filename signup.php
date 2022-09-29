<?php
if (isset($_POST["submit_registro"])) {

  include("Global/conexionnopdo.php");

  // Revisamos la conexión
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $email = $_POST['email'];
  $Direccion = $_POST['Direccion'];
  $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
  // Realizamos la consulta para saber si coincide con uno de esos criterios
  $sql = "select * from user where email='$email' or password='$Direccion' or password='$pass' ";
  $result = mysqli_query($conn, $sql);
?>
<?php
  // Validamos si hay resultados
  if (mysqli_num_rows($result) > 0) {
    // Si es mayor a cero imprimimos que ya existe el usuario
    $message = 'Ya existe el registro que intenta registrar.';
  } else {
    // Si no hay resultados, ingresamos el registro a la base de datos
    $sql2 = "INSERT INTO user(email, Direccion, password)VALUES ('$email','$Direccion','$pass')";
    if (mysqli_query($conn, $sql2)) {
      // Imprimimos que se ingreso correctamente
      $message = 'Nuevo Registro Creado Exitosamente.';
    } else {
      // Mostramos si hay algun error al insertar registro
      echo "Error: " . $sql2 . "" . mysqli_error($conn);
    }
  }
  // Cerramos la conexión
  $conn->close();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Registro</title>
  <link rel="icon" href="img/gg.png">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="css/styleaa.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- Slick -->
  <link type="text/css" rel="stylesheet" href="css/slick.css" />
  <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/font1.css">
</head>

<body>

  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://img.freepik.com/vector-gratis/ilustracion-concepto-abstracto-pagina-inicio-sesion_335657-3875.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="signup.php" method="POST">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <?php require 'partials/header.php' ?>
                    </div>
                    <?php if (!empty($message)) : ?>
                      <p> <?= $message ?></p>
                    <?php endif; ?>
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registro</h5>

                    <div class="form-outline mb-4">
                      <input name="email" type="email" id="form2Example17" class="form-control form-control-lg" placeholder="Ingrese su Correo" min="50" required/>
                    </div>
                    <div class="form-outline mb-4">
                    <textarea name="Direccion" type="Direccion" for="mensaje" id="form2Example17" placeholder="Ingrese tu direccion" class="form-control form-control-lg" maxlength="300" required></textarea>
                    </div>
                    <div class="form-outline mb-4">
                      <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Ingrese su Contraseña" required/>
                    </div>

                    <div class="form-outline mb-4">
                      <input name="confirm_password" type="password" placeholder="Confirm Password" id="form2Example27" class="form-control form-control-lg" required/>
                    </div>

                    <div class="pt-1 mb-4">
                      <button type="submit" name="submit_registro" class="btn btn-dark btn-lg btn-block">Registrar</button>
                    </div>


                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Tienes Cuenta? <a href="login.php" style="color: #393f81;">Ingresa aqui</a></p>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
