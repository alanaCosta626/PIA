<?php



include 'conexao.php';

$conexao = novaConexao();

if (@$_GET['alterar']) {
    $id = @$_GET['alterar'];
    $sql = "SELECT * FROM bancoteste where id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();
    $stmt->close();
}
$dataAcolhimento = @$_POST['dataAcolhimento'];
$dataSaida = @$_POST['dataSaida'];
$nome = @$_POST['nome'];
$dataNascimento = @$_POST['dataNascimento'];
$nomeMae = @$_POST['nomeMae'];
$nomePai = @$_POST['nomePai'];
$cpf = @$_POST['cpf'];
$tituloEleitor = @$_POST['tituloEleitor'];
$uf = @$_POST['uf'];
$orgaoEmissor = @$_POST['orgaoEmissor'];
$carteiraTrabalho = @$_POST['carteiraTrabalho'];
$naturalidade = @$_POST['naturalidade'];
$religiao = @$_POST['religiao'];
$estadoCivil = @$_POST['civil'];
$endereco = @$_POST['endereco'];
$bairro = @$_POST['bairro'];
$municipio = @$_POST['municipio'];
$cep = @$_POST['cep'];
$situacaoMoradia = @$_POST['situacaoMoradia'];
$rendaPropria = @$_POST['rendaPropria'];
$profissao = @$_POST['profissao'];
$vinculoEmpregaticio = @$_POST['vinculoEmpregaticio'];
$filhos = @$_POST['filhos'];
$grauEscolaridade = @$_POST['grauEscolaridade'];
$responsavelAcolhido = @$_POST['responsavelAcolhido'];
$contatoRede = @$_POST['contatoRede'];
$contatos = @$_POST['contatos'];
$drogasUsadas = @$_POST['drogasUsadas'];
$fumante = @$_POST['fumante'];
$drogaLicita = @$_POST['drogaLicita'];
$drogaIlicita = @$_POST['drogaIlicita'];
$id = @$_POST['id'];


if (@$_POST['id']) {
    $sql = "UPDATE bancoteste set dataAcolhimento = ?, dataSaida = ?, nome = ?, dataNascimento = ?, nomeMae = ?, nomePai = ?,cpf = ?, tituloEleitor = ?, uf = ?, orgaoEmissor = ?, carteiraTrabalho = ?, naturalidade = ?, religiao = ?, estadoCivil = ?, endereco = ?, bairro = ?, municipio = ?, cep = ?, situacaoMoradia = ?, rendaPropria = ?, profissao = ?, vinculoEmpregaticio = ?,filhos = ?, grauEscolaridade = ?, responsavelAcolhido = ?, contatoRede = ?, contatos = ?, drogasUsadas = ?,fumante = ?, drogaLicita = ?, drogaIlicita = ? where id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssssssssssssssi", $dataAcolhimento, $dataSaida, $nome, $dataNascimento, $nomeMae, $nomePai, $cpf, $tituloEleitor, $uf, $orgaoEmissor, $carteiraTrabalho, $naturalidade, $religiao, $estadoCivil, $endereco, $bairro, $municipio, $cep, $situacaoMoradia, $rendaPropria, $profissao, $vinculoEmpregaticio, $filhos, $grauEscolaridade, $responsavelAcolhido, $contatoRede, $contatos, $drogasUsadas, $fumante, $drogaLicita, $drogaIlicita, $id);

    if ($stmt->execute()) {
        $resultado = "OK!";
    } else {
        $resultado = $stmt->error;
    }

    header('location: visualizar.php?visualizar=' . $id);
}

?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recurso/estiloCadastro2.css">
    <title>Cadastro</title>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</head>

