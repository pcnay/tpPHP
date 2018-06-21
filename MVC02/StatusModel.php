<?php
  require_once("Model.php");

  class StatusModel extends Model
  {
    // Se definen los atributos de la base de datos.
    public $status_id;
    public $status;

    function __construct()
    {
      $this->db_name = 'mexflix';

    }

    function __destruct()
    {
      // unset($this);      
    }

    // Se comenzara a definir los métodos para el CRUD de la tabla "Status"
    // como se hereda de la clase Abstracta de "Model", se tienen que definir todos los metodos en la clase de que  hereda.
    
    // Se pasa como parametro un arreglo, que se define en la cabecera de la función.

    public function create($status_data=array())
    {
      foreach ($status_data as $nombreCampo => $valorCampo)
      {
        // De valores de Arreglo Asociativos a variables de PHP, $$nombreCampo
        // Variables de Variable.
        //http://php.net/manual/es/language.variable.variable.php
        $$nombreCampo = $valorCampo;
      }  

      // Se usan las comillas porque se manejan parametros en la consultas.
      // Se agrega el script para la ejecución de la consulta.
      $this->query = "INSERT INTO status (status_id,status) VALUES ($status_id,'$status')";

      //Ejecuta las instrucciones de la consulta anterior.
      $this->set_query();


    }
    // Si no tiene valor el parametro pasado, se le asigna en blanco.
    public function read($status_id = '')
    {
      // Se utilizara un operador ternario para asignar la consulta.
      // Se agrega la doble comilla, ya que se esta validando con la variable $status_id
      $sql = ($status_id != '')
      ?"SELECT * FROM status WHERE status_id = $status_id"
      :"SELECT * FROM status";

      /* 
      Es lo mismo del anterior
      if ($status_id != '')
      {
        $sql = "SELECT * FROM status WHERE status_id = $status_id";
      }
      else
      {
        $sql = "SELECT * FROM status";
      }

      */
      // Se asigna al atributo de "query" de la clase "model", donde se aloja la consulta a ejecutar.
      
      $this->query = $sql;
      
      // Se ejecuta un método de la clase "model" para la ejecución la consulta y se obtienen los datos en un arreglo "rows".
      $this->get_query();
      
      $num_rows = count($this->rows);
      // echo $num_rows;
      $data = array();
      // Permite recorrer un arreglo de una forma más optimizada.
      // http://php.net/manual/en/control-structures.foreach.php
      // De los elementos del arreglo "rows" le asigna los valores de "Llave" su valor, ya que es un arreglo asociativo
      // Es decir que los pasa a Arreglo Asociativo Clave , Valor.
      foreach ($this->rows as $nombreCampo => $valorCampo)
      {
        // Agrega una nueva posicion al final del arreglo.
        // array_push($data,$valorCampo);
        $data[$nombreCampo] = $valorCampo;
      }
      
      return $data;
    }

    public function update($status_data = Array())
    {
      foreach ($status_data as $nombreCampo => $valorCampo)
      {
        // De valores de Arreglo Asociativos a variables de PHP, $$nombreCampo
        // Variables de Variable.
        //http://php.net/manual/es/language.variable.variable.php
        $$nombreCampo = $valorCampo;
      }  

      // Se usan las comillas porque se manejan parametros en la consultas.
      // Se agrega el script para la ejecución de la consulta.
      $this->query = "UPDATE status SET status_id = $status_id,status = '$status' WHERE status_id = $status_id";
            
      //Ejecuta las instrucciones de la consulta anterior.
      $this->set_query();

    }
    // Recibe como parámetro 
    public function delete($status_id='')
    {
      $this->query = "DELETE FROM status WHERE status_id = $status_id";
      $this->set_query();
    }

  }
?>
