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
  
    public function create()
    {

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
      
      // Se ejecuta un método de la clase "model" para la ejecución la consulta y se obtienen los datos en un arreglo.
      $this->get_query;


    }
    public function update()
    {

    }
    public function delete()
    {

    }

  }
?>
