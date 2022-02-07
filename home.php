<?php

session_start();

if(!$_SESSION['adm_login']) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recurso/estiloHome.css">
    <title>Início</title>
</head>

<body>
    <div id="botoesHome">
        <p>
            <a href="cadastro.php">Cadastrar paciente</a>
        </p>
        <p>
            <a href="pesquisarPaciente.php">Consultar paciente</a>
        </p>
        <p>
            <a href="estatistica.php">Estatísticas</a>
        </p>
        <p>
            <a href="sair.php">Sair</a>
        </p>
    </div>
     
    
</body>
</html>