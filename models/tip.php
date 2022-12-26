<?php

class Tip{

    public $tipID;
    public $tip;


    public function __construct($tipID=null,$tip=null)
    {
        $this->tipID = $tipID;
        $this->tip=$tip;
    }

    public static function vrati(mysqli $konekcija)
    {
        $query = "SELECT * FROM tip";
        $resultSet = $konekcija->query($query);
        $tipovi = [];
        while($tip = $resultSet->fetch_object()){
            $tipovi[] = $tip;
        }
        return $tipovi;
    }

}

