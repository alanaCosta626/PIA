<?php

session_start();

if (!$_SESSION['adm_login']) {
    header('location: index.php');
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recurso/estiloPesqisarPaciente.css">

    <title>Pesquisar paciente</title>
</head>

<body>
    <br>
    <a href="home.php">
        <div class="noprint">
            <img src="_img/135dc4eb6a3f1988e7dc4480e531b72e.png" id="voltar">
        </div>
    </a>
    <div id="interface">
        <br>
        <h1>Pesquisar paciente</h1>
        <hr class="pt">
        <form method="POST" action="pesquisa.php">
            <h7>Digite o nome do paciente no campo abaixo:</h7>
            <br>
            <input type="text" name="pesquisar">
            <input type="submit" value="Pesquisar">

        </form>
    </div>
</body>

</html>