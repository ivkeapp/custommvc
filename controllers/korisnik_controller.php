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
    
   
    public function index($trazi=NULL){
        if ($trazi == NULL) {
            $vesti = Vest::dohvatiVesti();
        } else {
            $vesti = Vest::pretraga($trazi);
        }
        $controller="korisnik";
        require_once("views/sablon/header_korisnik.php");
        require_once("views/vesti.php");
        require_once("views/sablon/footer.php");
    }
    
    public function pretraga(){
        $trazi=$_GET['pretraga'];
        $this->index($trazi);
    }
    
    public function dodajvest($naslov=NULL, $sadrzaj=NULL,$porukanaslov=NULL,$porukasadrzaj=NULL){
        require_once("views/sablon/header_korisnik.php");
        require_once("views/dodavanjevesti.php");
        require_once("views/sablon/footer.php");
    }

    public function dodavanjeVesti(){
        if ($_POST['naslov'] == "") {
            $porukanaslov = "Polje Naziv je ostalo prazno.";
        }else
            $porukanaslov=NULL;
        if ($_POST['sadrzaj'] == "") {
            $porukasadrzaj = "Polje Sadrzaj je ostalo prazno.";
        } else {
            $porukasadrzaj=NULL;
        }
        if($_POST['naslov']!="" && $_POST['sadrzaj']!=""){
            Vest::dodaj($_POST["naslov"], $_POST["sadrzaj"],$_SESSION["autor"]->korisnicko_ime);
            header("Location: ?controller=korisnik&akcija=mojevesti");   
        } else {
            $this->dodajvest($_POST['naslov'], $_POST['sadrzaj'],$porukanaslov,$porukasadrzaj);
        }
    }
    
    public function logout(){
        session_destroy();
        header("Location: ?controller=gost&akcija=index");
    }

    public function mojevesti(){
        $idAutor=$_SESSION["autor"]->korisnicko_ime;
        $vesti=Vest::dohvatiVesti($idAutor);
        require_once("views/sablon/header_korisnik.php");
        require_once("views/mojevesti.php");
        require_once("views/sablon/footer.php");
    }
    
    public function izmenivest($porukanaslov=NULL,$porukasadrzaj=NULL){
        $vest=Vest::dohvatiVest($_GET['id']);
        require_once("views/sablon/header_korisnik.php");
        require_once("views/izmenavesti.php");
        require_once("views/sablon/footer.php");
    }

    public function menjajvest(){
        $idVest=$_GET['id'];
        if ($_POST['naslov'] == "") {
            $porukanaslov = "Polje Naziv je ostalo prazno.";
        }else
            $porukanaslov=NULL;
        if ($_POST['sadrzaj'] == "") {
            $porukasadrzaj = "Polje Sadrzaj je ostalo prazno.";
        } else {
            $porukasadrzaj=NULL;
        }
        if($_POST['naslov']!="" && $_POST['sadrzaj']!=""){
            Vest::izmeniVest($idVest, $_POST["naslov"], $_POST["sadrzaj"],$_SESSION["autor"]->korisnicko_ime);
            header("Location: ?controller=korisnik&akcija=mojevesti");   
        } else {
            $this->izmenivest($porukanaslov,$porukasadrzaj);
        }
    }

    public function obrisivest(){
        $idvest=$_GET['id'];
        $autorId=$_SESSION["autor"]->korisnicko_ime;
        Vest::obrisiVest($idvest,$autorId);
        header("Location: ?controller=korisnik&akcija=mojevesti");
    }

    public function prikazivest(){
        $vest=Vest::dohvatiVest($_GET['id']);
        require_once("views/sablon/header_korisnik.php");
        require_once("views/vestprikaz.php");
        require_once("views/sablon/footer.php");
    }
}