<body>
    <a href="visualizar.php?visualizar= <?php echo $dados['id'] ?>">
        <div class="noprint">
            <img src="_img/135dc4eb6a3f1988e7dc4480e531b72e.png" id="voltar">
        </div>
    </a>
    <div id="interface_cadastro">
        <br>
        <div id="interface">
            <h1>Alterar dados do Paciente <?= $dados['nome']; ?></h1>
            <form method="POST" action="#">
                <div class="row"></div>
                <div id="dadosPessoais">
                    <h2>Dados pessoais</h2>
                    <fieldset>
                        <div class="half-box">

                            <p>
                                <input type="hidden" name="id" value="<?= @$_GET['alterar']; ?>">
                            </p>
                            <div class="full-box">
                                <div class="half-box">
                                    <p>
                                        <label for="dataAcolhimento">Data de acolhimento</label>
                                        <input type="date" required name="dataAcolhimento" value="<?= $dados['dataAcolhimento']; ?>">
                                    </p>
                                    <p>
                                        <label for="dataSaida">Saída do acolhido</label>
                                        <input type="date" name="dataSaida" value="<?= $dados['dataSaida']; ?>">
                                    </p>
                                </div>
                            </div>
                            <p>
                                <label for="nome">Nome Completo:</label>
                                <input type="text" required name="nome" value="<?= $dados['nome']; ?>">
                            </p>
                            <p>
                                <label for="dataNascimento">Data de nascimento:</label>
                                <input type="date" required name="dataNascimento" value="<?= $dados['dataNascimento']; ?>">
                            </p>
                            <p>
                                <label for="nomeMae">Nome da mãe:</label>
                                <input type="text" name="nomeMae" value="<?= $dados['nomeMae']; ?>">
                            </p>
                            <p>
                                <label for="nomePai">Nome do pai:</label>
                                <input type="text" name="nomePai" value="<?= $dados['nomePai']; ?>">
                            </p>
                            <p>
                                <script>
                                    function mascaracpf(i) {

                                        var v = i.value;

                                        if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
                                            i.value = v.substring(0, v.length - 1);
                                            return;
                                        }

                                        i.setAttribute("maxlength", "14");
                                        if (v.length == 3 || v.length == 7) i.value += ".";
                                        if (v.length == 11) i.value += "-";

                                    }
                                </script>
                                <label for="cpf">CPF:</label>
                                <input type="text" required name="cpf" oninput="mascaracpf(this)" value="<?= $dados['cpf']; ?>">
                            <p>
                                <script>
                                    function mascaraTE(i) {

                                        var v = i.value;

                                        if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
                                            i.value = v.substring(0, v.length - 1);
                                            return;
                                        }

                                        i.setAttribute("maxlength", "14");
                                        if (v.length == 4 || v.length == 9) i.value += " ";
                                    }
                                </script>
                                <label>Título de eleitor:</label>
                                <input type="text" required maxlength="14" oninput="mascaraTE(this)" name="tituloEleitor" value="<?= $dados['tituloEleitor']; ?>">
                            </p>
                            <p>
                                <label for="uf">UF:</label>
                                <select name="uf" required id="uf" value="<?= $dados['uf']; ?>">
                                    <option value="">Selecione</option>
                                    <option value="AC" <?= ($dados['uf'] == 'AC') ? 'selected' : '' ?>>AC</option>
                                    <option value="AL" <?= ($dados['uf'] == 'AL') ? 'selected' : '' ?>>AL</option>
                                    <option value="AP" <?= ($dados['uf'] == 'AP') ? 'selected' : '' ?>>AP</option>
                                    <option value="AM" <?= ($dados['uf'] == 'AM') ? 'selected' : '' ?>>AM</option>
                                    <option value="BA" <?= ($dados['uf'] == 'BA') ? 'selected' : '' ?>>BA</option>
                                    <option value="CE" <?= ($dados['uf'] == 'CE') ? 'selected' : '' ?>>CE</option>
                                    <option value="DF" <?= ($dados['uf'] == 'DF') ? 'selected' : '' ?>>DF</option>
                                    <option value="ES" <?= ($dados['uf'] == 'ES') ? 'selected' : '' ?>>ES</option>
                                    <option value="GO" <?= ($dados['uf'] == 'GO') ? 'selected' : '' ?>>GO</option>
                                    <option value="MA" <?= ($dados['uf'] == 'MA') ? 'selected' : '' ?>>MA</option>
                                    <option value="MT" <?= ($dados['uf'] == 'MT') ? 'selected' : '' ?>>MT</option>
                                    <option value="MS" <?= ($dados['uf'] == 'MS') ? 'selected' : '' ?>>MS</option>
                                    <option value="MG" <?= ($dados['uf'] == 'MG') ? 'selected' : '' ?>>MG</option>
                                    <option value="PA" <?= ($dados['uf'] == 'PA') ? 'selected' : '' ?>>PA</option>
                                    <option value="PB" <?= ($dados['uf'] == 'PB') ? 'selected' : '' ?>>PB</option>
                                    <option value="PR" <?= ($dados['uf'] == 'PR') ? 'selected' : '' ?>>PR</option>
                                    <option value="PE" <?= ($dados['uf'] == 'PE') ? 'selected' : '' ?>>PE</option>
                                    <option value="PI" <?= ($dados['uf'] == 'PI') ? 'selected' : '' ?>>PI</option>
                                    <option value="RJ" <?= ($dados['uf'] == 'RJ') ? 'selected' : '' ?>>RJ</option>
                                    <option value="RN" <?= ($dados['uf'] == 'RN') ? 'selected' : '' ?>>RN</option>
                                    <option value="RS" <?= ($dados['uf'] == 'RS') ? 'selected' : '' ?>>RS</option>
                                    <option value="RO" <?= ($dados['uf'] == 'RO') ? 'selected' : '' ?>>RO</option>
                                    <option value="RR" <?= ($dados['uf'] == 'RR') ? 'selected' : '' ?>>RR</option>
                                    <option value="SC" <?= ($dados['uf'] == 'SC') ? 'selected' : '' ?>>SC</option>
                                    <option value="SP" <?= ($dados['uf'] == 'SP') ? 'selected' : '' ?>>SP</option>
                                    <option value="SE" <?= ($dados['uf'] == 'SE') ? 'selected' : '' ?>>SE</option>
                                    <option value="TO" <?= ($dados['uf'] == 'TO') ? 'selected' : '' ?>>TO</option>
                                </select>
                            </p>
                            <p>
                                <label for="orgaoEmissor">Órgão emissor: </label>
                                <input type="text" name="orgaoEmissor" value="<?= $dados['orgaoEmissor']; ?>">
                            </p>
                            <p>
                                <script>
                                    function mascaraCT(i) {

                                        var v = i.value;

                                        if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
                                            i.value = v.substring(0, v.length - 1);
                                            return;
                                        }
                                    }
                                </script>
                                <label for="carteiraTrabalho">Carteira de trabalho:</label>
                                <input type="text" maxlength="8" name="carteiraTrabalho" oninput="mascaraCT(this)" value="<?= $dados['carteiraTrabalho']; ?>">
                            </p>
                            <p>
                                <label for="naturalidade">Naturalidade:</label>
                                <input type="text" required name="naturalidade" value="<?= $dados['naturalidade']; ?>">
                            </p>
                            <p>
                                <label for="religiao">Religião:</label>
                                <input type="text" name="religiao" value="<?= $dados['religiao']; ?>">
                            </p>
                            <p>
                            <div id="estadoCivil">
                                <label for="civil">Estado Civil:</label>
                                <input type="radio" required name="civil" value="solteiro" <?= ($dados['estadoCivil'] == "solteiro") ? "checked" : null; ?> /> Solteiro
                                <input type="radio" name="civil" value="casado" <?= ($dados['estadoCivil'] == "casado") ? "checked" : null; ?> /> Casado
                                <input type="radio" name="civil" value="divorciado" <?= ($dados['estadoCivil'] == "divorciado") ? "checked" : null; ?> /> Divorciado
                                <input type="radio" name="civil" value="viúvo" <?= ($dados['estadoCivil'] == "viúvo") ? "checked" : null; ?> /> Viúvo
                            </div>
                            </p>
                        </div>
                    </fieldset>
                </div>
                <div id="enderecoPaciente">
                    <h2>Endereço do paciente</h2>
                    <fieldset>
                        <div class="half-box">
                            <p>
                                <label for="endereco">Endereço:</label>
                                <input type="text" required name="endereco" value="<?= $dados['endereco']; ?>">
                            </p>
                            <p>
                                <label for="bairro">Bairro:</label>
                                <input type="text" required name="bairro" value="<?= $dados['bairro']; ?>">
                            </p>
                            <p>
                                <label for="municipio">Município:</label>
                                <input type="text" required name="municipio" value="<?= $dados['municipio']; ?>">
                            </p>
                            <p>
                                <script>
                                    function mascaracep(i) {

                                        var v = i.value;

                                        if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
                                            i.value = v.substring(0, v.length - 1);
                                            return;
                                        }
                                        i.setAttribute("maxlength", "9");
                                        if (v.length == 5) i.value += "-";

                                    }
                                </script>
                                <label for="cep">CEP:</label>
                                <input type="text" required name="cep" oninput="mascaracep(this)" value="<?= $dados['cep']; ?>">
                            </p>
                            <div id="situacaoMoradia">
                                <label for="situacaoMoradia">Situação de moradia:</label>
                                <input type="radio" required name="situacaoMoradia" value="Com pais" <?= ($dados['situacaoMoradia'] == "Com pais") ? "checked" : null; ?> /> Com Pais
                                <input type="radio" name="situacaoMoradia" value="Casa própria" <?= ($dados['situacaoMoradia'] == "Casa própria") ? "checked" : null; ?> /> Casa Própria
                                <input type="radio" name="situacaoMoradia" value="Com parentes" <?= ($dados['situacaoMoradia'] == "Com parentes") ? "checked" : null; ?> /> Com parentes
                                <br>
                                <input type="radio" name="situacaoMoradia" value="Aluguel" <?= ($dados['situacaoMoradia'] == "Aluguel") ? "checked" : null; ?> /> Aluguel
                                <input type="radio" name="situacaoMoradia" value="Sem lugar fixo" <?= ($dados['situacaoMoradia'] == "Sem lugar fixo") ? "checked" : null; ?> /> Sem lugar fixo
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div id="informacoesAdicionais">
                    <h2>Informaões adicionais</h2>
                    <fieldset>
                        <div class="half-box">
                            <p>
                                <b>Possui renda própria:</b>
                                <input type="radio" required name="rendaPropria" value="possui renda própria" <?= ($dados['rendaPropria'] == "possui renda própria") ? "checked" : null; ?> /> Sim
                                <input type="radio" name="rendaPropria" value="Não possui renda Própria" <?= ($dados['rendaPropria'] == "Não possui renda Própria") ? "checked" : null; ?> /> Não
                            </p>
                            <p>
                                <label for="profissao">Profissão:</label>
                                <input type="text" name="profissao" value="<?= $dados['profissao']; ?>">
                            </p>
                            <p>
                                <b required>Com vínculo empregatício:</b>
                                <input type="radio" required name="vinculoEmpregaticio" value="Desempregado" <?= ($dados['vinculoEmpregaticio'] == "Desempregado") ? "checked" : null; ?> /> Desempregado
                                <input type="radio" name="vinculoEmpregaticio" value="Trabalhando" <?= ($dados['vinculoEmpregaticio'] == "Trabalhando") ? "checked" : null; ?> /> Trabalhando
                                <input type="radio" name="vinculoEmpregaticio" value="Aposentado" <?= ($dados['vinculoEmpregaticio'] == "Aposentado") ? "checked" : null; ?> /> Aposentado
                            </p>
                            <p>
                                <b>Possui filhos:</b>
                                <input type="radio" name="filhos" value="Possui filhos" <?= ($dados['filhos'] == "Possui filhos") ? "checked" : null; ?> /> Sim
                                <input type="radio" required name="filhos" value="Não possui filhos" <?= ($dados['filhos'] == "Não possui filhos") ? "checked" : null; ?> /> Não
                            </p>
                            <p>
                                <label for="grauEscolaridade">Grau de escolaridade:</label>
                                <select name="grauEscolaridade" required id="grauEscolaridade">
                                    <option value="">Selecione</option>
                                    <option value="Analfabeto" <?= ($dados['grauEscolaridade'] == 'Analfabeto') ? 'selected' : '' ?>>Analfabeto</option>
                                    <option value="Até o 5° ano incompleto" <?= ($dados['grauEscolaridade'] == 'Até o 5° ano incompleto') ? 'selected' : '' ?>>Até o 5° ano incompleto</option>
                                    <option value="6° ao 9° ano incompleto" <?= ($dados['grauEscolaridade'] == '6° ao 9° ano incompleto') ? 'selected' : '' ?>>6° ao 9° ano incompleto</option>
                                    <option value="Fundamental completo" <?= ($dados['grauEscolaridade'] == 'Fundamental completo') ? 'selected' : '' ?>>Fundamental completo</option>
                                    <option value="Médio incompleto" <?= ($dados['grauEscolaridade'] == 'Médio incompleto') ? 'selected' : '' ?>>Médio incompleto</option>
                                    <option value="Médio completo" <?= ($dados['grauEscolaridade'] == 'Médio completo') ? 'selected' : '' ?>>Médio completo</option>
                                    <option value="Superior incompleto" <?= ($dados['grauEscolaridade'] == 'Superior incompleto') ? 'selected' : '' ?>>Superior incompleto</option>
                                    <option value="Superior completo" <?= ($dados['grauEscolaridade'] == 'Superior completo') ? 'selected' : '' ?>>Superior completo</option>
                                    <option value="Mestrado" <?= ($dados['grauEscolaridade'] == 'Mestrado') ? 'selected' : '' ?>>Mestrado</option>
                                    <option value="Doutorado" <?= ($dados['grauEscolaridade'] == 'Doutorado') ? 'selected' : '' ?>>Doutorado</option>
                                    <option value="Ignorado" <?= ($dados['grauEscolaridade'] == 'Ignorado') ? 'selected' : '' ?>>Ignorado</option>
                                </select>
                            </p>
                            <p>
                                <label for="responsavelAcolhido">Responsável pelo acompanhamento do acolhido:</label>
                                <input type="text" name="responsavelAcolhido" required value="<?= $dados['responsavelAcolhido']; ?>">
                            </p>
                            <p>
                                <label for="contatoRede">Contatos com a rede:</label>
                                <input type="text" name="contatoRede" required value="<?= $dados['contatoRede']; ?>">
                            </p>
                            <p>
                                <b>Contatos:</b>
                                <input type="radio" required name="contatos" value="Telefonemas" <?= ($dados['contatos'] == "Telefonemas") ? "checked" : null; ?> />Telefonemas
                                <input type="radio" name="contatos" value="Visita ativa" <?= ($dados['contatos'] == "Visita ativa") ? "checked" : null; ?> />Visita Ativa
                                <input type="radio" name="contatos" value="Visita receptiva" <?= ($dados['contatos'] == "Visita receptiva") ? "checked" : null; ?> />Visitas receptivas
                            </p>
                        </div>
                    </fieldset>
                </div>
                <h2>Quadro Clínico</h2>
                <fieldset>
                    <div class="half-box">
                        <p>
                            <b>Uso de substância psicoativa:</b><br />
                            <TEXTAREA name="drogasUsadas" required ROWS="7" COLS="50"><?= $dados['drogasUsadas']; ?></TEXTAREA>
                        </p>
                        <p>
                            <b>Fumante:</b>
                            <input type="radio" required name="fumante" value="Fumante" <?= ($dados['fumante'] == "Fumante") ? "checked" : null; ?> /> Sim
                            <input type="radio" name="fumante" value="Não fumante" <?= ($dados['fumante'] == "Não fumante") ? "checked" : null; ?> /> Não
                        </p>
                        <p>
                            <b>Idade do primeiro uso da droga:</b><br />
                            <script>
                                function mascaraIdadeDroga(i) {

                                    var v = i.value;

                                    if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
                                        i.value = v.substring(0, v.length - 1);
                                        return;
                                    }
                                }
                            </script>
                            <label for="drogaLicita">Lícita:</label>
                            <input type="text" required oninput="mascaraIdadeDroga(this)" name='drogaLicita' value="<?= $dados['drogaLicita']; ?>">
                            <label for="drogaIlicita">Ilícita</label>
                            <input type="text" required oninput="mascaraIdadeDroga(this)" name="drogaIlicita" value="<?= $dados['drogaIlicita']; ?>">
                        </p>
                    </div>
                </fieldset>
                <input value="Atualizar" name="atualizar" type="submit">
            </form>
        </div>
    </div>
</body>

</html>