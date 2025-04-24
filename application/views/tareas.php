<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestión de Tareas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-4">
  <div class="d-flex justify-content-between mb-3">
    <h3>Hola, <?= $this->session->userdata('nombre') ?>!</h3>
    <a href="<?= base_url('tareas/logout') ?>" class="btn btn-danger">Cerrar sesión</a>
  </div>

  <div class="card">
    <div class="card-header">
      Token de sesión: <strong><?= $this->session->userdata('token') ?></strong>
    </div>
    <br><br>
  
    <div class="card-body">

    <div class="card mb-3">
    <div class="card-header">Nueva tarea</div>
    <div class="card-body">
      <form method="post" action="<?= base_url('tareas/crear') ?>">
        <div class="form-row">
          <div class="col-md-4">
            <input type="text" name="titulo" class="form-control" placeholder="Título" required>
          </div>
          <div class="col-md-6">
            <input type="text" name="descripcion" class="form-control" placeholder="Descripción">
          </div>
          <div class="col-md-2">
            <button class="btn btn-success btn-block">Agregar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <form method="get" action="<?= base_url('tareas') ?>" class="form-inline mb-3">
        <input type="text" name="buscar" class="form-control mr-2" value="<?= $filtro ?>" placeholder="Buscar por título">
        <button class="btn btn-primary">Buscar</button>
    </form>

    <ul class="list-group list-group-flush">
      <?php foreach ($tareas as $tarea): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <strong><?= $tarea->titulo ?></strong>
            <p class="mb-0"><?= $tarea->descripcion ?></p>
            <small class="text-muted">Estado: <?= $tarea->completada ? '✔ Completada' : '⏳ Pendiente' ?></small>
          </div>
          <div>
            <?php if (!$tarea->completada): ?>
              <a href="<?= base_url('tareas/completar/'.$tarea->id) ?>" class="btn btn-sm btn-outline-success">Completar</a>
            <?php endif; ?>
            <a href="<?= base_url('tareas/editar/'.$tarea->id) ?>" class="btn btn-sm btn-outline-primary">Editar</a>
            <a href="<?= base_url('tareas/eliminar/'.$tarea->id) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</a>
          </div>
        </li>
      <?php endforeach; ?>
      <?php if (empty($tareas)): ?>
        <li class="list-group-item text-center text-muted">No hay tareas aún.</li>
      <?php endif; ?>
    </ul>

    </div>
  </div>
</div>

</body>
</html>
