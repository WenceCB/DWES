<!-- Creación de una sesión -->
<?php
session_start();
// Comprobación de que la variable $_SESSION está seteada
if(isset($_SESSION["usuario"]))
{
  // Variable para mostrar el estado de la sesión
  $info_sesion = "Sesión Activa";
  $Nombre = $_SESSION['usuario'];
  $Apellidos = $_SESSION['apellidos'];
  $Pob = $_SESSION['poblacion'];
}
// En caso de que no esté seteada la variable $_SESSION
else
{
  // Variable iControl que permite comprobar si se ha pulsado el submit independientemente de que se haya marcado algún check o rellenado información
  if (isset($_POST['iControl'])) {
    // Comprobación de que le check de Sesión está marcado
    if (isset($_POST['cSesion'])) {
      // Comprobación de que los campos del formulario no están en blanco
      if (($_POST['nNombre']) != "" && ($_POST['nApellidos']) != "" && ($_POST['nPob']) != "") {
        // Asignación del contenido a las variables en caso de que esté tod-o seteado y relleno
        $id = session_id();
        $_SESSION['usuario'] = $_POST['nNombre'];
        $_SESSION['apellidos'] = $_POST['nApellidos'];
        $_SESSION['poblacion'] = $_POST['nPob'];
        $_SESSION['color'] = $_POST['nColor'];
        $info_sesion = " Se han guardado datos de sesión";
        $Nombre = $_SESSION['usuario'];
        $Apellidos = $_SESSION['apellidos'];
        $Pob = $_SESSION['poblacion'];
        $colorCookie = "";
      }
      // No están todos los campos rellenos
      else
      {
        $info_sesion = "Faltan datos por meter";
        $Nombre = "";
        $Apellidos = "";
        $Pob = "";
        $colorCookie = "";
      }
    }
    // No se ha marcado el check de guardar sesión
    else
    {
      $info_sesion = "Tienes que marcar el check para guardar Sesión";
      $Nombre = "";
      $Apellidos = "";
      $Pob = "";
      $colorCookie = "";
    }
  }
  // Se ha pulsado Submit pero no se ha indicado nada
  else
  {
    $info_sesion ="";
    $Nombre = "";
    $Apellidos = "";
    $Pob = "";
    $colorCookie = "";
  }}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Log in</title>

  <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<?php
// Comprobar que la variable $_COOKIE está seteada
if (isset($_COOKIE["miCookie"]))
{
  // Asignar a la variable $colorCookie el contenido guardado en la Cookie "miCookie" y asignar valor a la variable $info
  $colorCookie=$_COOKIE['miCookie'];
  $info= "Hay una cookie guardada con el color ".$_COOKIE['miCookie'];
}
// En caso de que no esté seteada la variable $_COOKIE
else {
  // Comprobar con iControl que se ha pulsado el SUBMIT
  if (isset($_POST['iControl'])) {
    // Comprobar si está marcado el check de guardar color en COOKIE
    if (isset($_POST['chColor'])) {
      // Comprobar si ha escrito algo en el imput de COLOR
      if (($_POST['nColor']) != "") {
        // En caso de que tod-o esté correcto, creamos la cookie y guardamos el valor en las variables
        $colorCookie = $_POST['nColor'];
        setcookie("miCookie", $colorCookie, time() + 3600);
        $info = "Se ha guardado el color " .$colorCookie ." en la Cookie";
      }
      // En caso de que no se haya introducido un color , además de avisar, pongo a "" todas las variables
      else {
        $info = "Tienes que introducir un color";
        $Nombre = "";
        $Apellidos = "";
        $Pob = "";
        $colorCookie = "";
      }
    }
    // En caso de que no se haya marcado el check de Guardar Cookie y pongo a "" todas las variables
    else {
      $info = "Tienes que marcar el check para guardar Cookie";
      $Nombre = "";
      $Apellidos = "";
      $Pob = "";
      $colorCookie = "";
    }
  }
  // En caso de que no esté seteada la variable COOKIE pongo a "" todas las variables
  else
  {
    $info = "";
    $Nombre = "";
    $Apellidos = "";
    $Pob = "";
    $colorCookie = "";
  }
}
?>
<!-- Muestro en un apartado superior información sobre lo que está sucediendo en cuanto a la Sesión y COOKIES  -->
<div class="formulario-info">
  <label>
    <div><?php echo $info?></div>
    <div><?php echo $info_sesion?></div>
  </label>
</div>
<!-- Div que contiene tod-o mi formulario -->
<div class="contenedor">
  <!-- Div Formulario  -->
  <div id="f_datos" class="formulario">
    <form method="POST" action="inicio.php">
      <!-- Cabecera -->
      <h3>Datos del usuario</h3>
      <div>
        <!-- En función del input con php muestro un valor por defecto que es "" o el que haya guardado el usuario -->
        <label>Nombre:</label>
        <input type="text" placeholder="Nombre" name="nNombre"  value="<?php echo $Nombre ?>" />
      </div>
      <div>
        <label>Apellidos:</label>
        <input type="text" placeholder="Apellidos" name="nApellidos" value="<?php echo $Apellidos?>" />
      </div>
      <div>
        <label>Provincia:</label>
        <input type="text" placeholder="Población" name="nPob" value="<?php echo $Pob ?>" />
      </div>
      <div>
        <label>Color:</label>
        <input type="text" placeholder="Color" name="nColor" value="<?php echo $colorCookie ?>" />
      </div>
      <!-- Div que contiene los check y el enlace a los datos de sesión -->
      <div class="inferior">
        <div class="check"><input type="checkbox" name="chColor"/><span>Guardar Color en Cookie</span></div>
        <div class="check"><input type="checkbox" name="cSesion"/><span>Guardar Datos Usuario en Sesión</span></div>
        <!-- Input para controlar el envío de datos  -->
        <input type="submit" name="iControl" value="Guardar" />
        <!-- Enlace a la página que contiene los datos de Sesión -->
        <a href="sesion.php" rel="register" class="linkform">Ir a Datos de Sesión</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>