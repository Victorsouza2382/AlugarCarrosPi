<?php

    include_once 'all_pages.php';

    class Carro{

        public function listarTodosCarros(){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("SELECT carro.idcarro, carro.placa_carro, carro.marca, carro.ano, situacao.situacao 
                FROM carro, situacao 
                where (carro.idcarro = situacao.carro_idcarro)"
                );
            $stmt->execute();
            
            $carros =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            $foto = new Foto();
            foreach($carros as $carro){
                $nome_foto = $foto->obterNomeFoto($carro['idcarro']);
                echo "<div class='col-sm-2 border-bottom pt-2'>" .
                    "<img src='img/" . $nome_foto . "' style='height:140px;'>" . "</div>";  
                echo "<div class='col-sm-4 border-bottom pt-5'>" . 
                    "<strong>Placa: </strong>" . $carro['placa_carro'] . "<br>" .
                    "<strong>Marca: </strong>" . $carro['marca'] . "<br>" .
                    "<strong>Ano: </strong>" . $carro['ano'] . "</div>";   
                echo "<div class='col-sm-6 border-bottom border-left pt-5'>" . 
                    $carro['situacao'] . "</div>";  
            }
        }

        public function cadastrarCarro($dados){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("insert into carro(marca, ano, placa_carro)
             values(?, ?, ?)
            ");
            $stmt->bindValue(1, $dados['marca']);
            $stmt->bindValue(2, $dados['ano']);
            $stmt->bindValue(3, strtoupper($dados['placa']));
            $stmt->execute();
        
        }

        public function obterIdCarro($dados){
            $placa = strtolower($dados['placa']);

            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("select * from carro");
            $stmt->execute();

            $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($carros as $carro){
                
                if(strtolower($carro['placa_carro']) == $placa){
                    return $carro['idcarro'];
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

        public function deletarCarro($placa){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("delete from carro where carro.placa_carro = ?");
            $stmt->bindValue(1, strtoupper($placa['placa']));

            $stmt->execute();
        }

        public function reservarCarro($dados, $id_usuario, $id_carro){
           
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("insert into reserva(data_reserva, usuario_idusuario, carro_idcarro)
            values(?, ?, ?)");
            $stmt->bindValue(1, $dados['data_reserva']);
            $stmt->bindValue(2, $id_usuario);
            $stmt->bindValue(3, $id_carro);
            $stmt->execute();
        }

        public function listarTodosCarrosReservados(){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("SELECT carro.idcarro, carro.placa_carro, carro.marca, carro.ano, 
                usuario.nome_usuario, usuario.cpf, usuario.telefone, usuario.endereco, funcionario.nome_funcionario
                FROM carro, reserva, usuario, funcionario
                where (carro.idcarro = reserva.carro_idcarro)");
            $stmt->execute();
            
            $carros =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            $foto = new Foto();
            foreach($carros as $carro){
                $nome_foto = $foto->obterNomeFoto($carro['idcarro']);
                echo "<div class='col-sm-2 border-bottom pt-2'>" .
                    "<img src='img/" . $nome_foto . "' style='height:140px;'>" . "</div>";  
                echo "<div class='col-sm-4 border-bottom pt-5'>" . 
                    "<strong>Placa: </strong>" . $carro['placa_carro'] . "<br>" .
                    "<strong>Marca: </strong>" . $carro['marca'] . "<br>" .
                    "<strong>Ano: </strong>" . $carro['ano'] . "</div>";   
                echo "<div class='col-sm-6 border-bottom border-left pt-3'>" . 
                    "<strong>Nome: </strong>" . $carro['nome_usuario'] . "<br>" .
                    "<strong>CPF: </strong>" . $carro['cpf'] . "<br>" .
                    "<strong>Telefone: </strong>" . $carro['telefone'] . "<br>" .
                    "<strong>Endereco: </strong>" . $carro['endereco'] . "<br>" .
                    "<strong>Nome Funcionario: </strong>" . $carro['nome_funcionario'] . "</div>";  
            }
        }

        public function alugarCarro($dados, $id_usuario, $id_carro){
           
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("insert into alugado(data_alugado, data_entrega, usuario_idusuario, carro_idcarro)
            values(NOW(), ?, ?, ?)");
            $stmt->bindValue(1, $dados['data_entrega']);
            $stmt->bindValue(2, $id_usuario);
            $stmt->bindValue(3, $id_carro);
            $stmt->execute();
        }

        public function listarTodosCarrosAlugados(){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("SELECT carro.idcarro, carro.placa_carro, carro.marca, carro.ano, 
                usuario.nome_usuario, usuario.cpf, usuario.telefone, usuario.endereco, funcionario.nome_funcionario
                FROM carro, alugado, usuario, funcionario
                where (carro.idcarro = alugado.carro_idcarro)");
            $stmt->execute();
            
            $carros =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            $foto = new Foto();
            foreach($carros as $carro){
                $nome_foto = $foto->obterNomeFoto($carro['idcarro']);
                echo "<div class='col-sm-2 border-bottom pt-2'>" .
                    "<img src='img/" . $nome_foto . "' style='height:140px;'>" . "</div>";  
                echo "<div class='col-sm-4 border-bottom pt-5'>" . 
                    "<strong>Placa: </strong>" . $carro['placa_carro'] . "<br>" .
                    "<strong>Marca: </strong>" . $carro['marca'] . "<br>" .
                    "<strong>Ano: </strong>" . $carro['ano'] . "</div>";   
                echo "<div class='col-sm-6 border-bottom border-left pt-3'>" . 
                    "<strong>Nome: </strong>" . $carro['nome_usuario'] . "<br>" .
                    "<strong>CPF: </strong>" . $carro['cpf'] . "<br>" .
                    "<strong>Telefone: </strong>" . $carro['telefone'] . "<br>" .
                    "<strong>Endereco: </strong>" . $carro['endereco'] . "<br>" .
                    "<strong>Nome Funcionario: </strong>" . $carro['nome_funcionario'] . "</div>";  
            }
        }

        public function deletarReserva($id_carro, $id_usuario){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("delete from reserva 
            where ((reserva.carro_idcarro = ?) and (reserva.usuario_idusuario = ?))");
            $stmt->bindValue(1, $id_carro);
            $stmt->bindValue(2, $id_usuario);
            $stmt->execute();
        }

        public function deletarAlugado($id_carro, $id_usuario){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("delete from alugado 
            where ((alugado.carro_idcarro = ?) and (alugado.usuario_idusuario = ?))");
            $stmt->bindValue(1, $id_carro);
            $stmt->bindValue(2, $id_usuario);
            $stmt->execute();
        }
        
    }
?>