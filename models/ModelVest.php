<?php

class Vest{
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
    
    public static function dohvatiVesti($autor=NULL){
        // TO-DO
    }
    
    public static function dohvatiVest($idvesti){
        // TO-DO
    }
    
    public static function pretraga($tekst){
        // TO-DO
    }
    
    public static function dodaj($naslov, $sadrzaj,$autor){
        // TO-DO
    }
    
    public static function izmeniVest($idVest, $naslov, $sadrzaj,$autor=NULL){
        // TO-DO  
    }
    
    public static function obrisiVest($idVest, $autor=NULL){
        // TO-DO  
    }
}

