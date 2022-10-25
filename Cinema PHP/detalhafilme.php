<?php
include('conecta.php');
if (!isset($_GET['filme'])) {
    header('Location:index.php');
    exit();
}
$id = $_GET['filme'];
$sql = "SELECT * FROM tb_filme WHERE i_cod_filme = $id";
$result = mysqli_query($link, $sql);
while ($tbl = mysqli_fetch_array($result)) {
    $dura = $tbl[1];
    $nome = $tbl[2];
    $data = $tbl[3];
    $genero = $tbl[4];
    $diretor = $tbl[5];
    $lancado = $tbl[6];
    $desc = $tbl[7];
    $foto = $tbl[8];
}




?>



<!DOCTYPE html>
<html lang="pt-br">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
    <link href="principal.css" rel="stylesheet">
</head>



<body id="index">
    <div class="topnav">
        <a class="active" href="Index.php">Inicio</a>
         
        <a href="emCartaz.php">Em Cartaz</a>
        <?php
        if (!isset($_SESSION['id'])) {
        ?>
            <a id="cadastro_topnav" href="cadastro.php">Cadastro</a>
            <a id="login_topnav" href="login.php" class="active">Login</a>
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
    <table>
        <thead>
            <tr>
                <td rowspan="8"><img class="imagemFilme" src="Imagems/<?= $foto ?>" width="400px" height="300px"></td>

                <td colspan="3"><?= $desc ?></td>
            </tr>
            <tr>
                <td>Nome: <?= $nome ?></td>

            </tr>
            <tr>
                <td>Duração: <?= $dura ?> min</td>
            </tr>
            <tr>
                <td>Data de lançamento: <?= $data ?></td>
            </tr>
            <tr>
                <td>Gênero: <?= $genero ?></td>
            </tr>
            <tr>
                <td>Diretor: <?= $diretor ?></td>
            </tr>
            <tr>
                <td> <?= $lancado ?></td>
            </tr>

        </thead>
    </table>
</body>



</html>