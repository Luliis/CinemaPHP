<?php
if (session_start()) session_destroy();
include('conecta.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha = $senha . "%gJ78#df67";
    $senha = md5($senha);

    $sql = "SELECT COUNT(i_cod_cliente) FROM tb_usuario WHERE s_email_cliente = '$email' 
    AND s_senha_cliente = '$senha'";
    echo($sql);
    $result = mysqli_query($link, $sql);
    while ($tbl = mysqli_fetch_array($result)) {
        $total = $tbl[0];
    }
    if ($total == 0) {
       header('Location: login.php?msg_erro=Usuário ou senha inválido.');
        exit();
    } else {
        $sql = "SELECT i_cod_cliente, s_nm_cliente, s_snm_cliente, i_nivel_cliente
         FROM tb_usuario WHERE s_email_cliente = '$email' AND 
         s_senha_cliente = '$senha'";
        $result = mysqli_query($link, $sql);
        while ($tbl = mysqli_fetch_array($result)) {
            $id = $tbl[0];
            $nome = $tbl[1];
            $snome = $tbl[2];
            $nivel = $tbl[3];
        }
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['snome'] = $snome;
        $_SESSION['nivel'] = $nivel;
        header('Location: index.php');
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
    <title>Login</title>
</head>



<body>
    <div class="topnav" onload="limpa()">
        <a href="Index.php">Inicio</a>
        <a href="EmCartaz.php">Em Cartaz</a>
        <?php
        if (!isset($_SESSION['id'])) {
        ?>
            <a id="cadastro_topnav" href="cadastro.php">Cadastro</a>
            <a id="login_topnav" href="login.php" class="active">Login</a>
        <?php
        }
        ?>
    </div>
    <img class="navbarimg" width="150px" height="150px" src="Imagems/CineFUN-removebg-preview.png">
    <div class="container">

        <!-- *********************** LOGIN ******************************-->
        <div id="login">
            <form action="login.php" method="post" autocomplete="on">


                <h2 id="tittle">Faça seu Login.</h2>
                <br>
                <p>
                    <label class="login">Email:</label>
                    <input type="email" autocomplete="off" value="" name="email" required>
                </p>
                <p>
                    <label class="login1">Senha:</label>
                    <input type="password" autocomplete="off" name="senha" required>
                </p>
                <h3 id="msg_erro">
                    <?php
                    if (isset($_GET['msg_erro'])) echo ($_GET['msg_erro']);
                    ?>
                </h3>
                <p>
                    <input class="button" type="submit" value="Entrar">
                </p>
            </form>
        </div>
</body>