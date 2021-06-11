<?php
require_once('models/ModelAutor.php');
require_once('models/ModelVest.php');

class Gost{
    
    public function __construct() {       
        // check if user is already logged in
        session_start();
        if (isset($_SESSION['autor'])) {
            if ($_SESSION['autor']->admin == 1) {
                header("Location: ?controller=admin&akcija=index");   
            } else {
                header("Location: ?controller=korisnik&akcija=index");
            }
        }
    }

}
