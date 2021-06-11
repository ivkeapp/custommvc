<?php

require_once('models/ModelAutor.php');
require_once('models/ModelVest.php');

class Admin{
    
    public function __construct() {
        session_start();
        if (!isset($_SESSION['autor'])) {
            header("Location: ?controller=gost&akcija=index"); 
        } else if ($_SESSION['autor']->admin == 0) {
            header("Location: ?controller=korisnik&akcija=index");   
        } 
    }
    
    // function for loading all news
    public function index(){
        // TO-DO
    }
    
    public function logout(){
        session_destroy();
        
    }

    // function for deleting news
    public function obrisivest(){
        // TO-DO
    }

}

