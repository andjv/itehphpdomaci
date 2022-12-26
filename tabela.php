<?php
require "konekcija.php";
require "models/proizvod.php";

$tip = trim($_GET['tip']);
$cena = trim($_GET['cena']);

$proizvodi = Proizvod::vrati($tip, $cena, $konekcija);

?>

<table class="table">
    <thead>
        <tr style="background-color: #fdfdfda6">
            <th style="width: 25%">Tip</th>
            <th style="width: 25%">Brend</th>
            <th style="width: 25%">Naziv</th>
            <th style="width: 25%">Cena</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($proizvodi as $proizvod){
    ?>
    <tr>
        <td><?= $proizvod->tip?></td>
        <td><?= $proizvod->brend?></td>
        <td><?= $proizvod->naziv?></td>
        <td><?= $proizvod->cena . "RSD" ?></td>
    
    </tr>
<?php
}
?>
    </tbody>
</table>

