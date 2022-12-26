<?php
require "konekcija.php";
require "models/brend.php";

$brendovi = Brend::vrati($konekcija);

foreach ($brendovi as $brend){

    ?>
    <option value="<?= $brend->brendID ?>"><?= $brend->brend?> </option>

<?php
}
?>