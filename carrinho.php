<?php
session_start();
include 'Main.php';
$usuario = new Actions();



if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['carrinho'])) {
        if (isset($_POST['prod'])) {
            foreach ($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd != 0) {
                    $_SESSION['carrinho'][$id] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }
}



if (isset($_GET['acao'])) {
    //Adicionando
    if ($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        (int) $user_id = $_SESSION['usuario'];
        if (!isset($_SESSION['carrinho'][$id])) {
            
            $_SESSION['carrinho'][$id] = 1;

        } else {


        }
    }
}






if (isset($_GET['acao'])) {
    if ($_GET['acao'] == 'del') {

        $id = intval($_GET['id']);
        $usuario = new Actions();

        if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }
} else {

}

if (isset($_GET['acao'])) {
    if ($_GET['acao'] == 'up') {
        if (is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd != 0) {
                    $_SESSION['carrinho'][$id] = $qtd;

                } else {

                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }
} else {

}
(int)$user_id = $_SESSION['usuario'];
if (isset($_GET['acao'])) {
    if ($_GET['acao'] == 'fim') {
            $usuario->incluirPedido($user_id);
            $_SESSION['carrinho'] = array();
            header('Location: pagConfirmacaoPedido.php');

    }
} else {

}

//echo $user_id;



?>


<!DOCTYPE html>
<html>

<head>
    <title>Carrinho de Compras</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-weight: bold;
            font-size: 20px;
        }

        .product {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .add-to-cart-button {
            margin-left: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            font-weight: bold;
            font-size: 20px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            font-size: 20px;

        }

        .clear-cart-button {
            background-color: goldenrod;
            color: white;
            padding: 10px 20px;
            font-size: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            font-weight: bold;
        }

        .clear-cart-button:hover {
            background-color: blue;
            color: white;
            opacity: 40%;
            transition: 0.8s;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Carrinho de Compras</h1>
        <table>

            <tbody id="cart-items"></tbody>
        </table>
        <form action="?acao=fim" method="post">
            <tbody>
                <?php

                $totalCarrinho = 0;
                if (count($_SESSION['carrinho']) == 0) {
                    echo "Não há produto no carrinho";

                    echo "<br>";
                } else {
                    foreach ($_SESSION['carrinho'] as $id => $qtd) {

                        $usuario->buscarNoCarrinho($id);
                        $var = $usuario->buscarPreco($id);
                        $valorTotalItem = (double) $var * (int) $qtd;
                        $totalCarrinho += $valorTotalItem;
                        // (double)$totalCarrinho += (double)$var;
                        echo "<br>";
                        echo "Quantidade: <input type='number' name='prod[" . $id . "]' value='" . $qtd . "' onchange='validarQuantidade(this);'>";
                        echo '<br>';
                        echo '<br>';
                        echo '<a href ="?acao=del&id=' . $id . '">Remover</a>';
                        echo '<br>';
                        echo '<br>';

                    }
                    echo "Valor total do carrinho: $" . number_format($totalCarrinho,2,".","") ."";
                    echo '<br>';

                 


            }


                ?>











            </tbody>
            <tfoot>


                <button class="clear-cart-button" type="submit">Atualizar Carrinho</button>

                <td colspan="5"><a href="index.php"><input class="clear-cart-button" type="button"
                            value="Continuar comprando"></a></td>
                <td colspan="5"><button class="clear-cart-button" type="submit">Finalizar</button></td>
                </tr>
            </tfoot>


        </form>
    </div>

    <script>
        function validarQuantidade(input) {
            if (input.value < 0) {
                input.value = 0;
            }
        }
    </script>




</body>

</html>