<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-header bg-success text-white text-center">
            <h4>Crear cuenta</h4>
          </div>
          <div class="card-body">
            <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('login/registrar') ?>" method="post">
              <div class="form-group">
                <label for="nombre">Nombre completo</label>
                <input type="text" name="nombre" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
              </div>

              <button type="submit" class="btn btn-success btn-block">Registrarse</button>
            </form>
          </div>
          <div class="card-footer text-center">
            <small>¿Ya tienes cuenta? <a href="<?= base_url('login') ?>">Inicia sesión</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
