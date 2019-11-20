<?php
include_once 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/ajax.js"></script>
    <title>Alugar Carros</title>
    <?php
        $actual_link = "localhost/$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if(strpos($actual_link, '#') !== false){        
    ?>
        <style>
            body{
                background-image: url('img/carro2.jpg');
                background-repeat: no-repeat;
                background-size:cover;
            }
        </style>
    <?php
        }
    ?>
    <style>
         body img {
            margin: 0 auto;
            height: 50%;
            width: 50%;
        }
    </style>
</head>
<body>
<div>
    <center>
        <img src="img/inicial.jpg">
    </center>
</div>
</body>
</html>