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
    <link rel="stylesheet" href="recurso/estiloCadastro2.css">
    <title>Cadastro</title>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</head>

<body>
    <div id="interface_cadastro">
        <a href="home.php">
            <div class="noprint">
                <img src="_img/135dc4eb6a3f1988e7dc4480e531b72e.png" id="voltar">
            </div>
        </a>
        <br>
        <div id="interface">
            <h1>Formulário de cadastro</h1>
            <form method="POST" action="cadastra.php" id="register-form">
                <div id="dadosPessoais">
                    <h2>Dados pessoais</h2>
                    <fieldset>
                        <div class="half-box">
                            <div class="full-box">
                                <div class="half-box">
                                    <p>
                                        <label for="dataAcolhimento">Data de acolhimento</label>
                                        <input type="date" required name="dataAcolhimento">
                                    </p>
                                    <p>
                                        <label for="dataSaida">Saída do acolhido</label>
                                        <input type="date" name="dataSaida">
                                    </p>
                                </div>
                            </div>
                            <p>
                                <label for="nome">Nome Completo:</label>
                                <input type="text" required name="nome">
                            </p>
                            <p>
                                <label for="dataNascimento">Data de nascimento:</label>
                                <input type="date" required name="dataNascimento">
                            </p>
                            <p>
                                <label for="nomeMae">Nome da mãe:</label>
                                <input type="text" name="nomeMae">
                            </p>
                            <p>
                                <label for="nomePai">Nome do pai:</label>
                                <input type="text" name="nomePai">
                            </p>
                            <p>
                                <label for="cpf">CPF:</label>
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
                                <input type="text" required name="cpf" oninput="mascaracpf(this)" placeholder="Ex.: 000.000.000-00">
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
                                <input type="text" required maxlength="14" oninput="mascaraTE(this)" name="tituloEleitor">
                            </p>
                            <p>
                                <label for="uf">UF:</label>
                                <select name="uf" required id="uf">
                                    <option value="">Selecione</option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </select>
                            </p>
                            <p>
                                <label for="orgaoEmissor">Órgão emissor:</label>
                                <input type="text" required name="orgaoEmissor">
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
                                <input type="text" required maxlength="8" oninput="mascaraCT(this)" name="carteiraTrabalho">
                            </p>
                            <p>
                                <label for="naturalidade">Naturalidade:</label>
                                <input type="text" required name="naturalidade">
                            </p>
                            <p>
                                <label for="religiao">Religião:</label>
                                <input type="text" required name="religiao">
                            </p>
                            <p>
                            <div id="estadoCivil">
                                <label for="civil">Estado Civil:</label>
                                <input type="radio" required name="civil" value="solteiro"> Solteiro
                                <input type="radio" name="civil" value="casado"> Casado
                                <input type="radio" name="civil" value="divorciado"> Divorciado
                                <input type="radio" name="civil" value="viúvo"> Viúvo
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
                                <input type="text" required name="endereco">
                            </p>
                            <p>
                                <label for="bairro">Bairro:</label>
                                <input type="text" required name="bairro">
                            </p>
                            <p>
                                <label for="municipio">Município:</label>
                                <input type="text" required name="municipio">
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
                                <input type="text" required name="cep" oninput="mascaracep(this)" placeholder="Ex.: 00000-000">
                            </p>
                            <div id="situacaoMoradia">
                                <label for="situacaoMoradia">Situação de moradia:</label>
                                <input type="radio" required name="situacaoMoradia" value="Com pais"> Com Pais
                                <input type="radio" name="situacaoMoradia" value="Casa própria"> Casa Própria
                                <input type="radio" name="situacaoMoradia" value="Com parentes"> Com parentes
                                <br>
                                <input type="radio" name="situacaoMoradia" value="Aluguel"> Aluguel
                                <input type="radio" name="situacaoMoradia" value="Sem lugar fixo"> Sem lugar fixo
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div id="informacoesAdicionais">
                    <h2>Informações adicionais</h2>
                    <fieldset>
                        <div class="half-box">
                            <p>
                                <b>Possui renda própria:</b>
                                <input type="radio" required name="rendaPropria" value="possui renda própria"> Sim
                                <input type="radio" name="rendaPropria" value="Não possui renda Própria"> Não
                            </p>
                            <p>
                                <label for="profissao">Profissão:</label>
                                <input type="text" required name="profissao">
                            </p>
                            <p>
                                <b>Situação profissional do acolhido:</b>
                                <input type="radio" required name="vinculoEmpregaticio" value="Desempregado"> Desempregado
                                <input type="radio" name="vinculoEmpregaticio" value="Trabalhando"> Trabalhando
                                <input type="radio" name="vinculoEmpregaticio" value="Aposentado"> Aposentado
                            </p>
                            <p>
                                <b>Possui filhos:</b>
                                <input type="radio" name="filhos" value="Possui filhos"> Sim
                                <input type="radio" required name="filhos" value="Não possui filhos"> Não
                            </p>
                            <p>
                                <label for="grauEscolaridade">Grau de escolaridade:</label>
                                <select required name="grauEscolaridade" id="grauEscolaridade">
                                    <option value="">Selecione</option>
                                    <option value="Analfabeto">Analfabeto</option>
                                    <option value="Até o 5° ano incompleto">Até o 5° ano incompleto</option>
                                    <option value="6° ao 9° ano incompleto">6° ao 9° ano incompleto</option>
                                    <option value="Fundamental completo">Fundamental completo</option>
                                    <option value="Médio incompleto">Médio incompleto</option>
                                    <option value="Médio completo">Médio completo</option>
                                    <option value="Superior incompleto">Superior incompleto</option>
                                    <option value="Superior completo">Superior completo</option>
                                    <option value="Mestrado">Mestrado</option>
                                    <option value="Doutorado">Doutorado</option>
                                    <option value="Ignorado">Ignorado</option>
                                </select>
                            </p>
                            <p>
                                <label for="responsavelAcolhido">Responsável pelo acompanhamento do acolhido:</label>
                                <input type="text" required name="responsavelAcolhido">
                            </p>
                            <p>
                                <label for="contatoRede">Contatos com a rede:</label>
                                <input type="text" required name="contatoRede">
                            </p>
                            <p>
                                <b>Contatos:</b>
                                <input type="radio" required name="contatos" value="Telefonemas">Telefonemas
                                <input type="radio" name="contatos" value="Visita ativa">Visita Ativa
                                <input type="radio" name="contatos" value="Visita receptiva">Visitas receptivas
                            </p>
                        </div>
                    </fieldset>
                </div>
                <div id="quadroclínico">
                    <h2>Quadro Clínico</h2>
                    <fieldset>
                        <div class="half-box">
                            <p>
                                <b>Uso de substância psicoativa:</b><br />
                                <TEXTAREA required name="drogasUsadas" ROWS="7" COLS="50"></TEXTAREA>
                            </p>
                            <p>
                                <b>Fumante:</b>
                                <input type="radio" required name="fumante" value="Fumante"> Sim
                                <input type="radio" name="fumante" value="Não fumante"> Não
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
                            <input type="text" required oninput="mascaraIdadeDroga(this)" name='drogaLicita'>
                            <label for="drogaIlicita">Ilícita:</label>
                            <input type="text" required oninput="mascaraIdadeDroga(this)" name="drogaIlicita">
                            </p>
                        </div>
                    </fieldset>
                </div>
                <input type="submit" value="Cadastrar Paciente">
            </form>
        </div>
    </div>
</body>

</html>