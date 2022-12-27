<?php

require "konekcija.php";
require "models/proizvod.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if(isset($_POST['obrisi'])){
    $proizvod = trim($_POST['proizvod']);

    if(Proizvod::obrisi($proizvod, $konekcija)){
        echo '<script type="text/javascript">
               window.onload = function () { alert("Odabrani proizvod je obrisan!"); } 
              </script>'; 
    }else{
        echo '<script type="text/javascript">
               window.onload = function () { alert("Brisanje nije uspešno!"); } 
              </script>'; 
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Obrisi proizvod</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
  
    <div class="container-xxl py-5">
        <div class="container">
            <br><br><br><br><br>
            <div class="row">
                <form method="post" action="" style="margin-top: 50px;" id="forma">

                    <label for="proizvod">Proizvod</label>
                    <select id="proizvod" name="proizvod" class="form-control" style="width: 400px;"></select>
                    <br>
                    
                    <button class="BtnForm" type="submit" name="obrisi" style="width: 300px;">Obriši</button>
                    <br><br>
                    <a href="index.php", class="BtnForm">Nazad</a>
                </form>
                <br>
            </div>
            <br/>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>

    function popuniProizvode() {

        $.ajax({/*
            url: 'popuniProizvode.php',
            success: function (data) {
            $("#proizvod").html(data);
            */}
        });
    }

    popuniProizvode();

    </script>


</body>

</html>