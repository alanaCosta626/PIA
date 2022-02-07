<?php 



session_start();

if (!$_SESSION['adm_login']) {
  header('location: index.php');
}


    include 'conexao.php';

    $conexao  = novaConexao();


    if(@$_GET['deletar']){
        $id = @$_GET['deletar'];
        $sql = "DELETE FROM bancoteste WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        
        header('location: pesquisarPaciente.php');
    }
