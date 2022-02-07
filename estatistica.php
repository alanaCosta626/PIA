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
  <link rel="stylesheet" href="recurso/estiloHomeEstatisticas.css">
  <title>Estatísticas de pacientes</title>
</head>
<body>
  <a href="home.php">
    <div class="noprint">
      <img src="../PIA/_img/135dc4eb6a3f1988e7dc4480e531b72e.png" id="voltar">
    </div>
  </a>
  <div id="botoesHome">
    <h1>Estatísticas de pacientes</h1>
    <p>
      <a href="estatisticas/graficoMunicipio.php">Procedência dos acolhidos</a>
    </p>
    <p>
      <a href="estatisticas/graficoIdade.php">Grafico de faixa etária</a>
    </p>
    <p>
      <a href="estatisticas/profissaoAcolhidos.php">Profissão dos acolhidos</a>
    </p>
    <p>
      <a href="estatisticas/situacaoProfissional.php">Situação Profissional</a>
    </p>
    <p>
      <a href="estatisticas/estadoCivil.php">Estado Civil</a>
    </p>
    <p>
      <a href="estatisticas/possuiFilhos.php">Possui filhos</a>
    </p>
    <p>
      <a href="estatisticas/grauInstrucao.php">Grau de instrução</a>
    </p>
    <p>
      <a href="estatisticas/situacaoMoradia.php">Situação de moradia</a>
    </p>
    <p>
      <a href="estatisticas/graficoFumantes.php">Dependência à cigarro</a>
    </p>
    <p>
      <a href="estatisticas/DrogasLicitasIlicitas.php">Drogas lícitas e ilícitas</a>
    </p>
    <p>
      <a href="estatisticas/graficoPrimeiroContatoDroga.php">Primeiro contato com Drogas</a>
    </p>
  </div>
</body>

</html>