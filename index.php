<?php

session_start();


$login = @$_POST['adm_login'];
$senha = @$_POST['senha_login'];


if (@$_POST['adm_login']){

    require_once "conexao.php";

    $conexao = novaConexao();
    $sql = "SELECT * FROM login_adm where adm_login = ? and senha_login = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss",$login, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows >0){

        $dados = $resultado->fetch_assoc();
        $_SESSION["adm_login"] = $dados['adm_login'];
        $_SESSION["id"] = $dados['id'];

        header ('location: home.php');
    }else{
        echo "Login ou senha inválidos";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIA - Plano Individual de Atendimento</title>
    <link rel="stylesheet" href="recurso/estiloIndex.css">
</head>
<style>
    
</style>
<body>
    <div id="interface">
        <div id="titulo">
            <img class="displayed" src="_img/logo_cruz_azul_panambi.png">
            <h1>P I A</h1>
            <hr class="pt">
            <h2>Plano individual de atendimento</h2>
        </div>
        <div id="login">
            <form action="#" method="post">
                <p>
                    <label for="adm_login">Login:</label>
                    <input id="adm" name="adm_login" type="text">
                </p>
                <p>
                    <label for="senha_login">Senha:</label>
                    <input id="senha" name="senha_login" type="password">
                </p>
                <p>
                    <input type="submit" value="entrar"/>
                </p>
            </form>
        </div>
    </div>
    
</body>
</html>