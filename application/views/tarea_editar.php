<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar tarea</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
  <h4>Editar tarea</h4>
  <form method="post" action="<?= base_url('tareas/actualizar/'.$tarea->id) ?>">
    <div class="form-group">
      <label for="titulo">Título</label>
      <input type="text" name="titulo" class="form-control" value="<?= $tarea->titulo ?>" required>
    </div>
    <div class="form-group">
      <label for="descripcion">Descripción</label>
      <textarea name="descripcion" class="form-control"><?= $tarea->descripcion ?></textarea>
    </div>
    <button class="btn btn-primary">Guardar cambios</button>
    <a href="<?= base_url('tareas') ?>" class="btn btn-secondary">Volver</a>
  </form>
</div>
</body>
</html>
