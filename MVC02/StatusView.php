<?php
  require ('StatusModel.php');

  // Se define solo código HTML, pero se mezclara con PHP de forma ordenada.
  echo '<h1> CRUD DE LA TABLA - STATUS -';
  $status = new StatusModel();

  
  // Es esta línea se hace la conexion del modelo con la vista.
  $status_data = $status->read();
  var_dump($status_data);
  
// Mostrando los datos en pantalla.

  


?>