<?php
include 'conexaoDB.php';
class Actions {
    
    public function incluir($name,$email,$password, $endereco) {
        // Inserir registro
        $sql = "INSERT INTO `tb_user` (`id_user`, "
                . "`user_name`, `email`, `user_password`, `user_CEP`) VALUES "
                . "(NULL, '$name', '$email', '$password', '$endereco');";
        $this->executarSQL($sql, "inclusão");
    }
    public function excluir($id) {
        $sql = "DELETE FROM usuario WHERE id_usuario=$id";
        $this->executarSQL($sql, "exclusão");
    }
    public function alterar($nome,$email,$senha,$id) {
        $sql = "UPDATE `tb_user` SET"
                . " `nome` = '$nome', "
                . "`email` = '$email', "
                . "`senha` = '$senha' "
                . "WHERE `usuario`.`id_usuario` = $id;";
        $this->executarSQL($sql, "alteração");
    }
    
    private function executarSQL($sql,$msg){
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();
        if ($conecta->query($sql) === TRUE) {
            echo "$msg realizada com sucesso<br>";
        } else {
            echo "Erro na $msg do registro: " . $conecta->error."<br>";
        }
        $conexao->desconectar();
    }
    
    public function buscar() {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();
        
        $sql = "SELECT id_product, product_name, product_unit_price FROM tb_product";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
        // saída dos dados
        while($linha = $resultado->fetch_assoc()) {
            echo "Name: " . $linha["product_name"]. "<br>" ."Preço: " . $linha["product_unit_price"]. "<br>";
        }
        } else {
            echo "0 results";
        }
        
        $conexao->desconectar();
    }
    public function buscar2() {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();
        
        $sql = "SELECT id_product, product_name, product_unit_price FROM tb_product";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
        // saída dos dados
        while($linha = $resultado->fetch_assoc()) {
            echo '<h3>'.$linha['product_name'].'</h3> <br>'.$linha['product_unit_price'].'<br>';
            
            
            echo '<a href="carrinho.php?acao=add&id='.$linha['id_product'].'">Comprar</a>';
        }
        } else {
            echo "0 results";
        }
        
        $conexao->desconectar();
    }

    public function buscarCordas() {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();
        
        $sql = "SELECT id_product, product_name, product_unit_price FROM tb_product WHERE product_category LIKE 'C'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
        // saída dos dados
        while($linha = $resultado->fetch_assoc()) {
            echo " - Name: " . $linha["product_name"]. " " . $linha["product_unit_price"]. "<br>";
        }
        } else {
            echo "Não foi encontrado nenhum item desta categoria";
        }
        
        $conexao->desconectar();
    }
    
    public function buscarUsuario() {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();
        
        $sql = "SELECT id_user, user_name, email FROM tb_user";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            return $resultado;
        } else {
            echo "0 results";
        }
        
        $conexao->desconectar();
    }
    
    public function buscarNome($nome) {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();
        
        $sql = "SELECT id_user, user_name, email FROM tb_user WHERE user_name like '%$nome%'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while($linha = $resultado->fetch_assoc()) {
                echo "id: " . $linha["id_usuario"]. " - Name: " . $linha["nome"]. " " . $linha["email"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        
        $conexao->desconectar();
    }

    public function buscarNomeProduto($nome) {
        
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();
        
        $sql = "SELECT product_name, product_unit_price FROM tb_product WHERE product_name like '%$nome%'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
        // saída dos dados
        while($linha = $resultado->fetch_assoc()) {
            "<br>";
            echo "Nome: " . $linha["product_name"]. "<br>";
            echo 'Preco do produto : R$ '. number_format($linha['product_unit_price'], 2,',', '.');
        }
        } else {
            echo "Não foi encontrado nenhum produto com esse nome, Por favor verifique o nome digitado";
        }
        
        $conexao->desconectar();
    }
    
    public function buscarDisciplina($id_usuario) {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();
        
        $sql = "SELECT d.nome FROM disciplina d "
                . "INNER JOIN usuario u ON u.id_usuario=d.id_usuario"
                . " WHERE u.id_usuario = $id_usuario;";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while($linha = $resultado->fetch_assoc()) {
                echo "Disciplina: " . $linha["nome"]."<br>";
            }
        } else {
            echo "0 results";
        }
        
        $conexao->desconectar();
    }
    
    public function logar($email,$senha) {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();
        
        $sql = "SELECT id_user, user_name, email FROM tb_user WHERE user_password='$senha' and email='$email'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while($linha = $resultado->fetch_assoc()) {
                return $linha["id_user"];
                $newURL = "index.php";
                header("Location: .$newURL.php");

                die();
            }
        } else {
            return FALSE;
        }
        
        $conexao->desconectar();
    }
    
}
