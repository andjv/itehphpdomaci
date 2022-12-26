<?php
require "konekcija.php";
require "models/tip.php";

$tipovi = Tip::vrati($konekcija);

foreach ($tipovi as $tip){
    ?>
    <option value="<?= $tip->tipID ?>"><?= $tip->tip ?> </option>
    <?php
}
?>