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
    
    }
    public function update()
    {

    }
    public function delete()
    {

    }

  }
?>
