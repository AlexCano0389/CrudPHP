<?php

  require 'database.php';

  $message = '';

  $usuario = '';
  $q = mysqli_query($conn1,"SELECT * FROM users WHERE usuario = '$usuario'");

  if (!empty($_POST['usuario']) && !empty($_POST['password']) && mysqli_num_rows($q) == 0) {
    $sql = "INSERT INTO users (usuario, password) VALUES (:usuario, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Se creo un usuario correctamente';
    } else {
      $message = 'Debes llenar todos los campos para crear una cuenta';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registro</h1>
    <span>or <a href="registro.php">Ingreso</a></span>

    <form action="ingreso.php" method="POST">
      <input name="usuario" type="text" placeholder="ingrese su usuario">
      <input name="password" type="password" placeholder="ingrese su Password">
      <input name="confirm_password" type="password" placeholder="Confirme su Password">
      <input type="submit" value="Crear">
    </form>

  </body>
</html>