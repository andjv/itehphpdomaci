<?php


class Proizvod{

   public $proizvodID;
   public $naziv;
   public $tipID;
   public $brendID;
   public $cena;


    public function __construct($proizvodID=null, $naziv=null, $tipID=null, $brendID=null, $cena=null)
    {
        $this->proizvodID = $proizvodID;
        $this->naziv = $naziv;
        $this->tipID = $tipID;
        $this->brendID = $brendID;
        $this->cena = $cena;
    }

    public static function vrati($tip, $cena, mysqli $konekcija)
    {
        $query = "SELECT * FROM proizvod p join tip t on p.tipID = t.tipID join brend b on p.brendID = b.brendID";
        if($tip != "SVE"){
            $query .= " WHERE p.tipID = " . $tip;
        }
        $query.= " ORDER BY p.cena " . $cena;
        $resultSet = $konekcija->query($query);
        $proizvodi = [];
        while($proizvod = $resultSet->fetch_object()){
            $proizvodi[] = $proizvod;
        }
        return $proizvodi;
    }

    public static function dodaj($naziv, $tipID, $brendID, $cena, mysqli $konekcija)
    {
        $query = "INSERT INTO proizvod VALUES(null, '$naziv','$tipID','$brendID', $cena)";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }

    public static function izmeni($proizvodID, $cena, mysqli $konekcija)
    {
        $query = "UPDATE proizvod SET cena = '$cena' WHERE proizvodID = $proizvodID";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }

    public static function obrisi($proizvodID, mysqli $konekcija)
    {
        $query = "DELETE FROM proizvod WHERE proizvodID = $proizvodID";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }
}