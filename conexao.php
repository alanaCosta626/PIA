<?php



session_start();

if (!$_SESSION['adm_login']) {
  header('location: index.php');
}

function novaConexao($banco = 'bancopia', $porta='3306'){
    $servidor = '127.0.0.1:'.$porta; // 127.0.0.1:3306
    $usuario = 'root';
    $senha = '';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error){        
        echo "Houve um erro: ". $conexao->connect_error;
        exit();
    }

    return $conexao;
}
?>