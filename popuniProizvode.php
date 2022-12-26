<?php
require "konekcija.php";
require "models/proizvod.php";

$proizvodi = Proizvod::vrati("SVE","asc",$konekcija);      

foreach ($proizvodi as $proizvod){
    ?>
    <option value="<?= $proizvod->proizvodID ?>"><?= $proizvod->brend . " " . $proizvod->naziv . " ( " . $proizvod->cena . " RSD )" ?> </option>
    <?php
}
?>