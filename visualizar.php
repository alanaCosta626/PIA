<?php

include 'conexao.php';



$conexao = novaConexao();


if (@$_GET['visualizar']) {
    $id = @$_GET['visualizar'];
    $sql = "SELECT * FROM bancoteste where id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();
    $stmt->close();
}

function idade($data_nascimento)
{
    date_default_timezone_set('America/Sao_Paulo');
    $dn = new DateTime($data_nascimento);
    $data_atual = new DateTime();

    $idade = $data_atual->diff($dn);
    return $idade->y;
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recurso/estiloVisualizar.css">
    <title>Ficha do paciente</title>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>

<body>
    <a href="pesquisarPaciente.php">
        <div class="noprint">
            <img src="_img/135dc4eb6a3f1988e7dc4480e531b72e.png" id="voltar">
        </div>
    </a>
    <div id="interface">
        <div id="titulo">
            <img class="displayed" src="_img/logo_cruz_azul_panambi.png">
            <fieldset>
                <h1 style="color: blue; font-size: 50px; text-align: center;">P I A</h1>
                <h1 style="margin: 5px">Plano Individual de Atendimento</h1>
            </fieldset>
        </div>
        <div id="dadosPessoais">
            <h2>Dados pessoais</h2>
            <fieldset>
                <div class="half-box">
                    <p>
                    <h3>Data de acolhimento: <?php echo date('d/m/Y', strtotime($dados['dataAcolhimento'])) ?></h3>
                    </p>
                    <?php if ($dados['dataSaida'] > 0) {
                    ?><p>
                        <h3>Sa??da do acolhido: <?php echo date('d/m/Y', strtotime($dados['dataSaida'])) ?></h3>
                        </p>
                    <?php } ?>
                    <div class="full-box">
                        <p>
                        <H3>Nome do paciente: <?php echo $dados['nome']; ?> </H3>
                        </p>
                        <p>
                        <H3>Data de nascimento: <?php echo date('d/m/Y', strtotime($dados['dataNascimento'])) ?> | Idade atual: <?php echo idade($dados['dataNascimento']); ?> Anos</H3>
                        </p>
                        <p>
                        <H3>Nome da M??e: <?php echo $dados['nomeMae']; ?></H3>
                        </p>
                        <p>
                        <H3>Nome do Pai: <?php echo $dados['nomePai']; ?></H3>
                        </p>
                    </div>
                    <p>
                    <H3>??? CPF: <?php echo $dados['cpf']; ?></H3>
                    </p>
                    <p>
                    <H3>??? T??tulo de Eleitor: <?php echo $dados['tituloEleitor']; ?></H3>
                    </p>
                    <p>
                    <H3>??? UF: <?php echo $dados['uf']; ?></h3>
                    </p>
                    <p>
                    <H3>??? ??rg??o emissor: <?php echo $dados['orgaoEmissor']; ?></H3>

                    </p>
                    <p>
                    <H3>??? Carteira de trabalho: <?php echo $dados['carteiraTrabalho']; ?></h3>
                    </p>
                    <p>
                    <H3>??? Naturalidade: <?php echo $dados['naturalidade']; ?></h3>
                    </p>
                    <p>
                    <H3>??? Religi??o: <?php echo $dados['religiao']; ?></h3>
                    </p>
                    <p>
                    <H3>??? Estado civil: <?php echo $dados['estadoCivil']; ?></h3>
                    </p>
                </div>
            </fieldset>
        </div>
        <div id="enderecoPaciente">
            <h2>Endere??o do paciente</h2>
            <fieldset>
                <div class="half-box">
                    <H3>??? Endere??o: <?php echo $dados['endereco']; ?>;</h3>
                    <p>
                    <H3>??? Bairro: <?php echo $dados['bairro']; ?>; </h3>
                    </p>
                    <p>
                    <H3>??? Munic??pio: <?php echo $dados['municipio']; ?>; </h3>
                    </p>
                    <p>
                    <H3>??? CEP: <?php echo $dados['cep']; ?>;</h3>
                    </p>
                    <p>
                    <h3>??? Situa????o de moradia: <?php echo $dados['situacaoMoradia']; ?></h3>
                    </p>
                </div>
            </fieldset>
        </div>
        <div id="informacoesAdicionais">
            <h2>Informa??es adicionais</h2>
            <fieldset>
                <div class="half-box">
                    <H3>??? <?php echo $dados['rendaPropria']; ?></h3>
                    <p>
                    <H3>??? Profiss??o: <?php echo $dados['profissao']; ?></h3>
                    </p>
                    <p>
                    <H3>??? Vinculo empregat??cio: <?php echo $dados['vinculoEmpregaticio']; ?></h3>
                    </p>
                    <p>
                    <h3>??? <?php echo $dados['filhos']; ?></h3>
                    </p>
                    <p>
                    <H3>??? Grau de escolaridade: <?php echo $dados['grauEscolaridade']; ?></h3>
                    </p>
                    <p>
                    <H3>??? Respons??vel pelo acolhido: <?php echo $dados['responsavelAcolhido']; ?></h3>
                    </p>
                    <p>
                    <H3>??? Contato com a rede: <?php echo $dados['contatoRede']; ?></h3>
                    </p>
                    <p>
                    <H3>??? Meios de contato: <?php echo $dados['contatos']; ?></h3>
                    </p>
                </div>
            </fieldset>
        </div>
        <div id="quadrocl??nico">
            <h2>Quadro Cl??nico</h2>
            <div class="half-box">
                <fieldset>
                    <div class="half-box">
                        <H3>Uso de subst??ncias psicoativas: <?php echo $dados['drogasUsadas']; ?></h3>
                        <p>
                        <h3>??? <?php echo $dados['fumante']; ?></h3>
                        </p>
                        <p>
                        <h3 style="width: 275px;">??? Idade do primeiro uso da droga: </h3>
                        <h3>L??cita: <?php echo $dados['drogaLicita']; ?></h3>
                        <h3>Il??cita: <?php echo $dados['drogaIlicita']; ?></h3>
                        </p>
                    </div>
            </div>
        </div>
        </fieldset>
        <div id="assinaturas">
            <h3>Estou de acordo com as regras da institui????o e com o car??ter volunt??rio do acolhimento.</h3>
            <div class="half-box">
                <h3>Assinatura do acolhido</h3>
                <h3>Assinatura de familiar/respons??vel</h>
            </div>
        </div>
    </div>
    <div class="noprint">
        <div id="interfaceBotao">
            <div id="botoes" class="pagebreak">
                <a href='alterarDados.php?alterar=<?php echo $dados['id'] ?>'>Alterar dados</a>
            </div>
        </div>
    </div>


</body>

</html>