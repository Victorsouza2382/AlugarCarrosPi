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
    }
?>