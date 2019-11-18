<?php
    include_once 'conexao.php';

    class Foto{
        protected $local_foto;
    
        public function adicionarFoto($dados, $id){
            $conexao = new Conexao();
            $conexao->conectar();
            $stmt = $conexao->getConexao();

            $target = "../img/".basename($_FILES['imagem']['name']);

            $imagem = $_FILES['imagem']['name'];
            
            $sql = $stmt->prepare("insert into foto(foto, carro_idcarro) values(?, ?)");
            $sql->bindValue(1, $imagem);
            $sql->bindValue(2, $id);
            $sql->execute(); 
            
            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target)){
                $msg = "image upload successfuly";
            }else{
                $msg = "there was a problem uploading the image";
            }
        }

        public function obterNomeFoto($id){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();

            $stmt = $sql->prepare("select * from foto");
            $stmt->execute();
            
            $fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($fotos as $foto){
                if($foto['carro_idcarro'] == $id){
                    return $foto['foto'];
                }
            }
        }

        public function deletarFoto($id){
            $conexao = new Conexao();
            $conexao->conectar();
            $sql = $conexao->getConexao();
            
            $stmt = $sql->prepare("delete from foto where foto.carro_idcarro = ?");
            $stmt->bindValue(1, $id);
            
            $stmt->execute();
        }
    }
?>