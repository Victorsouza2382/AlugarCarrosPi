<?php
    include_once 'all_pages.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : null;
 
    switch($acao){
        case 'cadastrarFuncionario':
            $funcionario = new Funcionario();
            $funcionario->cadastrarFuncionario($_POST);

            header('location: ../index.php');
            break;
        case 'cadastrarUsuario':
            $funcionario = new Funcionario();
            $id = $funcionario->obterIdFuncionario($_POST);

            $usuario = new Usuario();
            $usuario->cadastrarUsuario($_POST, $id);

            header('location: ../index.php');
            break;
    }

?>