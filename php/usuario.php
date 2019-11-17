<?php

    include_once 'all_pages.php';

    class Usuario{

        public function listarTodosUsuarios(){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("SELECT * from usuario");
            $stmt->execute();
            
            $usuarios =  $stmt->fetchAll(PDO::FETCH_ASSOC);

            $funcionario = new Funcionario();
            foreach($usuarios as $usuario){
                $nome_func = $funcionario->obterNomeFuncionario($usuario['funcionario_idfuncionario']);

                echo "<div class='col-sm-12 border-bottom pt-4'>" .
                    "<strong>Nome: </strong>" . $usuario['nome_usuario'] . "<br>" .
                    "<strong>CPF: </strong>" . $usuario['cpf'] . "<br>" .
                    "<strong>Telefone: </strong>" . $usuario['telefone'] . "<br>" .
                    "<strong>Endereco: </strong>" . $usuario['endereco'] . "<br>" .
                    "<strong>Nome Funcionario: </strong>" . $nome_func . "</div>";               
            }
        }

        public function cadastrarUsuario($dados, $id){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("insert into usuario(nome_usuario, cpf, telefone, endereco, funcionario_idfuncionario)
             values(?, ?, ?, ?, ?)
            ");
            $stmt->bindValue(1, $dados['nome']);
            $stmt->bindValue(2, $dados['cpf']);
            $stmt->bindValue(3, $dados['telefone']);
            $stmt->bindValue(4, $dados['endereco']);
            $stmt->bindValue(5, $id);
            $stmt->execute();
        
        }

        public function obterIdUsuario($dados){
            $nome = strtolower($dados['usuario']);

            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("select * from usuario");
            $stmt->execute();

            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($usuarios as $usuario){
                
                if(strtolower($usuario['nome_usuario']) == $nome){
                    return $usuario['idusuario'];
                }
            }
        }
    }
?>