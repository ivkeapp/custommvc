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
        $vesti = Vest::dohvatiVesti();       
        require_once("views/sablon/header_admin.php");
        require_once("views/adminvesti.php");
        require_once("views/sablon/footer.php");
    }
    
    public function logout(){
        session_destroy();
        header("Location: ?controller=gost&akcija=index");
    }

    // function for deleting news
    public function obrisivest(){
        $idvest=$_GET['id'];
        Vest::obrisiVest($idvest);
        header("Location: ?controller=admin&akcija=index");
    }

}

