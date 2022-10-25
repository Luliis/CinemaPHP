<?php
include('seguranca10.php');
include('conecta.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $termo = $_POST['termo'];
    $coluna = $_POST['coluna'];
    $sql = "SELECT * FROM tb_usuario WHERE $coluna LIKE '%$termo%'";
} else {
    $sql = "SELECT * FROM tb_usuario";
}

$result = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="principal.css" rel="stylesheet">
    <link rel="shortcut icon" href="Imagems/favicon.ico">
    <title>Lista Clientes</title>
</head>

<body>
    <div class="topnav">
        <a href="Index.php">Inicio</a>

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
            <a id="lista_topnav" class="active" href="listacliente.php">Lista Cliente</a>

        <?php
        }
        ?>
        <div id="busca">

            <form action="listacliente.php" method="post">
                <input type="submit" value="Pesquisar" class="button_pesquisa">

                <input type="text" name="termo" id="search_bar" placeholder="Digite o Nome">
                <button>
                    <a href="cadastro.php">    
                        Novo Cliente
                    </a>
                </button>
                <select name="coluna" id="tbusca" onchange="muda()">
                    <option value="s_nm_cliente">Nome</option>
                    <option value="s_snm_cliente">Sobrenome</option>
                    <option value="i_tel_cliente">Telefone</option>
                    <option value="s_email_cliente">E-mail</option>
                </select>

            </form>
        </div>


        <div id="lista">
            <table class="table table-dark table-striped">
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Nível</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                while ($tbl = mysqli_fetch_array($result)) {
                    echo ("<tr>");
                    echo ("<td>" . $tbl[3] . " " . $tbl[4] . "</td>");
                    echo ("<td>" . $tbl[1] . "</td>");
                    echo ("<td>" . $tbl[6] . "</td>");
                    echo ($tbl[2] == 10 ? "<td>Administrador</td>" : "<td>Usuário</td>");
                    echo ("<td><a href='alteracliente.php?cliente=" . $tbl[0] . "'><button class='button_ver1'>Alterar</button></a></td>");
                    echo ("<td><a href='deletacliente.php?cliente=" . $tbl[0] . "'><button class='button_ver1'>Excluir</button></a></td>");
                    echo ("</tr>");
                }
                ?>
            </table>
        </div>
</body>

</html>
<script>
    function muda() {
        e = document.getElementById("tbusca");
        var text = e.options[e.selectedIndex].text;
        document.getElementById("txtb").placeholder = "Digite o " + text;
    }
</script>