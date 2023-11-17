<?php
include 'conexaoDB.php';
$var2 = 0;
class Actions
{




    public function incluir($name, $email, $password, $endereco)
    {
        // Inserir registro
        $sql = "INSERT INTO `tb_user` (`id_user`, "
            . "`user_name`, `email`, `user_password`, `user_CEP`) VALUES "
            . "(NULL, '$name', '$email', '$password', '$endereco');";
        $this->executarSQL($sql, "inclusão");
    }

    public function inserirComentario($product_id, $comentario, $id_usuario)
    {

        // Inserir registro
        $sql = "INSERT INTO `tb_avaliacao` (`id_user`, "
            . "`id_product`, `client_comment_avaliation`) VALUES "
            . "('$id_usuario', '$product_id', '$comentario');";
        $this->executarSQL($sql, "inclusão");
    }
    public function excluirItensCarrinho($id)
    {
        $varId = $_SESSION['usuario'];
        $sql = "DELETE FROM tb_itens_request WHERE id_product = '$id' and id_user = '$varId';";
        $this->executarSQL($sql, "exclusão");
        echo $id;
    }


    // public function alterar($nome, $email, $senha, $id)
    // {
    //     $sql = "UPDATE `tb_user` SET"
    //         . " `nome` = '$nome', "
    //         . "`email` = '$email', "
    //         . "`senha` = '$senha' "
    //         . "WHERE `usuario`.`id_usuario` = $id;";
    //     $this->executarSQL($sql, "alteração");
    // }


    public function incluirTabelaItensRequest($id, $qntd, $user_id)
    {
        // Inserir registro
        $sql = "INSERT INTO `tb_itens_request` (`id_product`,`id_user`, `quantity_itens_requested`) VALUES "
            . "('$id','$user_id', '$qntd');";
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

        $sql = "SELECT id_product, product_name, product_unit_price, product_img FROM tb_product";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                //echo '<h3>' . $linha['product_name'] . '</h3> <br>' . $linha['product_unit_price'] . '<br>'. "<img class='card-img-to' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />". '<br>';
                echo '
                <div class="card" style="width: 18rem;">
                    ' . "<img class='card-img-to custom-image' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />" . '
                    <div class="card-body"
                        <h1 class="card-title"><strong>' . $linha['product_name'] . '</strong> </h1>
                        <p class="card-text">' . $linha['product_unit_price'] . '</p>
                        <a href="product.php?id=' . $linha['id_product'] . '"class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
                
                ';

                //echo '<button> <a href="carrinho.php?acao=add&id=' . $linha['id_product'] . '">Comprar</a></button>';
                //echo '<a href="product.php?id=' . $linha['id_product'] . '">Ver detalhes</a>';
            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }
    public function buscar2_0($id)
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_name, product_unit_price, product_description, product_img FROM tb_product WHERE id_product like '$id'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                //echo "Name: " . $linha["product_name"] . "<br>" . "Preço: " . $linha["product_unit_price"] . "<br>";
                echo '
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        ' . "<img class='card-img-to custom-image2' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />" . '
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">' . $linha['product_name'] . '</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <h2 class="card-text"> R$ ' . $linha['product_unit_price'] . '</h2>
                            </div>
                        </div>
                    </div>
                </div>

