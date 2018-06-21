<?php
  require ('StatusModel.php');


  // Se define solo código HTML, pero se mezclara con PHP de forma ordenada.
  echo '<h1> CRUD DE LA TABLA - STATUS -';
  $status = new StatusModel();

  
  // Es esta línea se hace la conexion del modelo con la vista.
  // Se genera el arreglo donde contiene los datos de la consulta.
  $status_data = $status->read();
  // Pasa de un objeto a texto, para poderlo visualizar.
  // var_dump($status_data);
  
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

  /*
  echo '<h2> Insertando Status</h2>';
    $new_status = array(
      'status_id'=>0, // para que agrega el último número.
      'status'=>'Otro Status'
    );

  // Ingresar un registro en la tabla de "Status".
  $status->create($new_status);
*/

  echo '<h2> Actualizando Status</h2>';
  $update_status = array(
    'status_id'=>6, // para que agrega el último número.
    'status'=>'Other Status'
  );
  $status->update($update_status);

  echo '<h2> Eliminado Status</h2>';          
  $status->delete(6);
  

?>