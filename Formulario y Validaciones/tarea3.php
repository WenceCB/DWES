<!DOCTYPE html>
<html lang="en">
<!-- Cargamos una hoja de estilos para dar formato a nuestro código -->
<link rel="stylesheet" type="text/css" href="estilos.css">
<head>
  <meta charset="UTF-8">
  <title>Formularios PHP</title>
</head>
<body>
<!-- Declaración de código PHP -->
<?php
// Inicializamos la variable que controla si se ha introducido texto o no
$aviso = "Introduce datos";

// Comprobamos si está seteado el POST, en caso de no estarlo quiere decir que no hemos introducido datos al enviar el formulario

if (isset($_POST['datos'])){

    // En caso de tener información comenzamos con las comprobaciones
    // Asigno a una variable el contenido que me interesa , para ahorrar tiempo al escribir código
  $datos = $_POST['datos'];

    // En primer lugar compruebo si el valor introducido es númerico
  if(is_numeric($datos)) {

        // Comienzan las comprobaciones de los valores númericos y en caso de coincidir se asigna el mensaje correspondiente a nuestra variable

    switch ($datos) {
      case  $datos < 0:
        $aviso = " Valor Negativo";
        break;
      case  $datos >= 0 && $datos < 10:
        $aviso = " Positivo menor que 10";
        break;
      case  $datos >= 10 && $datos <= 20:
        $aviso = " Positivo y está entre 10 y 20";
        break;
      case  $datos > 20:
        $aviso = " Positivo mayor que 20";
        break;
    }
  }
  // En caso de no haber introducido valores númericos, le pasamos el mensaje a mostrar a nuestra variable
  else{
    $aviso = " Tienes que introducir números";
  }
}
?>
<div class="formulario">
    <h1>FORMULARIO</h1>
    <!-- Creamos nuestro formulario con el método de envío POST -->
      <form action="tarea3.php" method="post">
        <input type="text" name="datos">
        <input type="submit">
      </form>

    <!-- El contenido de nuestra variable se mostrará en función de si está seteado el POST o si se ha introducido valores numéricos -->
      <h2><?php echo $aviso?></h2>
</div>

<h1>Tabla con Bucle For</h1>

<!-- Empezamos a crear la estructura de nuestra tabla -->
  <table>
    <tr>
      <?php
      // Inicializamos una variable de tipo array
      $matriz=array();
      // Recorremos el bucle for, en cada iteración vamos creando una columna nueva con el valor que contiene i
      for ($i =0; $i < 10; $i++){
        echo "<td>";
        echo $i;
        echo "</td>";
          // En cada iteración vamos introduciendo el valor i en la última posición de nuestro array
        array_push($matriz,$i);
      }
      ?>
    </tr>
  </table>

<h1>Tabla con Bucle Foreach</h1>
<!-- Creamos la estructura de nuestra segunda tabla -->
  <table>
    <tr>
      <?php
       // A través de un bucle foreach recorremos nuestro array, asignando el contenido de cada iteración a la variable $valor
      foreach ($matriz as $valor){
        // Por cada elemento del array se crea una nueva columna con el contenido de la variable $valor
        echo "<td>";
        echo $valor;
        echo "</td>";
      }
      ?>
    </tr>
  </table>
</body>
</html>