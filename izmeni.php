<?php
require "konekcija.php";
require "models/proizvod.php";

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if(isset($_POST['izmeni'])){

    $proizvod = trim($_POST['proizvod']);
    $cena = trim($_POST['cena']);

    if(Proizvod::izmeni($proizvod, $cena, $konekcija)){
        echo '<script type="text/javascript">
            window.onload = function () { alert("Odabrani proizvod je izmenjen!"); } 
            </script>'; 
    }else{
        echo '<script type="text/javascript">
            window.onload = function () { alert("Izmena nije uspešna!"); } 
            </script>'; 
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Izmeni proizvod</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   
    <div class="container-xxl py-5">
        <div class="container"><br><br><br><br><br>
            <div class="row">
                <form method="post" action="" id="forma" style="margin-top: 50px">
                    <label for="proizvod">Proizvod</label>
                    <select id="proizvod" name="proizvod" class="form-control" style="width: 400px;"></select>

                    <label for="cena">Cena</label>
                    <input type="number" id="cena" name="cena" class="form-control" style="width: 400px;">

                    <br>
                    <button class="BtnForm" type="submit" name="izmeni" style="width: 300px;">Izmeni</button>
                    <br><br>
                    <a href="index.php", class="BtnForm">Nazad</a>

                </form>
                <br><br>
            </div>

        </div>
    </div> 

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>

    function popuniProizvode() {

        $.ajax({
            url: 'popuniProizvode.php',
            success: function (data) {
            $("#proizvod").html(data);
            }
        });
    }

    popuniProizvode();

    </script>
</body>

</html>