                ';

            }
        } else {
            echo "Não ha produto";
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


    public function buscarUsuarioPorId($id_usuario)
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT user_name, email, user_CEP FROM tb_user where id_user = '$id_usuario'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                echo "<h5>Nome: " . $linha["user_name"] . "</h5>" . '<a class="btn btn-info " href="atualizarDadosPerfil.php?campo=nome">Editar Nome</a>' . "<br>" . "<br>";
                echo "<h5>Email: " . $linha["email"] . "</h5>" . ' <a class="btn btn-info " href="atualizarDadosPerfil.php?campo=email">Editar Email</a>' . "<br>" . "<br>";
                echo "<h5>CEP: " . $linha["user_CEP"] . "</h5>" . ' <a class="btn btn-info " href="atualizarDadosPerfil.php?campo=cep">Editar CEP</a>' . "<br>" . "<br>";

                //     echo "Nome: " . $linha["user_name"] . "<br>" . '<a href="teste.php?campo=nome">Editar Nome</a>' . "<br>";
                //     echo "Email: " . $linha["email"] . "<br>" . '<a href="teste.php?campo=email">Editar Email</a>' . "<br>";
                //     echo "CEP: " . $linha["user_CEP"] . "<br>" . '<a href="teste.php?campo=cep">Editar CEP</a>' . "<br>";
            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }




    public function buscarUsuario()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT * FROM tb_user";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                echo '<h3>' . $linha['user_name'] . '</h3> <br>' . $linha['email'] . '<br>';
            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }

    public function buscarNome($id)
    {

        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_img, product_name, product_unit_price, product_description FROM tb_product WHERE id_product like '$id'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {

                echo '
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        ' . "<img class='card-img-to custom-image2' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />" . '
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">' . $linha['product_name'] . '</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <h2 class="card-text"> R$ ' . $linha['product_unit_price'] . '</h2>
                            </div>
                        </div>
                    </div>
                </div>

                ';


                // echo "Name: " . $linha["product_name"] . "<br>" . "Preço: " . $linha["product_unit_price"] . "<br>"
                //     . $linha["product_description"] . "<br>";

                if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true) {
                    // echo '<button> <a href=".php?acao=add&id=' . $linha['id_product'] . '">Comprar</a></button>';
                    echo '<a class="btn btn-success" href="carrinho.php?acao=add&id=' . $linha['id_product'] . '">Comprar</a>     ';
                    //echo '<button class="btn btn-success> <a href="carrinho.php?acao=add&id=' . $linha['id_product'] . '">Comprar</a></button>'. '<br>'. '<br>';
                } else {

                    echo 'Faça login para adicionar ao carrinho.' . '<br>';
                    echo '<a class="btn btn-danger" href="login.php?">Ir Para login</a>';
                }

            }

        } else {
            echo "Não ha produto";
        }

        $conexao->desconectar();
    }

    public function avaliacoes($id)
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();


        $sql = "SELECT id_avaliacao, u.id_user, p.id_product, user_name, client_comment_avaliation FROM tb_avaliacao av INNER JOIN tb_user u ON av.id_user = u.id_user 
        INNER JOIN tb_product p ON av.id_product = p.id_product WHERE p.id_product LIKE '$id';";
        $resultado = $conecta->query($sql);

        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {

                echo "Name: " . $linha["user_name"] . "<br>" . "Comentario: " . $linha["client_comment_avaliation"] . "<br>";

                if (isset($_SESSION['usuario'])) {
                    if ($_SESSION['usuario'] == $linha['id_user']) {
                        echo "<a class='btn btn-danger' href='excluirComentario.php?comentario_id={$linha['id_avaliacao']}'>Excluir</a>";
                        echo "<br>";
                        echo "<br>";


                    } else {

                    }
                } else {

                }
            }


        }



        $conexao->desconectar();

    }

    public function excluirComentario($comentarioId)
    {
        $sql = "DELETE FROM tb_avaliacao WHERE id_avaliacao = '$comentarioId';";
        $this->executarSQL($sql, "exclusão");

    }

    public function buscarNoCarrinho($id)
    {
        $varId = $_SESSION['usuario'];
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

                echo '<div>
                 <ul>
                    <li>Nome: ' . $linha["product_name"] . '</li>
                    <li>"Preco do produto : R$ ' . number_format($linha['product_unit_price'], 2, ',', '.') . '</li>
                    </ul>
                </div>"';

            }
        } else {
            echo "Não foi encontrado nenhum produto com esse nome, Por favor verifique o nome digitado";

        }

        $conexao->desconectar();
    }


    public function buscarTeste()
    {

        $var = 0;
        $teste = $_SESSION['usuario'];

        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();



        $sql = "SELECT p.product_img, 
        r.id_request AS id_do_pedido,
        r.request_total_value AS Valor_Total_Do_Pedido,
        p.product_name AS Nome_Do_Produto,
        ir.quantity_itens_requested AS Quantidade_pedida_produto,
        p.product_description AS Descrição_produto,
        ir.id_itens_request AS ID_Do_Item,
        p.id_product AS ID_Do_Produto,
        p.product_unit_price AS Preço_Unitário,
        ir.quantity_itens_requested * p.product_unit_price AS Valor_Do_Item,
        SUM(ir.quantity_itens_requested * p.product_unit_price) OVER () AS Total_Do_Pedido
    FROM
        tb_request r
    INNER JOIN
        tb_itens_request ir ON r.id_request = ir.id_request
    INNER JOIN
        tb_product p ON ir.id_product = p.id_product
    WHERE
        r.id_user = ir.id_user
        AND r.id_request = (
            SELECT id_request
            FROM tb_request
            WHERE id_user = $teste
            ORDER BY time_do_pedido DESC
            LIMIT 1
        );";

        $resultado = $conecta->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {

                echo '
                <div class="card mb-3 " style="max-width: 540px; ">
                    <div class="row g-0 ">
                        <div class="col-md-4">
                        ' . "<img class='card-img-to custom-image2' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['Nome_Do_Produto'] . "' />" . '
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">' . $linha['Nome_Do_Produto'] . '</h2>
                                <h3 class="card-text"> Preço: R$ ' . $linha['Preço_Unitário'] . '</h3>
                                <h4 class="card-text"> Quantidade: ' . $linha['Quantidade_pedida_produto'] . '</h4>
                                <h6 class="card-text">Descrição: ' . $linha['Descrição_produto'] . '</h6>
                                
                            </div>
                        </div>
                    </div>
                </div>

                ';

                $var = $linha['Total_Do_Pedido'];


            }
            echo '<h3> Valor Total: R$ ' . $var . '</h3>';
        }


        $conexao->desconectar();
    }





    public function buscarPreco($id)
    {

        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_unit_price FROM tb_product WHERE id_product = $id";
        $resultado = $conecta->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $productPrice = (double) $linha['product_unit_price'];
            }
        }


        $conexao->desconectar();
        return $productPrice;
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

    public function incluirPedido($id_usuario)
    {

        echo $id_usuario;
        echo "<br>";
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        // Crie o pedido sem definir request_total_value
        $sql = "INSERT INTO `tb_request` (`id_user`, `request_total_value`, `time_do_pedido`) VALUES "
            . "('$id_usuario', 0, NOW());";
        $conecta->query($sql);


        $id_request = $conecta->insert_id;


        foreach ($_SESSION['carrinho'] as $id_product => $quantidade) {
            $sql = "INSERT INTO tb_itens_request (id_request, id_product, id_user, quantity_itens_requested) VALUES ($id_request, $id_product, $id_usuario,  $quantidade)";
            $conecta->query($sql);
        }


        $sql = "UPDATE tb_request SET request_total_value = (
            SELECT SUM(quantity_itens_requested * product_unit_price)
            FROM tb_itens_request ir
            INNER JOIN tb_product p ON ir.id_product = p.id_product
            WHERE ir.id_request = $id_request
        ) WHERE id_request = $id_request";
        $conecta->query($sql);


        $conexao->desconectar();
    }

    public function atualizarInformacoesUsuario($user_id, $user_name, $email, $user_CEP)
    {
        $sql = "UPDATE `tb_user` SET"
            . " `user_name` = '$user_name', "
            . "`email` = '$email', "
            . "`user_CEP` = '$user_CEP' "
            . "WHERE `usuario`.`id_user` = $user_id;";
        $this->executarSQL($sql, "alteração");
    }

    public function buscarTotalPrice()
    {


        $teste = $_SESSION['usuario'];

        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT
        r.id_request AS id_do_pedido,
        r.request_total_value AS Valor_Total_Do_Pedido,
        p.product_name AS Nome_Do_Produto,
        ir.quantity_itens_requested AS Quantidade_pedida_produto,
        p.product_description AS Descrição_produto,
        ir.id_itens_request AS ID_Do_Item,
        p.id_product AS ID_Do_Produto,
        p.product_unit_price AS Preço_Unitário,
        ir.quantity_itens_requested * p.product_unit_price AS Valor_Do_Item,
        SUM(ir.quantity_itens_requested * p.product_unit_price) OVER () AS Total_Do_Pedido
    FROM
        tb_request r
    INNER JOIN
        tb_itens_request ir ON r.id_request = ir.id_request
    INNER JOIN
        tb_product p ON ir.id_product = p.id_product
    WHERE
        r.id_user = ir.id_user
        AND r.id_request = (
            SELECT id_request
            FROM tb_request
            WHERE id_user = $teste
            ORDER BY time_do_pedido DESC
            LIMIT 1
        );";

        $resultado = $conecta->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $var = $linha['Total_Do_Pedido'];

            }
            return $var;

        }


        $conexao->desconectar();

    }

    public function pegarNome()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $teste = $_SESSION['usuario'];

        $sql = "SELECT user_name FROM TB_USER WHERE ID_USER = $teste";
        $resultado = $conecta->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $var = $linha['user_name'];
            }

            return $var;
        }

        $conexao->desconectar();
    }

    public function pegarCEP()
    {

        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $teste = $_SESSION['usuario'];

        $sql = "SELECT user_CEP FROM TB_USER WHERE ID_USER = $teste";
        $resultado = $conecta->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $var = $linha['user_CEP'];
            }

            return $var;
        }

        $conexao->desconectar();
    }

    public function pegarEnderecoPorCEP()
    {
        $usuario = new Actions();
        $cep = $usuario->pegarCEP();
        $cep = str_replace('-', '', $cep); // Remove qualquer hífen do CEP


        if (empty($cep)) {
            return "CEP VAZIO";
        } else {
            $url = "https://viacep.com.br/ws/$cep/json/";



            $http_response = get_headers($url, 1);

            if (strpos($http_response[0], '400 Bad Request') !== false) {
                throw new Exception("Esse CEP é invalido, Por gentileza refaça com um valido!");
            } else {
                $json = file_get_contents($url);

                if ($json === false) {
                    return null; // Erro na solicitação
                } else {


                    $endereco = json_decode($json);

                    // Analisa o JSON retornado
                    $endereco = json_decode($json);

                    if (isset($endereco->erro)) {
                        return "CEP não encontrado"; // 
                    } else {

                        if ($endereco) {
                            return "Logradouro: " . $endereco->logradouro . ", <br>" .
                                "Bairro: " . $endereco->bairro . ", <br>" .
                                "Cidade: " . $endereco->localidade . ", <br>" .
                                "Estado: " . $endereco->uf . "<br>";
                        } else {
                            echo "CEP não encontrado ou houve um erro na solicitação.";
                        }
                    }
                }
            }
        }
    }

    public function alterar_Nome_Usuario($nome)
    {
        $id = $_SESSION['usuario'];
        $sql = "UPDATE `tb_user` SET"
            . " `user_name` = '$nome'"
            . "WHERE `id_user` = $id;";
        $this->executarSQL($sql, "alteração");
    }
    public function alterar_Email($email)
    {
        $id = $_SESSION['usuario'];
        $sql = "UPDATE `tb_user` SET"
            . " `email` = '$email'"
            . "WHERE `id_user` = $id;";
        $this->executarSQL($sql, "alteração");
    }
    public function alterar_CEP_Usuario($cep)
    {
        $id = $_SESSION['usuario'];
        $sql = "UPDATE `tb_user` SET"
            . " `user_CEP` = '$cep'"
            . "WHERE `id_user` = $id;";
        $this->executarSQL($sql, "alteração");
    }

    public function cancelarPedido()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $id_usuario = $_SESSION['usuario'];
        $sql = "SELECT MAX(id_request) as ultimo_pedido FROM tb_request where id_user = '$id_usuario'";
        $resultado = $conecta->query($sql);

        if ($linha = $resultado->fetch_assoc()) {
            $id_ultimo_pedido = $linha['ultimo_pedido'];
            $sql = "DELETE FROM tb_itens_request WHERE id_request = '$id_ultimo_pedido';";
            $conecta->query($sql);
            $sql = "DELETE FROM tb_request WHERE id_request = '$id_ultimo_pedido';";
            $this->executarSQL($sql, "Cancelamento feito");
            echo "Por favor clique no botao de Pagina inicial";
        }
        $conexao->desconectar();

    }



    public function pegarPedidos()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        if (!isset($_SESSION['usuario'])) {
            header('Location: login.php');
        } else {
            $id_usuario = $_SESSION['usuario'];
            $sql = "SELECT 
        R.id_request, 
        R.request_total_value, 
        GROUP_CONCAT(P.product_name) AS product_names,
        R.request_total_value
    FROM 
        tb_request R
    INNER JOIN 
        tb_itens_request IR ON R.id_request = IR.id_request
    INNER JOIN 
        tb_product P ON IR.id_product = P.id_product
    WHERE 
        R.id_user = $id_usuario
    GROUP BY R.id_request";
            $resultado = $conecta->query($sql);

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo '
            <div class="card mb-3" style="max-width: 450px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body mg-right-auto">
                              <h5 class="card-title"> Numero do pedido: ' . $linha['id_request'] . '</h5>
                            <br>
                            <h5 class="card-text">Produtos existentes nele: ' . $linha['product_names'] . '</h5>
                            <br>
                            <h5 class="card-text"> Valor do pedido: R$ ' . $linha['request_total_value'] . '</h5>
                        </div>
                        <a class="btn btn-outline-primary" href="visualizacaoPedido.php?id= ' . $linha['id_request'] . '">Conferir pedido</a>
                    </div>
                </div>
            </div>
            ';

                }
            } else {
                echo "<h2>Nenhum pedido foi feito</h2>";
            }

            $conexao->desconectar();
        }
    }

    public function buscarPedidoId($id)
    {

        $var = 0;
        $teste = $_SESSION['usuario'];

        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();



        $sql = "SELECT p.product_img, 
        r.id_request AS id_do_pedido,
        r.request_total_value AS Valor_Total_Do_Pedido,
        p.product_name AS Nome_Do_Produto,
        ir.quantity_itens_requested AS Quantidade_pedida_produto,
        p.product_description AS Descrição_produto,
        ir.id_itens_request AS ID_Do_Item,
        p.id_product AS ID_Do_Produto,
        p.product_unit_price AS Preço_Unitário,
        ir.quantity_itens_requested * p.product_unit_price AS Valor_Do_Item,
        SUM(ir.quantity_itens_requested * p.product_unit_price) OVER () AS Total_Do_Pedido
    FROM
        tb_request r
    INNER JOIN
        tb_itens_request ir ON r.id_request = ir.id_request
    INNER JOIN
        tb_product p ON ir.id_product = p.id_product
    WHERE
 r.id_request = $id;";

        $resultado = $conecta->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {

                echo '
                <div class="card mb-3 " style="max-width: 540px; ">
                    <div class="row g-0 ">
                        <div class="col-md-4">
                        ' . "<img class='card-img-to custom-image2' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['Nome_Do_Produto'] . "' />" . '
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">' . $linha['Nome_Do_Produto'] . '</h2>
                                <h3 class="card-text"> Preço: R$ ' . $linha['Preço_Unitário'] . '</h3>
                                <h4 class="card-text"> Quantidade: ' . $linha['Quantidade_pedida_produto'] . '</h4>
                                <h6 class="card-text">Descrição: ' . $linha['Descrição_produto'] . '</h6>
                                
                            </div>
                        </div>
                    </div>
                </div>

                ';

                $var = $linha['Total_Do_Pedido'];

            }
            echo "<h3> Valor Total: R$: " . $var . "</h3>";

        }


        $conexao->desconectar();
    }

    public function buscarTotalPriceEsp()
    {

        $teste = $_SESSION['usuario'];

        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT
        r.id_request AS id_do_pedido,
        r.request_total_value AS Valor_Total_Do_Pedido,
        p.product_name AS Nome_Do_Produto,
        ir.quantity_itens_requested AS Quantidade_pedida_produto,
        p.product_description AS Descrição_produto,
        ir.id_itens_request AS ID_Do_Item,
        p.id_product AS ID_Do_Produto,
        p.product_unit_price AS Preço_Unitário,
        ir.quantity_itens_requested * p.product_unit_price AS Valor_Do_Item,
        SUM(ir.quantity_itens_requested * p.product_unit_price) OVER () AS Total_Do_Pedido
    FROM
        tb_request r
    INNER JOIN
        tb_itens_request ir ON r.id_request = ir.id_request
    INNER JOIN
        tb_product p ON ir.id_product = p.id_product
    WHERE
        r.id_user = ir.id_user
        AND r.id_request = (
            SELECT id_request
            FROM tb_request
            WHERE id_user = $teste
            ORDER BY time_do_pedido DESC
            LIMIT 1
        );";

        $resultado = $conecta->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $var = $linha['Total_Do_Pedido'];

            }

            echo "Total pedido: " . $var;
        }


        $conexao->desconectar();


    }

    public function buscarProdutosClassCorda()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_img, product_name, product_unit_price FROM tb_product WHERE product_category LIKE 'C';";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                //echo '<h3>' . $linha['product_name'] . '</h3> <br>' . $linha['product_unit_price'] . '<br>'. "<img class='card-img-to' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />". '<br>';
                echo '
                <div class="card" style="width: 18rem;">
                    ' . "<img class='card-img-to custom-image' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />" . '
                    <div class="card-body"
                        <h1 class="card-title"><strong>' . $linha['product_name'] . '</strong> </h1>
                        <p class="card-text">' . $linha['product_unit_price'] . '</p>
                        <a href="product.php?id=' . $linha['id_product'] . '"class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
                
                ';


            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }
    public function buscarProdutosClassSopro()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_img, product_name, product_unit_price FROM tb_product WHERE product_category LIKE 'S';";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                //echo '<h3>' . $linha['product_name'] . '</h3> <br>' . $linha['product_unit_price'] . '<br>'. "<img class='card-img-to' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />". '<br>';
                echo '
                <div class="card" style="width: 18rem;">
                    ' . "<img class='card-img-to custom-image' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />" . '
                    <div class="card-body"
                        <h1 class="card-title"><strong>' . $linha['product_name'] . '</strong> </h1>
                        <p class="card-text">' . $linha['product_unit_price'] . '</p>
                        <a href="product.php?id=' . $linha['id_product'] . '"class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
                
                ';


            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }

    public function buscarProdutosClassEletrico()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_img, product_name, product_unit_price FROM tb_product WHERE product_category LIKE 'E';";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                //echo '<h3>' . $linha['product_name'] . '</h3> <br>' . $linha['product_unit_price'] . '<br>'. "<img class='card-img-to' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />". '<br>';
                echo '
                <div class="card" style="width: 18rem;">
                    ' . "<img class='card-img-to custom-image' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />" . '
                    <div class="card-body"
                        <h1 class="card-title"><strong>' . $linha['product_name'] . '</strong> </h1>
                        <p class="card-text">' . $linha['product_unit_price'] . '</p>
                        <a href="product.php?id=' . $linha['id_product'] . '"class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
                
                ';


            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }

    public function buscarProdutosClassPercussao()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_img, product_name, product_unit_price FROM tb_product WHERE product_category LIKE 'P';";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                //echo '<h3>' . $linha['product_name'] . '</h3> <br>' . $linha['product_unit_price'] . '<br>'. "<img class='card-img-to' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />". '<br>';
                echo '
                <div class="card" style="width: 18rem;">
                    ' . "<img class='card-img-to custom-image' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />" . '
                    <div class="card-body"
                        <h1 class="card-title"><strong>' . $linha['product_name'] . '</strong> </h1>
                        <p class="card-text">' . $linha['product_unit_price'] . '</p>
                        <a href="product.php?id=' . $linha['id_product'] . '"class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
                
                ';


            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }

    public function buscarProdutosClassScores()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_img, product_name, product_unit_price FROM tb_product WHERE product_category LIKE 'L';";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                //echo '<h3>' . $linha['product_name'] . '</h3> <br>' . $linha['product_unit_price'] . '<br>'. "<img class='card-img-to' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />". '<br>';
                echo '
                <div class="card" style="width: 18rem;">
                    ' . "<img class='card-img-to custom-image' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />" . '
                    <div class="card-body"
                        <h1 class="card-title"><strong>' . $linha['product_name'] . '</strong> </h1>
                        <p class="card-text">' . $linha['product_unit_price'] . '</p>
                        <a href="product.php?id=' . $linha['id_product'] . '"class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
                
                ';


            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }
    public function buscarProdutosClassAcessorios()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_img, product_name, product_unit_price FROM tb_product WHERE product_category LIKE 'A';";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                //echo '<h3>' . $linha['product_name'] . '</h3> <br>' . $linha['product_unit_price'] . '<br>'. "<img class='card-img-to' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />". '<br>';
                echo '
                <div class="card" style="width: 18rem;">
                    ' . "<img class='card-img-to custom-image' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />" . '
                    <div class="card-body"
                        <h1 class="card-title"><strong>' . $linha['product_name'] . '</strong> </h1>
                        <p class="card-text">' . $linha['product_unit_price'] . '</p>
                        <a href="product.php?id=' . $linha['id_product'] . '"class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
                
                ';


            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }

    public function buscarProdutosClassPianos()
    {
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_img, product_name, product_unit_price FROM tb_product WHERE product_category LIKE 'T';";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows > 0) {
            // saída dos dados
            while ($linha = $resultado->fetch_assoc()) {
                //echo '<h3>' . $linha['product_name'] . '</h3> <br>' . $linha['product_unit_price'] . '<br>'. "<img class='card-img-to' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />". '<br>';
                echo '
                <div class="card" style="width: 18rem;">
                    ' . "<img class='card-img-to custom-image' src='imgs/" . $linha['product_img'] . "' alt='" . $linha['product_name'] . "' />" . '
                    <div class="card-body"
                        <h1 class="card-title"><strong>' . $linha['product_name'] . '</strong> </h1>
                        <p class="card-text">' . $linha['product_unit_price'] . '</p>
                        <a href="product.php?id=' . $linha['id_product'] . '"class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
                
                ';


            }
        } else {
            echo "0 results";
        }

        $conexao->desconectar();
    }

    public function buscarTotalPriceIdPedido($Id)
    {

        $teste = $_SESSION['usuario'];

        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT
        r.id_request AS id_do_pedido,
        r.request_total_value AS Valor_Total_Do_Pedido,
        p.product_name AS Nome_Do_Produto,
        ir.quantity_itens_requested AS Quantidade_pedida_produto,
        p.product_description AS Descrição_produto,
        ir.id_itens_request AS ID_Do_Item,
        p.id_product AS ID_Do_Produto,
        p.product_unit_price AS Preço_Unitário,
        ir.quantity_itens_requested * p.product_unit_price AS Valor_Do_Item,
        SUM(ir.quantity_itens_requested * p.product_unit_price) OVER () AS Total_Do_Pedido
    FROM
        tb_request r
    INNER JOIN
        tb_itens_request ir ON r.id_request = ir.id_request
    INNER JOIN
        tb_product p ON ir.id_product = p.id_product
    WHERE
     r.id_request = $Id;";

        $resultado = $conecta->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $var = $linha['Total_Do_Pedido'];

            }

            return $var;
        }


        $conexao->desconectar();


    }

    public function buscarQuantidadeProduto($id)
    {

        $teste = $_SESSION['usuario'];
        $var = 0;
        $conexao = new ConexaoBD();
        $conecta = $conexao->conectar();

        $sql = "SELECT id_product, product_quantity_stock FROM tb_product where id_product = '$id'";

        $resultado = $conecta->query($sql);

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                (int) $var = $linha['product_quantity_stock'];

            }


        }



        $conexao->desconectar();
        return $var;


    }




}





