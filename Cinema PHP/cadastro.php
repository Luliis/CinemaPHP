<?php
session_start();
include('conecta.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $erro = false;
    $nome = $_POST['nome'];
    $snm = $_POST['snome'];
    $cel = $_POST['tel'];
    $cel = substr_replace($cel, '-', 7, 0);
    $cel = substr_replace($cel, ')', 2, 0);
    $cel = substr_replace($cel, '(', 0, 0);
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha = $senha . "%gJ78#df67"; 
    $senha = md5($senha);

    $nivel = 0;


    $sql = "SELECT COUNT(i_cod_cliente) FROM tb_usuario
     WHERE s_email_cliente = '$email'";
    $result = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($result)) {
        $total = $tbl[0];
    }
    if ($total != 0) {
        header('Location: cadastro.php?msg_erro=Email já cadastrado');
        exit();
    }



    $sql = "INSERT INTO tb_usuario (s_nm_cliente, s_snm_cliente,
     i_tel_cliente, s_email_cliente, s_senha_cliente, i_nivel_cliente)
     VALUES ('$nome', '$snm', '$cel', '$email', '$senha', $nivel)";

    if (!$erro) {
        mysqli_query($link, $sql);
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="principal.css" rel="stylesheet">
    <title>Inicio</title>
</head>

<body>
    <div class="topnav">
        <a href="Index.php">Inicio</a>
         
        <a href="emCartaz.php">Em Cartaz</a>
        <?php
        if (!isset($_SESSION['id'])) {
        ?>
        <a id="cadastro_topnav" href="cadastro.php" class="active">Cadastro</a>
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

    <!-- *******************CADASTRO****************** -->

    <form method="POST" action="cadastro.php">
        <div id="login">
            <p>
                <label class="login1">Nome:</label>
                <input type="text" name="nome">
            </p>
            <p>
                <label class="login1">Sobrenome:</label>
                <input type="text" name="snome">
            </p>
            <p>
                <label class="login1">Telefone:</label>
                <input type="text" name="tel">
            </p>
            <p>
                <label class="login1">Email:</label>
                <input type="email" name="email">
            </p>
            <p>
                <label class="login1">Senha:</label>
                <input type="password"  name="senha">
            </p>
            <input class="button" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
        </div>





</body>



</html>