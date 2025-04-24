<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Convertir número a palabras</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
  <h4>Convertir número a palabras</h4>
  <form method="post">
    <div class="form-group">
      <label for="numero">Número</label>
      <input type="number" name="numero" class="form-control" required>
    </div>
    <button class="btn btn-primary">Convertir</button>
  </form>

  <?php if ($resultado): ?>
    <div class="alert alert-info mt-3">
      <strong>Resultado:</strong> <?= $resultado ?>
    </div>
  <?php endif; ?>

  <a href="<?= base_url('tareas') ?>" class="btn btn-secondary mt-3">Volver</a>
</div>
</body>
</html>
