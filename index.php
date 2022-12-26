
<?php

$username="";

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_COOKIE["korisnik"])){
    $username=$_COOKIE["korisnik"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Beauty store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top py-lg-0 px-lg-5">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav p-lg-0">
                <a href="index.php" class="nav-item nav-link">Početna</a>
                <a href="dodaj.php" class="nav-item nav-link">Dodaj proizvod</a>
                <a href="izmeni.php" class="nav-item nav-link">Izmeni proizvod</a>
                <a href="obrisi.php" class="nav-item nav-link">Obrisi proizvod</a>
            </div>
        </div>  
        <label class="nav-item nav-link" style="color: white !important;"><?= $username;?></label>
    </nav>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row" id="rowc">
                <center>
                <div class="col-md-4">
                    <label for="tip">Tip</label>
                    <select class="form-control" id="tip" style="width: 400px">
                        <option value="SVE">Sve</option>
                        <option value="1">Nega lica</option>
                        <option value="2">Nega tela</option>
                        <option value="3">Nega kose</option>
                    </select>
                </div>
                <br>
                <div class="col-md-4">
                    <label for="cena">Cena</label>
                    <select class="form-control" id="cena" style="width: 400px">
                        <option value="asc">Od najmanje ka najvećoj</option>
                        <option value="desc">Od najveće ka najmanjoj</option>
                    </select>
                </div>
                <br>
                <div class="col-md-4">
                    <button class="BtnFormP" onclick="pretrazi()">Pretrazi</button>
                </div>
                </center>
            </div>
        </div>
        <br/>
        <br/>
        </div>
            <center>
            <div class="col" id="proizvodi" ></div>
            </center>
        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script>

        function sredi() {
            let tip = "SVE";
            let cena = "asc";
            $.ajax({
                url: 'tabela.php',
                data: {
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#proizvodi").html(data);
                }
            });
        }
        sredi();
    
        function pretrazi() {
            let tip = $("#tip").val();
            let cena = $("#cena").val();
            $.ajax({
                url: 'tabela.php',
                data: {
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#proizvodi").html(data);
                }
            });
        }
        

    </script>

</body>

</html>