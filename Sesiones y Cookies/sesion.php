<!-- Inicio de sesión -->
<?php
session_start();
    // Comprobación de que la variable $_SESSION está seteada
if(isset($_SESSION['usuario']))
{
    // Obtener de las variables de sesión los datos a mostrar
        $id = session_id();
        $nombre = $_SESSION['usuario'];
        $color = $_SESSION['color'];
        $apellidos = $_SESSION['apellidos'];
        $pob = $_SESSION['poblacion'];
        $info= "Sesión Activa";
        // Variable para indicar a través de la propiedad style del elemento el tipo de fondo en caso de que la sesión esté activa o no
        $css=1;
    // En caso de que esté seteada , comprobar que el Submit oculto se ha seteado y que tiene el valor 0
        if(isset($_POST['s0']) && $_POST['s0'] == 0){
            // Se destruye la sesión y la Cookie , se inicializan variables y se indica al usuario el estado de la sesión
            session_destroy();
            setcookie('miCookie',null, -1);
            $info= "Se ha destruido la sesión y Cookie";
            $id = "";
            $nombre = "";
            $apellidos = "";
            $pob = "";
            $color = "";
            // Cambio el valor de la variable a 0 para que muestre el fondo en rojo "En su SCRIPT podrá comprobarse el funcionamiento"
            $css=0;
            }
}
// En caso de que no esté seteada la Sesión, muestro información y las variables se quedan en ""
else
{
    $info="No hay sesión Activa";
    $id = "";
    $nombre = "";
    $apellidos = "";
    $pob = "";
    $color = "";
    $css=0;

}
?>
<!DOCTYPE html>
<html>
<link href="estilos.css" type="text/css" rel="stylesheet">
<head>
  <meta charset="UTF-8">
  <title>Log in</title>
</head>
<!-- Una vez cargado el body llamo a la función comprobarActivo, en la que se pasa como parámetro el id del elemento -->
<body onload="comprobarActivo('lInfo')">
<!-- Div que contiene el formulario -->
<div class = "contenedor">
    <!-- Div con todos los elementos -->
  <div class="formulario">
    <form action="?" method="POST">
      <h3>Datos de Sesión</h3>
        <!-- En función del elemento muestro información al usuario -->
      <label>Info:  <span id="lInfo"><?php echo $info ?></span></label>
      <label>Nombre: <span><?php echo $nombre ?></span></label>
      <label>Apellido: <span><?php echo $apellidos ?></span></label>
      <label>Población: <span><?php echo $pob ?></span></label>
      <label>Color: <span><?php echo $color ?></span></label>
      <label>ID: <span><?php echo $id ?></span></label>
        <!-- Div que contiene el Submit y un imput oculto con su valor -->
      <div class="inferior">
        <input type="submit" value="Cerrar Sesión"  name="cSesion">
        <input type="hidden" value="0" name="s0"  >
      </div>
    </form>
  </div>
</div>
<!-- Script para contorlar el fondo del elemento lInfo -->
<script>
  function comprobarActivo(info) {
      // Guardo en una variable JS el contenido de la variable PHP
    var activo = <?php echo $css ?>;
      // Accedo al elemento
    var lInfo = document.getElementById(info);
      // Comprobación del valor de la variable y acceder a la propiedad backgroundColor y establecerlo en función del valor
    if ( activo == 1){

      lInfo.style.backgroundColor = "green";
    }
    else {
      lInfo.style.backgroundColor = "red";
    }
  }
</script>
</body>
</html>