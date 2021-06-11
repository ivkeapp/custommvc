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
        $konekcija = DB::getInstanca();
        $upit = "SELECT * FROM vest";
        if ($autor != NULL) {
            $upit .= " WHERE autor='$autor'";
        }
        $rezultat = $konekcija->query($upit);       
        $niz = [];
        foreach($rezultat->fetchAll() as $red){
            $niz[] = new Vest($red['id'], $red['naslov'],$red['sadrzaj'],$red['autor'],$red['datum']);
        }
        return $niz;
    }
    
    public static function dohvatiVest($idvesti){
        $konekcija = DB::getInstanca();
        $rezultat = $konekcija->prepare("SELECT * FROM vest v, autor a WHERE v.id=:nesto and v.autor=a.korisnicko_ime");
        $rezultat->execute(array('nesto' => $idvesti));
        $vest = $rezultat->fetch();
        return new Vest($vest['id'], $vest['naslov'], $vest['sadrzaj'], $vest['ime']." ".$vest['prezime'], $vest['datum']);
    }
    
    public static function pretraga($tekst){
        $konekcija = DB::getInstanca();
        $rezultat = $konekcija->prepare("SELECT * FROM vest WHERE naslov LIKE :nesto or sadrzaj LIKE :nesto");
        $rezultat->execute(array('nesto' => "%$tekst%"));
        $niz = [];
        foreach($rezultat->fetchAll() as $red){
            $niz[] = new Vest($red['id'], $red['naslov'], $red['sadrzaj'],$red['autor'],$red['datum']);
        }
        return $niz;
    }
    
    public static function dodaj($naslov, $sadrzaj,$autor){
        $konekcija = DB::getInstanca();
        $rezultat = $konekcija->prepare("INSERT INTO Vest (autor, naslov, sadrzaj, datum) VALUES (:autor, :naslov, :sadrzaj, :datum)");
        $rezultat->execute(array('autor' => $autor,"naslov"=> $naslov,"sadrzaj"=>$sadrzaj,"datum"=>date("Y-m-d"))); 
    }
    
    public static function izmeniVest($idVest, $naslov, $sadrzaj,$autor=NULL){
        $konekcija = DB::getInstanca();
        $datum=date("Y-m-d");
        $upit="UPDATE Vest SET naslov='$naslov', sadrzaj='$sadrzaj', datum='$datum' WHERE id=$idVest";
        if ($autor != NULL) {
            $upit .= " AND autor='$autor'";
        }
        $konekcija->query($upit);    
    }
    
    public static function obrisiVest($idVest, $autor=NULL){
        $konekcija = DB::getInstanca();
        $upit="DELETE FROM Vest WHERE id=$idVest";
        if ($autor != NULL) {
            $upit .= " AND autor='$autor'";
        }
        $konekcija->query($upit);   
    }
}

