<?php
include "Main.php";
session_start();


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

$totalCarrinho = 0; // Inicialize o valor total do carrinho

$usuario = new Actions();
foreach ($_SESSION['carrinho'] as $id => $qtd) {
    $var = $usuario->buscarPreco($id);
    (double)$totalCarrinho += (double)$var; // Acumule o valor retornado por cada chamada a buscarPreco
    echo "<br>";
    echo '<a href ="?acao=del&id=' . $id . '">Remover</a>';
    echo "<br>";
   
}

echo '<a href="index.php">Pag</a>';
echo "<br>";
// Exiba o valor total após o loop
echo "Valor total do carrinho: $" . number_format($totalCarrinho, 2);


?>