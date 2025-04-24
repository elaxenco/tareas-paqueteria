<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?= $titulo ?? 'Panel' ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      display: flex;
    }
    .sidebar {
      width: 200px;
      height: 100vh;
      background-color: #343a40;
      color: white;
      padding-top: 20px;
      position: fixed;
    }
    .sidebar a {
      color: white;
      display: block;
      padding: 10px;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      margin-left: 200px;
      padding: 20px;
      width: 100%;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h5 class="text-center">Menú</h5>
  <div class="text-center mb-3" id="reloj" style="font-size: 1.2em;">--:--:--</div>
  <a href="<?= base_url('tareas') ?>">📝 Tareas</a>
  <a href="<?= base_url('tareas/externas') ?>">🌐 Tareas externas</a>
  <a href="<?= base_url('tareas/numero_a_palabra') ?>">🔢 Número a palabras</a>
  <a href="<?= base_url('tareas/logout') ?>">🚪 Cerrar sesión</a>


</div>

<div class="content">
  <?php $this->load->view($vista, $datos ?? []); ?>
</div>

</body>

<script>
function actualizarReloj() {
  const ahora = new Date();
  const horas = String(ahora.getHours()).padStart(2, '0');
  const minutos = String(ahora.getMinutes()).padStart(2, '0');
  const segundos = String(ahora.getSeconds()).padStart(2, '0');
  const reloj = `${horas}:${minutos}:${segundos}`;
  document.getElementById('reloj').textContent = reloj;
}

setInterval(actualizarReloj, 1000);
actualizarReloj(); 
</script>
</html>
