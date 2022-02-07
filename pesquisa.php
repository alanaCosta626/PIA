<?php


require_once 'conexao.php';

$conexao = novaConexao();

$pesquisar = $_POST['pesquisar'];

$sql = "SELECT * FROM bancoteste where nome LIKE '%$pesquisar%' ORDER BY nome ASC";
$con = $conexao->query($sql) or die($conexao->error);
$linha = $con->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recurso/estiloPesquisa.css">
    <title>Pesquisar Paciente</title>
</head>

<body>
    <script>
        function funcaoDeletar() {
            var x;
            var r = confirm("Deletar o paciente fará com que todos os dados sejam perdidos. Tem certeza que quer deletar?");
            if (r == true) {
                x = "você pressionou OK!";
            } else {
                x = "Você pressionou Cancelar!";
            }
            document.getElementById("demo").innerHTML = x;
        }
    </script>
    <br>
    <a href="pesquisarPaciente.php">
        <div class="noprint">
            <img src="_img/135dc4eb6a3f1988e7dc4480e531b72e.png" id="voltar">
        </div>
    </a>
    <div id="interface">
        <h1>Pesquisa do paciente: </h1>
        <br>
        <table width="1500" border="1">
            <tr>
                <td width="500">Nome</td>
                <td width="200">Data de nascimento</td>
                <td width="200">CPF</td>
                <td width="400">Endereço</td>
                <td width="300">Município - UF</td>
            </tr>
            <?php
            do {
            ?>
                <tr>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($linha['dataNascimento'])) ?></td>
                    <td><?php echo $linha['cpf']; ?></td>
                    <td><?php echo $linha['endereco']; ?></td>
                    <td><?php echo $linha['municipio']; ?> - <?php echo $linha['uf'] ?></td>
                    <td width=300 align=center>
                        <a href="visualizar.php?visualizar= <?php echo $linha['id'] ?>">Visualizar</a> |
                        <input type="button" onclick="funcaoDeletar(<?php echo $linha['id'] ?>)" name="delete" value="Excluir">
                        <script language="javascript">
                            function funcaoDeletar(delid) {
                                if (confirm("Deletar fará com que todos os dados do paciente sejam deletados de forma permanente. Tem certeza que deseja Excluir?")) {
                                    window.location.href = 'deletar.php?deletar=' + delid + '';
                                    return true;
                                }
                            }
                        </script>
                    </td>
                </tr>

            <?php } while ($linha = $con->fetch_assoc());
            ?>
            </tabe>
    </div>

</body>

</html>