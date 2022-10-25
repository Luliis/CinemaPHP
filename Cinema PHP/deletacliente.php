<?php
include('conecta.php');
include('seguranca10.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $snome = $_POST['snome'];



    $sql = "DELETE FROM tb_usuario WHERE i_cod_cliente = $id";
    mysqli_query($link, $sql);
    header('Location: listacliente.php');
}

if (!isset($_GET['cliente'])) header("Location: listacliente.php");
$id = $_GET['cliente'];

$sql = "SELECT s_nm_cliente, s_snm_cliente 
    FROM tb_usuario WHERE i_cod_cliente = $id";
$response = mysqli_query($link, $sql);
while ($tbl = mysqli_fetch_array($response)) {
    $nome = $tbl[0];
    $snome = $tbl[1];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apaga Cliente</title>
    <link rel="stylesheet" href="principal.css">
</head>

<body>
    <div id="deleta">
        <h2><p>Excluir Cliente</p></h2>
        <form action="deletacliente.php" method="post">
            <h3><p>Deseja excluir o cliente <b><?= $nome ?> <?= $snome ?></b>?</p></h3>
            <h3 id="msg_erro">
                <?php
                if (isset($_GET['msg_erro'])) echo ($_GET['msg_erro']);
                ?>
            </h3>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="nome" value="<?= $nome ?>">
            <input type="hidden" name="snome" value="<?= $snome ?>">
            <input class="button_del" type="submit" value="Sim">
        </form>
        <a href="<?='listacliente.php?cliente=0' ?>"><button class="button_del">Não</button></a>
    </div>
</body>

</html>