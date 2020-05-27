<?php
include("database.php");
$nombre = '';
$cedula = '';
$telefono = '';
$fecha_nacimiento = '';
$genero = '';
$cliente = '';
$sede = '';
$email ='';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM adviser WHERE id=$id";
  $result = mysqli_query($conn1, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $cedula = $row['cedula'];
    $telefono = $row['telefono'];
    $fecha_nacimiento = $row['fecha_nacimiento'];
    $genero = $row['genero'];
    $cliente = $row['cliente'];
    $sede = $row['sede'];
    $email = $row['email'];
  }
}

if (isset($_POST['editar'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $cedula = $_POST['cedula'];
  $telefono = $_POST['telefono'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $genero = $_POST['genero'];
  $cliente = $_POST['cliente'];
  $sede = $_POST['sede'];
  $email = $_POST['email'];

  $query = "UPDATE adviser set nombre = '$nombre', cedula = '$cedula' WHERE id=$id";
  mysqli_query($conn1, $query);
  $_SESSION['message'] = 'Asesor Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: crud.php');
}

?>
<?php include('includes/header1.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="nombre">
        </div>
        <div class="form-group">
          <input name="cedula" type="number" class="form-control" value="<?php echo $cedula; ?>" placeholder="cedula">
        </div>
        <div class="form-group">
          <input name="telefono" type="number" class="form-control" value="<?php echo $telefono; ?>" placeholder="Telefono">
        </div>
        <div class="form-group">
          <input name="fecha_nacimiento" type="date" class="form-control" value="<?php echo $fecha_nacimiento; ?>" placeholder="Fecha">
        </div>
        <div class="form-group">
          <input name="genero" type="text" class="form-control" value="<?php echo $genero; ?>" placeholder="genero">
        </div>
        <div class="form-group">
          <input name="cliente" type="text" class="form-control" value="<?php echo $cliente; ?>" placeholder="cliente">
        </div>
        <div class="form-group">
          <input name="sede" type="text" class="form-control" value="<?php echo $sede; ?>" placeholder="sede">
        </div>
        <div class="form-group">
          <input name="email" type="text" class="form-control" value="<?php echo $email; ?>" placeholder="email">
        </div>
        <button class="btn-success" name="editar">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>