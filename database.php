<?php
  //class database that will connect to the database
  class Database {
      private $host;
      private $dbname;
      private $username;
      private $password;

      public $DBH;

      //////CONSTRUCT METHOD/////////
      function __construct() {
          $this->host = DB_HOST;
          $this->dbname = DB_NAME;
          $this->username = DB_USER;
          $this->password = DB_PASS;

          $this->connect();
      }

      /////////FUNCTION TO CONNECT TO THE DATABASE///////////
      function connect() {
          try {
              $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username,$this->password);
              $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
              echo $e->getMessage();
          }
      }

      function insert($query) {
          $insert = $this->DBH->query($query);
          if ($insert) {
              return $insert;
          } else {
              echo "Registration not entered";
          }
      }
  }
 ?>