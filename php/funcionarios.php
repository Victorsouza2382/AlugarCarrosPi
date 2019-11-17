<?php

    include_once 'all_pages.php';

    class Funcionario{

        public function listarTodosFuncionarios(){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("SELECT * from funcionario");
            $stmt->execute();
            
            $funcionarios =  $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($funcionarios as $func){
                echo "<div class='col-sm-12 border-bottom pt-4'>" .
                    "<strong>Nome: </strong>" . $func['nome_funcionario'] . "<br>" .
                    "<strong>CPF: </strong>" . $func['cpf'] . "<br>" .
                    "<strong>Telefone: </strong>" . $func['telefone'] . "<br>" .
                    "<strong>Endereco: </strong>" . $func['endereco'] . "</div>";                
            }
        }

        public function cadastrarFuncionario($dados){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("insert into funcionario(nome_funcionario, cpf, telefone, endereco)
             values(?, ?, ?, ?)
            ");
            $stmt->bindValue(1, $dados['nome']);
            $stmt->bindValue(2, $dados['cpf']);
            $stmt->bindValue(3, $dados['telefone']);
            $stmt->bindValue(4, $dados['endereco']);
            $stmt->execute();
        
        }

        public function obterIdFuncionario($dados){
            $func_ = strtolower($dados['funcionario']);

            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("select * from funcionario");
            $stmt->execute();

            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($funcionarios as $func){
                if(strtolower($func['nome_funcionario']) == $func_){
                    return $func['idfuncionario'];
                }
            }
        }

        public function obterNomeFuncionario($id){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("select * from funcionario");
            $stmt->execute();

            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($funcionarios as $func){
                if(strtolower($func['idfuncionario']) == $id){
                    return $func['nome_funcionario'];
                }
            }
        }
    }
?>