<?php
include('conecta.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $snome = $_POST['sobrenome'];
    $cel = $_POST['celular'];

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT s_senha_cliente FROM tb_usuario WHERE i_cod_cliente = $id";
    $result = mysqli_query($link,$sql);
    while($tbl = mysqli_fetch_array($result)){
        $senha_original = $tbl[0];
    }
    if($senha_original!=$senha){
        $senha = $senha . "%gJ78#df67";
        $senha = md5($senha);
    }


  

    $nivel = $_POST['nivel'];
    $sql = "UPDATE tb_usuario SET s_nm_cliente = '$nome', s_snm_cliente = '$snome', i_tel_cliente = '$cel', 
        s_email_cliente = '$email', s_senha_cliente = '$senha', i_nivel_cliente = $nivel WHERE i_cod_cliente = $id";

    mysqli_query($link, $sql);
    header("Location: listacliente.php");
}
$cliente = $_GET['cliente'];
$sql = "SELECT * FROM tb_usuario WHERE i_cod_cliente = $cliente";
$result = mysqli_query($link, $sql);
while ($tbl = mysqli_fetch_array($result)) {
    $id = $tbl[0];
    $nome = $tbl[3];
    $snome = $tbl[4];
    $cel = $tbl[1];
    $email = $tbl[6];
    $senha = $tbl[5];
    $nivel = $tbl[2];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="principal.css" rel="stylesheet">
    <title>Alterar Cliente</title>
</head>

<body id="corpo">
    <div class="topnav">
        <a class="active" href="Index.php">Inicio</a>
        <a href="EmCartaz.php">Em Cartaz</a>
        <a href="emBreve.php">Em breve</a>
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
    <a href="listacliente.php"><button>Voltar</button></a>
    <div id="cadastro">
        <form action="alteracliente.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <h2>Cadastro do Cliente</h2>
            <p>
                <label>Nome:</label>
                <input type="text" name="nome" value="<?= $nome ?>" maxlength="15" placeholder="Digite o primeiro nome">
            </p>
            <p>
                <label>Sobrenome:</label>
                <input type="text" name="sobrenome" value="<?= $snome ?>" maxlength="40" placeholder="Digite o sobrenome">
            </p>
            <p>
                <label>Celular:</label>
                <input type="text" name="celular" value="<?= $cel ?>" maxlength="14" placeholder="(XX)XXXXX-XXXX">
            </p>
            <p>
                <label>E-mail:</label>
                <input type="email" name="email" value="<?= $email ?>" maxlength="30" require placeholder="Digite o Email">
            </p>
            <p>
                <label>Senha:</label>
                <input type="password" name="senha" value="<?= $senha ?>" maxlength="24" require placeholder="Digite a senha">
            </p>
            <P>
                <label>Nivel:</label>
                <select name="nivel">
                    <option value="0" <?= $nivel == 0 ? 'selected="selected"' : '' ?>>Usuario</option>
                    <option value="10" <?= $nivel == 10 ? 'selected="selected"' : '' ?>>Administrador</option>
                </select>
            </P>
            <input type="submit" id="envia" value="Salvar">
            <h3 id="msg_erro"></h3>
            <?php
            if (isset($_GET['msg_erro'])) echo ($_GET['msg_erro']);
            ?>
        </form>
    </div>
</body>

</html>