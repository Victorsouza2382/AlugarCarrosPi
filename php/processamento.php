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
        case 'cadastrarCarro':
            $carro = new Carro();
            $carro->cadastrarCarro($_POST);
            $id = $carro->obterIdCarro($_POST);

            //foto
            $foto = new Foto();
            $foto->adicionarFoto($_POST, $id);

            $situacao = new Situacao();
            $situacao->situacaoCarro('Disponivel', $id);

            header('location: ../index.php');
            break;
        case 'deletarCarro':
            $carro = new Carro();
            $id = $carro->obterIdCarro($_POST);
 
            $situacao = new Situacao();
            $situacao->deletarSituacao($id);

            $foto = new Foto();
            $foto->deletarFoto($id);

            $carro->deletarCarro($_POST);
            header('location: ../index.php');
            break;
            
    }

?>