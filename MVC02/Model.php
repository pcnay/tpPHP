<?php

  // Modelo abstracto de la conexión a la Base De Datos.
  abstract class Model
  {
    // Atributos de la clase.
    // Los atributos para la conexion de la base de datos.
    // Estatico y accesible solamente en las clases hijas.
    // protected = Accesible desde la misma clase y desde las clases que lo hereden.
    // private = Solo es accesible dentro de la clase donde se define.
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    // private static $db_name = 'mexflix';
    protected $db_name = 'mexflix';
    private static $db_charset = 'utf8';
    private $conn;
    protected $query;
    protected $rows = array();

    // Métodos.
    // Métodos abstractos para el CRUD de clases que hereden.
    abstract protected function create();
    abstract protected function read();
    abstract protected function update();
    abstract protected function delete();

    // Método privado para conectarse a la Base De Datos.
    private function db_open()
    {
      $this->conn = new mysqli(
        self::db_host, // $this->db_host;
        self::db_user,
        self::db_pass,
        $this->db_name
      );

      // Para aceptar caracteres fuera del ingles.
      $this->conn->set_charset(self::db_charset);

    }

    // Método privado para desconectarse a la Base De Datos.
    private function db_close()
    {
      $this->conn->close();
    }

    // Estableces un "query" simple del tipo "INSERT", "DELETE", "UPDATE"
    // Indicandonos si se ejecuto la consulta.
    protected function set_query()
    {
      $this->db_open(); // Se crea la conexion a la base de datos.
      $this->conn->query($this->query);
      $this->db_close();
    }

    // Extraer resultados de una consulta de tipo SELECT en un array.
    protected function get_query()
    {
      $this->db_open();
      $result = $this->conn->query($this->query); // Asigna el valor de la ejecución del Query.

      // $this->rows[] se define como arreglo.
      // fetch_assoc() = Devuelve los reg de la consulta por el nombre del campo.
      // http://mx1.php.net/manual/en/mysqli-result.fetch-assoc.php
      while($this->rows[]= $result->fetch_assoc())
      // Este while no tiene cuerpo.
      // Dinamicamente se estan asignado al arreglo lo que resulto en la consulta.

      // Se Cierra la conexión.
      $result->close();
      $this->db_close();
      // "array_pos" se agrega ya que borra el último elemento, ya que por defecto agrega un null al final.
      return array_pos($this->rows);
      

    }


  }
?> 