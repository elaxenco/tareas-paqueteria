<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tareas Externas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4"> 
  <div class="container mt-4">
  <h4>Tareas desde API externa</h4>

  <form method="get" class="form-inline mb-3">
    <label for="limite" class="mr-2">Mostrar:</label>
    <input type="number" min="1" max="200" name="limite" id="limite" value="<?= $cantidad ?>" class="form-control mr-2" style="width: 100px;">
    <button class="btn btn-primary">Actualizar</button>
  </form>

  <ul class="list-group">
    <?php foreach ($tareas as $t): ?>
      <li class="list-group-item">
        <strong><?= $t['title'] ?></strong>
        <br><small>Completado: <?= $t['completed'] ? '✔' : '✘' ?></small>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php if ($total_paginas > 1): ?>
  <nav class="mt-3">
    <ul class="pagination">
      <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
        <li class="page-item <?= $i == $pagina_actual ? 'active' : '' ?>">
          <a class="page-link" href="<?= base_url("tareas/externas?limite=$cantidad&pagina=$i") ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
<?php endif; ?>
  <a href="<?= base_url('tareas') ?>" class="btn btn-secondary mt-3">Volver</a>
</div>
</body>
</html>
