<?php

class Vest {
    private $id;
    private $naslov;
    private $sadrzaj;
    private $autor;
    private $datum;
    
    public function __construct($id, $naslov, $sadrzaj, $autor, $datum){
        $this->id = $id;
        $this->naslov = $naslov;
        $this->sadrzaj = $sadrzaj;
        $this->autor = $autor;
        $this->datum = $datum;
    }
    
    public function __get($imeAtributa) {
        return $this->$imeAtributa;
    }
    
    public static function dohvatiSve(){
        // TO-DO
    }
    
    public static function pronadji($ident){
        // TO-DO
        
    }
    
    public static function pretrazi($naslov){
        // TO-DO
    }
    
}
