<?php

class Brend{

    public $brendID;
    public $brend;

    
    public function __construct($brendID=null,$brend=null)
    {
        $this->brendID = $brendID;
        $this->brend=$brend;
    }

    public static function vrati(mysqli $konekcija)
    {
        $query = "SELECT * FROM brend";
        $resultSet = $konekcija->query($query);
        $brendovi = [];
        while($brend = $resultSet->fetch_object()){
            $brendovi[] = $brend;
        }
        return $brendovi;
    }

}

