<?php

include("database.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM adviser WHERE id = $id";
  $result = mysqli_query($conn1, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Asesor eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: crud.php');
}

?>