<?php
session_start();
$connect = mysqli_connect("localhost", "admin", "123", "bd_cinema");
function make_query($connect)
{
    $query = "SELECT * FROM banner ORDER BY banner_id ASC";
    $result = mysqli_query($connect, $query);
    return $result;
}

function make_slide_indicators($connect)
{
    $output = '';
    $count = 0;
    $result = make_query($connect);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '
            <li data-target="#dynamic_slide_show" data-slide-to="' . $count . '" class="active"></li>
            ';
        } else {
            $output .= '
            <li data-target="#dynamic_slide_show" data-slide-to="' . $count . '"></li>
            ';
        }
        $count = $count + 1;
    }
    return $output;
}

function make_slides($connect)
{
    $output = '';
    $count = 0;
    $result = make_query($connect);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '<div class="item active">';
        } else {
            $output .= '<div class="item"';
        }
        $output .= '
            <img src="banner/' . $row["banner_image"] . '" alt="'
            . $row["banner_title"] . '" />
            <div class="carousel-caption">
            <h3>' . $row["banner_title"] . '</h3>
            </div>
        </div>
            ';
        $count = $count + 1;
    }
    return $output;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="principal.css" rel="stylesheet">
    <title>Inicio</title>
    <link rel="shortcut icon" href="Imagems/favicon.ico">
    <style>
        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 1080px;
            height: 720px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="topnav">
        <a class="active" href="Index.php">Inicio</a>

        <a href="emCartaz.php">Em Cartaz</a>
        <?php
        if (!isset($_SESSION['id'])) {
        ?>
            <a id="cadastro_topnav" href="cadastro.php">Cadastro</a>
            <a id="login_topnav" href="login.php">Login</a>
        <?php
        } else {
        ?>
            <a id="logout_topnav" href="logout.php">Sair</a>
            <a id="lista_topnav" href="listacliente.php">Lista Cliente</a>

        <?php
        }
        ?>



    </div>
    <img class="navbarimg" width="150px" height="150px" src="Imagems/CineFUN-removebg-preview.png">
    <div class="container">
        <br />
    </div>










    <!-- ***************************************** CAROUSEL *****************************************-->


    <h1> FILMES EM DESTAQUES </h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>



            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <a href="detalhafilme.php?filme=1">
                        <img src="Imagems/Doutor-Estranho.png" width="720" height="720">
                    </a>

                    <div class="carousel-caption">
                        <h3>Doutor Estranho no Multiverso da Loucura</h3>
                    </div>
                </div>



                <div class="item">
                    <a href="detalhafilme.php?filme=7">
                        <img src="Imagems/JujutsuKaisen0.png" width="720" height="720">
                    </a>
                    <div class="carousel-caption">

                        <h3>Jujutsu Kaisen 0 </h3>
                    </div>
                </div>



                <div class="item">
                    <a href="detalhafilme.php?filme=3">
                        <img src="Imagems/Sonic-2.png" width="720" height="720">
                    </a>
                    <div class="carousel-caption">
                        <h3>Sonic 2 - O filme</h3>
                    </div>
                </div>



                <div class="item">
                    <a href="detalhafilme.php?filme=4">
                        <img src="Imagems/Animais-Fanasticos.png" alt="Flower">
                    </a>
                    <div class="carousel-caption">
                        <h3>Animais Fantásticos: Os Segredos de Dumbledore</h3>
                    </div>
                </div>
            </div>



            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
</body>



</html>