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
        $konekcija = DB::getInstanca();
        $upit = "SELECT * FROM vesti";
        $rezultat = $konekcija->query($upit);
        
        $niz = [];
        foreach($rezultat->fetchAll() as $red){
            $niz[] = new Vest($red['id'], $red['naslov'],$red['sadrzaj'],$red['autor'],$red['datum']);
        }
        return $niz;
    }
    
    public static function pronadji($ident){
        $konekcija = DB::getInstanca();
        $rezultat = $konekcija->prepare("SELECT * FROM vesti WHERE id=:nesto");
        $rezultat->execute(array('nesto' => $ident));
        $vest = $rezultat->fetch();
        return new Vest($vest['id'], $vest['naslov'],
                $vest['sadrzaj'], $vest['autor'], $vest['datum']);
        
    }
    
    public static function pretrazi($naslov){
        $konekcija = DB::getInstanca();
        $rezultat = 
                $konekcija->prepare("SELECT * FROM vesti "
                        . "WHERE naslov LIKE :nesto");
        $rezultat->execute(array('nesto' => "%$naslov%"));
        $niz = [];
        foreach($rezultat->fetchAll() as $red){
            $niz[] = new Vest($red['id'], $red['naslov'],
                    $red['sadrzaj'],$red['autor'],$red['datum']);
        }
        return $niz;
    }
    
}
