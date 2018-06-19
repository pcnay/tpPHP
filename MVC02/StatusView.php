<?php
  require ('StatusModel.php');


  // Se define solo código HTML, pero se mezclara con PHP de forma ordenada.
  echo '<h1> CRUD DE LA TABLA - STATUS -';
  $status = new StatusModel();

  
  // Es esta línea se hace la conexion del modelo con la vista.
  $status_data = $status->read();
  var_dump($status_data);
  
// Mostrando los datos en pantalla.
  $num_status = count($status_data);
  echo '<h2>Numero de status : <mark>'.$num_status.'</mark></h2>';
  echo '<h2>Tabla de Status </>';
  // <th> = Son los encabezado lo despliega en negritas.
  // <td> = Los las campos a desplegar.
  echo '<table>
          <tr>
            <th>status_id</th> 
            <th>status</th>
          </tr>';
          for ($n=0; $n < count($status_data);$n++)
          {
            echo '<tr>
                  <th>'.$status_data[$n]['status_id'].'</th>
                  <th>'.$status_data[$n]['status'].'</th>
                  </tr>';
            
          }
  echo '</table>';




?>