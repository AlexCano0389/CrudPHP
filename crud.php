<?php include("database.php"); ?>

<?php include('includes/header1.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="crear.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre Asesor" autofocus>
          </div>
          <div class="form-group">
            <input type="number" name="cedula" class="form-control" placeholder="cedula" autofocus>
          </div>
          <div class="form-group">
            <input type="number" name="telefono" class="form-control" placeholder="telefono" autofocus>
          </div>
          <div class="form-group">
            <input type="date" name="fecha_nacimiento" class="form-control" placeholder="fecha nacimiento" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="genero" class="form-control" placeholder="genero(F/M)" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="cliente" class="form-control" placeholder="cliente" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="sede" class="form-control" placeholder="sede" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="email" autofocus>
          </div>
          <input type="submit" name="crear" class="btn btn-success btn-block" value="Guardar Asesor">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Cedula</th>
            <th>Cliente</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM adviser";
          $result_adviser = mysqli_query($conn1, $query);    

          while($row = mysqli_fetch_assoc($result_adviser)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['cedula']; ?></td>
            <td><?php echo $row['cliente']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
