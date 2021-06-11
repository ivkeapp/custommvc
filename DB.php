<?php
// Class for connection to the database
class DB {
    private static $instanca = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstanca() {
      if (!isset(self::$instanca)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instanca = new PDO('mysql:host=localhost;dbname=vesti', 'root', '', $pdo_options);
      }
      return self::$instanca;
    }
  }
?>
