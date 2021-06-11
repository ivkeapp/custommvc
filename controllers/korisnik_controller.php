<?php

require_once('models/ModelAutor.php');
require_once('models/ModelVest.php');

class Korisnik{
    
    public function __construct() {
        session_start();
        if (!isset($_SESSION['autor'])) {
            header("Location: ?controller=gost&akcija=index"); 
        } else if ($_SESSION['autor']->admin == 1) {
            header("Location: ?controller=admin&akcija=index");   
        } 
    }
   
}
