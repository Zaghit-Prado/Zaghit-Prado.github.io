<?php

session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: /Tienda');
}
require 'Global/config.php';
require 'Global/conexion.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $pdo->prepare('SELECT id, email, password FROM user WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['id'];
    header("Location: /Tienda");
  } else {
    $message = 'Lo sentimos, su contraseña es incorrecta';
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Iniciar Sesion</title>
  <link rel="icon" href="img/gg.png">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="css/styleaa.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

  <link type="text/css" rel="stylesheet" href="css/slick.css" />
  <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

  <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

  <link rel="stylesheet" href="css/font-awesome.min.css">

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
                <img src="https://static.vecteezy.com/system/resources/previews/001/167/154/large_2x/man-using-e-book-application-on-computer-vector.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <?php if (!empty($message)) : ?>
                    <p> <?= $message ?></p>
                  <?php endif; ?>
                  <form action="login.php" method="POST">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <?php require 'partials/header.php' ?>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicie Sesión</h5>

                    <div class="form-outline mb-4">
                      <input name="email" type="email" id="form2Example17" class="form-control form-control-lg" placeholder="Ingrese su Correo" required/>
                    </div>

                    <div class="form-outline mb-4">
                      <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Ingrese su Contraseña" required/>
                    </div>

                    <div class="pt-1 mb-4">
                      <button type="submit" value="Submit" class="btn btn-dark btn-lg btn-block">Login</button>
                    </div>


                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Aun no tiene cuenta? <a href="signup.php" style="color: #393f81;">Registrate aqui</a></p>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

        <?php include 'templates/pie.php' ?>