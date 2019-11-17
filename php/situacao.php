<?php
    include_once '../php/all_pages.php';

    class Situacao{

        public function situacaoCarro($situacao, $id){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("insert into situacao(situacao, carro_idcarro) values(?, ?)");
            $stmt->bindValue(1, $situacao);
            $stmt->bindValue(2, $id);
            $stmt->execute();
        }

        public function atualizarSituacao($situacao, $id){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("update situacao set situacao = ? where idsituacao = ?");
            $stmt->bindValue(1, $situacao);
            $stmt->bindValue(2, $id);
            $stmt->execute();
        }

        public function deletarSituacao($id){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("delete from situacao where situacao.carro_idcarro = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
        }


    }

?>