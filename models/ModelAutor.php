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
        // TO-DO
    }
    
    public function ispravanPassword($lozinka){
        // TO-DO
    }
    
    public static function dohvatiAutore(){
        // TO-DO
    }
    
}
