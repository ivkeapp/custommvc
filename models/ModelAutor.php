<?php

/**
 * Description of ModelAutor
 *
 * @author Ivan Zarkovic
 */

class Autor {
    private $ime;
    private $prezime;
    private $korisnicko_ime;
    private $lozinka;
    private $admin;


    public function __construct($korisnicko_ime, $lozinka, $ime, $prezime, $admin=0) {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->korisnicko_ime = $korisnicko_ime;
        $this->lozinka = $lozinka;  
        $this->admin = $admin;  
    }
    
    public function __get($imeAtributa) {
        return $this->$imeAtributa;
    }
    
    public static function dohvatiAutora($korisnicko_ime){
        $konekcija = DB::getInstanca();
        $rezultat = $konekcija->query("SELECT * FROM autor WHERE korisnicko_ime='$korisnicko_ime'");     
        $autor = $rezultat->fetch();
        if ($autor!=NULL) {
            return new Autor($autor['korisnicko_ime'], $autor['lozinka'], $autor['ime'], $autor['prezime'],$autor['admin']);
        } else {
            return FALSE;
        }
    }
    
    public function ispravanPassword($lozinka){
        if ($this->lozinka == $lozinka) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public static function dohvatiAutore(){
        $konekcija = DB::getInstanca();
        $rezultat = $konekcija->query("SELECT * FROM autor");     
        $niz = [];
        foreach($rezultat->fetchAll() as $autor){
         	$niz[] = new Autor($autor['korisnicko_ime'], $autor['lozinka'], $autor['ime'], $autor['prezime'], $autor['admin']);
        }
        return $niz;
    }
    
}
