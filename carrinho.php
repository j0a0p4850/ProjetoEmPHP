<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Maestro Academy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Pagina inicial</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Itens da loja
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="pagCordas.php">Instrumentos de Cordas</a></li>
                        <li><a class="dropdown-item" href="pagPercussao.php">Instrumentos de Percussão</a></li>
                        <li><a class="dropdown-item" href="pagSopro.php">Instrumento de Sopro</a></li>
                        <li><a class="dropdown-item" href="pagEletricos.php">Instrumentos de Eletrico</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pagScores.php">Partituras e Livros</a></li>
                    </ul>
                </li>

            </ul>
            <li class="nav-item">
                <a href="perfil_Page.php"><input type="button" value="Perfil" class="btn btn-outline-success"></a>
                <a href="carrinho.php"><input type="button" value="Carrinho Usuario"
                        class="btn btn-outline-success"></a>
                <a href="pagPedidos.php"><input type="button" value="Pedidos" class="btn btn-outline-success"></a>
            </li>
        </div>
    </div>
</nav>



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
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
} else {
    (int) $user_id = $_SESSION['usuario'];
    if (isset($_GET['acao'])) {
        if ($_GET['acao'] == 'fim') {
            $usuario->incluirPedido($user_id);
            $_SESSION['carrinho'] = array();
            header('Location: pagConfirmacaoPedido.php');

        }
    } else {

    }
}
//echo $user_id;



?>


<!DOCTYPE html>
<html>

<head>
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container_cart">
        <h1>Carrinho de Compras</h1>
        <table class="table_cart_itens">
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
                        echo "<div class= product_division>";
                        $usuario->buscar2_0($id);
                        $var = $usuario->buscarPreco($id);
                        
                        $valorTotalItem = (double) $var * (int) $qtd;
                        $totalCarrinho += $valorTotalItem;
                        

                        echo "Quantidade: <input type='number' name='prod[" . $id . "]' value='" . $qtd . "'max= 3 onchange='validarQuantidade(this);'>";
                        echo '<br>';
                        echo '<br>';
                        echo '<button type="" class="btn btn-danger"><a class="btn btn-danger" href ="?acao=del&id=' . $id . '">Remover Item</a></button>';
                        echo "</div>";
                        echo '<br>';
                        echo '<br>';
                        
                       


                    }
                    echo "Valor total do carrinho: $" . number_format($totalCarrinho, 2, ".", "") . "";
                    echo '<br>';




                }
                ?>











            </tbody>
            <tfoot>
                <button id="atualizar-carrinho" class="clear-cart-button" type="button">Atualizar Carrinho</button>
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

    <script>
        document.getElementById('atualizar-carrinho').addEventListener('click', function () {
            const quantidadeInputs = document.querySelectorAll('input[name^="prod["]');
            quantidadeInputs.forEach(function (input) {
                const id = input.name.match(/\[([0-9]+)\]/)[1];
                const novaQuantidade = parseInt(input.value, 10);

               

                console.log('ID: ' + id + ', Nova Quantidade: ' + novaQuantidade);
            });

            
        });
    </script>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>