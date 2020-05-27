<?php

 include("database.php");

if (isset($_POST['crear'])) {
  $nombre = $_POST['nombre'];
  $cedula = $_POST['cedula'];
  $telefono = $_POST['telefono'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $fecha = strtotime($fecha_nacimiento);
  $genero = $_POST['genero'];
  $cliente = $_POST['cliente'];
  $sede = $_POST['sede'];
  $email = $_POST['email'];
  $hoy = new DateTime("now");
  $edad = $hoy->diff($fecha);
  $query = "INSERT INTO adviser(nombre, cedula, telefono, fecha_nacimiento, genero, cliente, sede, email, edad) VALUES ('$nombre', '$cedula', '$telefono', '$fecha_nacimiento', '$genero', '$cliente', '$sede', '$email', '$edad')";
  $result = mysqli_query($conn1, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Asesor guardado con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: crud.php');

}

?>