<?php
  require('statusmodel.php');
  // Controladora las peticiones de la "Vista" y el "Controlador"
  class StatusController
  {
    private $model;

    public function __construct()
    {
      // Se realiza la comunicacion de la capa de "Controller" con la de "Modelo"
      $this->model = new StatusModel();

    }
    public function create($status_data = Array())
    {
      return $this->model->create($status_data);
    }
    public function read($status_id = '')
    {
      return $this->model->read($status_id);      
    }
    public function update($status_data = Array())
    {
      return $this->model->update($status_data);
    }
    public function delete($status_id = '')
    {
      return $this->model->delete($status_id);
    }


  } 
?>
