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
    
    // function for reading all news
    public function index($trazi=NULL){
        if ($trazi == NULL) {
            $vesti = Vest::dohvatiVesti();
        } else {
            $vesti = Vest::pretraga($trazi);
        }
        $controller="gost";
        require_once("views/sablon/header_gost.php");
        require_once("views/vesti.php");
        require_once("views/sablon/footer.php");
    }

    // metoda koja se poziva prilikom pretrage
    public function pretraga(){
        $trazi=$_GET['pretraga'];
        $this->index($trazi);
    }
     
    // informacije o svim autorima u sistemu
    public function  autori(){
        $autori= Autor::dohvatiAutore();
        require_once("views/sablon/header_gost.php");
        require_once("views/autori.php");
        require_once("views/sablon/footer.php");
    }
          
    // init login form
    public function login($korime=NULL, $poruka=NULL,$porukakorime=NULL,$porukalozinka=NULL)
    {
        require_once("views/sablon/header_gost.php");
        require_once("views/login.php");
        require_once("views/sablon/footer.php");
    }
    
    // on submit login
    public function ulogujse(){
        if ($_POST['korime'] == "") {
            $porukakorime = "Polje Korisnicko ime je ostalo prazno.";
        }else
            $porukakorime=NULL;
        if ($_POST['lozinka'] == "") {
            $porukalozinka = "Polje Lozinka je ostalo prazno.";
        } else {
            $porukalozinka=NULL;
        }
        if($_POST['korime']!="" && $_POST['lozinka']!=""){
            $autor=Autor::dohvatiAutora($_POST['korime']);
            if ($autor==NULL) {
                $this->login($_POST['korime'],"Neispravno korisnicko ime!");
            } else if (!$autor->ispravanPassword($_POST['lozinka'])) {
                $this->login($_POST['korime'],"Neispravna lozinka!");
            } else {
                $_SESSION['autor']= $autor;
                if($autor->admin==1){
                    header("Location: ?controller=admin&akcija=index");   
                } else {
                    header("Location: ?controller=korisnik&akcija=index");
                }
            }
        } else {
            $this->login($_POST['korime'], NULL,$porukakorime,$porukalozinka);
        }
    }
    
    // show one news
    public function prikazivest(){
        $vest=Vest::dohvatiVest($_GET['id']);
        require_once("views/sablon/header_gost.php");
        require_once("views/vestprikaz.php");
        require_once("views/sablon/footer.php");
    }
    
    // error
    public function greska(){
        require_once 'views/greska.php';
    }
    
    
}
