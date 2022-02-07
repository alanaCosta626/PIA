<?php



session_start();

if (!$_SESSION['adm_login']) {
  header('location: index.php');
}

    $dataAcolhimento = $_POST['dataAcolhimento'];
    $dataSaida = $_POST['dataSaida'];
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $nomeMae = $_POST['nomeMae'];
    $nomePai = $_POST['nomePai'];
    $cpf = $_POST['cpf'];
    $tituloEleitor = $_POST['tituloEleitor'];
    $uf = $_POST['uf'];
    $orgaoEmissor = $_POST['orgaoEmissor'];
    $carteiraTrabalho = $_POST['carteiraTrabalho'];
    $naturalidade = $_POST['naturalidade'];
    $religiao = $_POST['religiao'];
    $estadoCivil = $_POST['civil'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $municipio = $_POST['municipio'];
    $cep = $_POST['cep'];
    $situacaoMoradia = $_POST['situacaoMoradia'];
    $rendaPropria = $_POST['rendaPropria'];
    $profissao = $_POST['profissao'];
    $vinculoEmpregaticio = $_POST['vinculoEmpregaticio'];
    $filhos = $_POST['filhos'];
    $grauEscolaridade = $_POST['grauEscolaridade'];
    $responsavelAcolhido =$_POST['responsavelAcolhido'];
    $contatoRede = $_POST['contatoRede'];
    $contatos = $_POST['contatos'];
    $drogasUsadas = $_POST['drogasUsadas'];
    $fumante = $_POST['fumante'];
    $drogaLicita = $_POST['drogaLicita'];
    $drogaIlicita = $_POST['drogaIlicita'];

    require_once 'conexao.php';

    $conexao = novaConexao();

    $sql = "INSERT INTO bancoteste(dataAcolhimento, dataSaida, nome, dataNascimento, nomeMae, nomePai, cpf, tituloEleitor, uf, orgaoEmissor, carteiraTrabalho, naturalidade, religiao, estadoCivil, endereco,bairro, municipio, cep,situacaoMoradia, rendaPropria, profissao, vinculoEmpregaticio, filhos, grauEscolaridade, responsavelAcolhido, contatoRede, contatos, drogasUsadas, fumante, drogaLicita, drogaIlicita) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssssssssssssss",
    $dataAcolhimento, $dataSaida, $nome, $dataNascimento, $nomeMae, $nomePai, $cpf, $tituloEleitor, $uf, $orgaoEmissor, $carteiraTrabalho, $naturalidade, $religiao, $estadoCivil, $endereco, $bairro, $municipio, $cep, $situacaoMoradia ,$rendaPropria, $profissao, $vinculoEmpregaticio,$filhos, $grauEscolaridade, $responsavelAcolhido, $contatoRede, $contatos, $drogasUsadas, $fumante, $drogaLicita, $drogaIlicita);

    if ($stmt->execute()){
        $resultado = "OK!";
    }else{
        $resultado = $stmt->error;
    }

    header("location: home.php");
