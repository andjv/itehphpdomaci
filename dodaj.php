<?php
require "konekcija.php";
require "models/proizvod.php";

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if(isset($_POST['dodaj'])){

    $naziv = trim($_POST['naziv']);
    $tipID = trim($_POST['tip']);
    $brendID = trim($_POST['brend']);
    $cena = trim($_POST['cena']);

    if(Proizvod::dodaj($naziv, $tipID, $brendID, $cena, $konekcija)){
        echo '<script type="text/javascript">
               window.onload = function () { alert("Novi proizvod je dodat u bazu!"); } 
              </script>'; 
    }else{
        echo '<script type="text/javascript">
               window.onload = function () { alert("Dodavanje nije uspešno!"); } 
              </script>'; 
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dodaj proizvod</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


    <div class="container-xxl py-5">
        <div class="container">
                <form method="post" action="" id="forma">

                    <label for="naziv">Naziv</label>
                    <input type="text" id="naziv" name="naziv" class="form-control" style="width: 400px;">

                    <label for="tip">Tip</label>
                    <select id="tip" name="tip" class="form-control" style="width: 400px;"></select>
                    
                    <label for="brend">Brend</label>
                    <select id="brend" name="brend" class="form-control" style="width: 400px;"></select>
                    
                    <label for="cena">Cena</label>
                    <input type="number" id="cena" name="cena" class="form-control" style="width: 400px;">

                    <br>
                    <button class="BtnForm" type="submit" name="dodaj" style="width: 300px;">Dodaj</button>
                    <br><br>
                    <a href="index.php", class="BtnForm">Nazad</a>


                </form>
            </div>
            <br/>
            <br/>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
     
        function popuniTipove() {

            $.ajax({
                url: 'popuniTipove.php',
                success: function (data) {
                   $("#tip").html(data);
                }
            });
        }
        popuniTipove();
        
        function popuniBrendove() {   
            $.ajax({
                url: 'popuniBrendove.php',
                success: function (data) {
                    $("#brend").html(data);
                }
            });
        }
        popuniBrendove();

        
    
    </script>
    

    

</body>

</html>