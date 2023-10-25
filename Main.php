<?php
include 'conexaoDB.php';
class Actions
{

    public $var2 = 0;


    public function incluir($name, $email, $password, $endereco)
    {
        // Inserir registro
        $sql = "INSERT INTO `tb_user` (`id_user`, "
            . "`user_name`, `email`, `user_password`, `user_CEP`) VALUES "
            . "(NULL, '$name', '$email', '$password', '$endereco');";
        $this->executarSQL($sql, "inclusão");
    }
    public function excluirItensCarrinho($id)
    {
        $sql = "DELETE FROM tb_itens_request WHERE id_product = '$id';";
        $this->executarSQL($sql, "exclusão");
        echo $id;
    }
    public function alterar($nome, $email, $senha, $id)
    {
        $sql = "UPDATE `tb_user` SET"
            . " `nome` = '$nome', "
            . "`email` = '$email', "
            . "`senha` = '$senha' "
            . "WHERE `usuario`.`id_usuario` = $id;";
        $this->executarSQL($sql, "alteração");
    }
    public function incluirTabelaItensRequest($id, $value)
    {
        // Inserir registro
        $sql = "INSERT INTO `tb_itens_request` (`id_product`, `quantity_itens_requested`) VALUES "
            . "('$id', '$value');";
        $this->executarSQL($sql, "inclusão");
    }
    public function alterarQuantidade($id, $qdt)
    {
        $sql = "UPDATE `tb_itens_request` SET `quantity_itens_requested` = '$qdt' WHERE `id_product` = $id;";
        $this->executarSQL($sql, "alteração");
    }


    private function executarSQL($sql, $msg)
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();
        if ($conecta->query($sql) === TRUE) {
            echo "$msg realizada com sucesso<br>";
        } else {
            echo "Erro na $msg do registro: " . $conecta->error . "<br>";
        }
        $conexao->desconectar();
    }

    public function buscar()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_name, product_unit_price FROM tb_product";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                echo "Name: " . $linha["product_name"] . "<br>" . "Preço: " . $linha["product_unit_price"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }
    public function buscar2()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_name, product_unit_price FROM tb_product";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                echo '<h3>' . $linha['product_name'] . '</h3> <br>' . $linha['product_unit_price'] . '<br>';


                //echo '<button> <a href="carrinho.php?acao=add&id=' . $linha['id_product'] . '">Comprar</a></button>';
                echo '<a href="product.php?id=' . $linha['id_product'] . '">Ver detalhes</a>';
            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }

    public function buscarCordas()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_name, product_unit_price FROM tb_product WHERE product_category LIKE 'C'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                echo " - Name: " . $linha["product_name"] . " " . $linha["product_unit_price"] . "<br>";
            }
        } else {
            echo "Não foi encontrado nenhum item desta categoria";
        }

        $conexao->desconectar();
    }

    public function buscarUsuario()
    {
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

    public function buscarNome($id)
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_name, product_unit_price, product_description FROM tb_product WHERE id_product like '$id'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                echo "Name: " . $linha["product_name"] . "<br>" . "Preço: " . $linha["product_unit_price"] . "<br>"
                    . $linha["product_description"] . "<br>";
                //echo '<button> <a href="carrinho.php?acao=add&id=' . $linha['id_product'] . '">Comprar</a></button>';
                echo '<button> <a href="teste.php?acao=add&id=' . $linha['id_product'] . '">Comprar</a></button>';
            }
        } else {
            echo "Não ha produto";
        }

        $conexao->desconectar();
    }

    public function buscarNoCarrinho($id)
    {

        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_name, product_unit_price, product_description FROM tb_product WHERE id_product like '$id'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                echo "Name: " . $linha["product_name"] . "<br>" . "Preço: " . $linha["product_unit_price"] . "<br>";
            }
        } else {
            echo "Não ha produto";
        }

        $conexao->desconectar();
    }

    public function buscarNomeProduto($nome)
    {

        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT product_name, product_unit_price FROM tb_product WHERE product_name like '%$nome%'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {

                "<br>";
                echo "Nome: " . $linha["product_name"] . "<br>";
                echo 'Preco do produto : R$ ' . number_format($linha['product_unit_price'], 2, ',', '.') . "<br>";

            }
        } else {
            echo "Não foi encontrado nenhum produto com esse nome, Por favor verifique o nome digitado";
        }

        $conexao->desconectar();
    }


    public function buscarTeste()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT 
        ir.id_itens_request, 
        p.id_product,
        p.product_name, 
        ir.quantity_itens_requested, 
        p.product_unit_price, 
        ir.quantity_itens_requested * p.product_unit_price as junca, 
        SUM(ir.quantity_itens_requested * p.product_unit_price) OVER () as total_price
    FROM 
        tb_itens_request ir 
    INNER JOIN 
        tb_product p ON ir.id_product = p.id_product  
    LIMIT 0, 1000;";

        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                echo "Total price: R$ " . $linha["total_price"];
                echo "<br>";
                break;
           }
        } else {
            
        }

        // $sql2 = "SELECT SUM(product_unit_price) as total_price FROM tb_product";
        // $resultado2 = $conecta->query($sql2);
        // if ($resultado2->num_rows > 0) {
        //     // saída dos dados
        //     while ($linha2 = $resultado2->fetch_assoc()) {
        //         echo "Total price: " . $linha2["total_price"];
        //     }
        // } else {
        //     echo "0 results";
        // }

        $conexao->desconectar();
    }





    public function buscarPreco($id)
    {


        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_unit_price FROM tb_product WHERE id_product like '$id'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {




                // $var = (double) $linha['product_unit_price'];
                // "<br>";
                // echo 'Preco do produto : R$ ' . number_format($linha['product_unit_price'], 2, ',', '.') . "<br>";
                // echo "Variavel: " . $var . "<br>";
                // echo "Variavel: " . $linha['id_product'] . "<br>";
            }
        } else {
            echo "Não foi encontrado nenhum produto com esse nome, Por favor verifique o nome digitado";
        }

        $conexao->desconectar();
    }

    public function buscarDisciplina($id_usuario)
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT d.nome FROM disciplina d "
            . "INNER JOIN usuario u ON u.id_usuario=d.id_usuario"
            . " WHERE u.id_usuario = $id_usuario;";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                echo "Disciplina: " . $linha["nome"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }

    public function logar($email, $senha)
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_user, user_name, email FROM tb_user WHERE user_password='$senha' and email='$email'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
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






