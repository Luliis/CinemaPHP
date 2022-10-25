<?php
$servidor = "localhost";
$usuario = "admin";
$senha = "123";
$banco = "bd_cinema";

$link = mysqli_connect($servidor, $usuario, $senha, $banco)
    or die("Não foi possivel conectar:" . mysqli_error($link));
