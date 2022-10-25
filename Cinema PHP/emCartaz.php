<?php
session_start();
include('conecta.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $termo = $_POST['termo'];
  $coluna = $_POST['coluna'];
  $sql = "SELECT * FROM tb_usuario WHERE $coluna LIKE '%$termo%'";
} else {
  $sql = "SELECT * FROM tb_usuario";
}
$sql = "SELECT * FROM tb_filme";
$result = mysqli_query($link, $sql);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="principal.css" rel="stylesheet">
  <link rel="shortcut icon" href="Imagems/favicon.ico"/>
  <title>Inicio</title>
  <style>
    td {
      color: white;
    }
  </style>
</head>

<body>
  <div class="topnav">

    <a href="Index.php">Inicio</a>

    <a class="active" href="EmCartaz.php">Em Cartaz</a>



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

  <?php
  while ($tbl = mysqli_fetch_array($result)) {
  ?>
    <table class="EmCartaz">

      <thead>
        <tr>
          <td rowspan="8"><img src="imagems/<?php echo ($tbl[8]) ?>" width="400px" height="300px"></td>
        </tr>
        <tr>
          <td>Filme: <?= $tbl[2] ?></td>
        </tr>
        <tr>
          <td>Duração: <?= $tbl[1] ?> min</td>
        </tr>
        <tr>
          <td>Data de lançamento: <?= $tbl[3] ?></td>
        </tr>
        <tr>
          <td>Gênero: <?= $tbl[4] ?></td>
        </tr>
        <tr>
          <td>Diretor: <?= $tbl[5] ?></td>
        </tr>
        <tr>
          <td><?= $tbl[6] ?></td>
        </tr>
        <tr>
          <td><a href="detalhafilme.php?filme=<?= $tbl[0] ?>"><button class="button_ver">Ver +</button></a></td>

        </tr>
      </thead>

    </table>
    <hr id="linha">


  <?php
  }
  ?>
</body>

</html>