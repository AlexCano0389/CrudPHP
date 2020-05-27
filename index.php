<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, usuario, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido al registro del asesor</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['usuario']; ?>
      <br>ingresaste correctamente
      <br>
      <a href="salida.php">
        Salida
      </a>
      <br>
      <a href="crud.php">
        Ingrese al panel principal
      </a>
    <?php else: ?>
      <h1>Por favor ingrese o Registrese</h1>

      <a href="registro.php">Ingreso</a> o
      <a href="ingreso.php">Registro</a>
    <?php endif; ?>
  </body>
</html>