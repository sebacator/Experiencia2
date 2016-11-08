<?php
// Función para evitar inyecciones
function Filtro($texto) {
  return htmlspecialchars(trim($texto), ENT_QUOTES);
}

// Variables
$directorio = 'C:/wamp/www/FormularioPHP/assets/';
$enviado = isset($_POST['enviado']) ? (int) $_POST['enviado'] : 0;
$apellido = isset($_POST['apellido']) ? Filtro($_POST['apellido']) : '';
$fecha = isset($_POST['fecha']) ? (String)$_POST['fecha'] : 0;
$region = isset($_POST['region']) ?  Filtro($_POST['region']) : '';
$nombre = isset($_POST['nombre']) ? Filtro($_POST['nombre']) : '';
$correo = isset($_POST['correo']) ? Filtro($_POST['correo']) : '';
$link = isset($_POST['link']) ? Filtro($_POST['link']) : '';
$sexo = isset($_POST['sexo']) ? Filtro($_POST['sexo']) : '';
$color = isset($_POST['color']) ? Filtro($_POST['color']) : '';
$ciencia = isset($_POST['ciencia']) ? Filtro($_POST['ciencia']) : '';
$deportes = isset($_POST['deportes']) ? Filtro($_POST['deportes']) : '';
$pintura = isset($_POST['pintura']) ? Filtro($_POST['pintura']) : '';
$videos = isset($_POST['videos']) ? Filtro($_POST['videos']) : '';
$error = '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Proyecto para enseñar el funcionamiento de un formulario en PHP">
  <meta name="keywords" content="html, bootstrap, php, formulario, desarrollo, web">
  <meta name="author" content="Sebastian Concha">
  <title>Formulario enviado</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container">
  <span style="padding-top: 10px;"></span>
<?php
// Mostrar contenido
if(empty($nombre)) {
  $error = 'Por favor, ingrese su nombre.';
} else if(empty($apellido)) {
  $error = 'Por favor, ingrese su apellido.';
} else if(empty($fecha)) {
  $error = 'Por favor, ingrese año de nacimiento.';
} else if(empty($correo)) {
  $error = 'Por favor, ingrese su correo electrónico.';
} else if(empty($sexo)) {
  $error = 'Por favor, ingrese su sexo.';
}

// Vista de error
if(!empty($error)) {
?>
<div class="alert alert-info">
  <i class="glyphicon glyphicon-info-sign"></i>
  <?php echo $error; ?>
</div>
<a href="./" class="btn btn-warning">
  <i class="glyphicon glyphicon-chevron-left"></i>
  Volver
</a>
<?php
// Vista de éxito
} else {
  // Subir imagen
  //move_uploaded_file($foto['tmp_name'], $foto_subida);
?>
  <h3>¡Muchas gracias <b><?php echo $nombre; ?></b> <b><?php echo $apellido; ?></b>!</h3>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Datos enviados</h3>
    </div>
    <div class="panel-body">
      <p>Fecha de nacimiento: <b><?php echo $fecha; ?></b></p>
      <p>Sexo: <b><?php echo $sexo; ?></b></p>
      <p>Región: <b><?php echo $region; ?></b> </p>
      <p>Areas de interes: <?php if(empty($ciencia)){ } else {echo $ciencia;}
        if(empty($pintura)){ } else {echo $pintura;}
        if(empty($deportes)){ } else {echo $deportes;}  
        if(empty($videos)){ } else {echo $videos;} ?></p> 
      <p>Pagina personal: <b><?php echo $link; ?></b> </p>
      <p>Correo electronico: <b><?php echo $correo; ?></b> </p>
      <p>Color favorito: <b><?php echo $color; ?></b> </p>
    </div>
    <div class="panel-footer">
      <div class="text-right">
        <a href="./" class="btn btn-primary">
          <i class="glyphicon glyphicon-chevron-left"></i>
          Volver
        </a>
      </div>
    </div>
  </div>
<?php } ?>
</div>
</body>
</html>