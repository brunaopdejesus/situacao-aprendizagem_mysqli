<?php

session_start();

require("./database/conexao.php");

function realizarLogin($usuario, $senha, $conexao)
{

    $sql = "SELECT * FROM tbl_administrador
            WHERE usuario = '$usuario'";

    $resultado = mysqli_query($conexao, $sql);

    $dadosUsuario = mysqli_fetch_array($resultado);

    if (isset($dadosUsuario["usuario"]) && isset($dadosUsuario["senha"])) {

        $_SESSION["usuarioId"] = $dadosUsuario["idAdmin"];
        $_SESSION["usuarioNome"] = $dadosUsuario["usuario"];

        header("location: listagem/index.php");
    } else {

        header("location: login/index.php");
    }
}

switch ($_POST["acoes"]) {
    case 'login':

        $usuario = $_POST["txt_usuario"];
        $senha = $_POST["txt_senha"];

        // var_dump($_POST);
        realizarLogin($usuario, $senha, $conexao);

        break;

    case 'logout':
        // echo 'FAZENDO LOGOUT!';
        session_destroy();
        header("location: login/index.php");

    default:
        # code...
        break;
}