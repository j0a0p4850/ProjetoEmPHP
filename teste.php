<?php
include "Main.php";
$usuario = new Actions();
// Dados a serem paginados (pode ser obtido do banco de dados)
$data = range(1, 100);

// Número de itens por página
$itemsPerPage = 10;

// Página atual
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$products = $usuario->buscarProdutosClassCorda();
// Calcula o índice inicial e final dos itens a serem exibidos
$start = ($page - 1) * $itemsPerPage;
$end = $start + $itemsPerPage;

// Exibe os itens na página
echo "<div class='products-container'>";
for ($i = $start; $i < $end && $i < count($data); $i++) {
    echo $products[$i];
}
echo "</div>";

// Exibe a navegação da página
$totalPages = ceil(count($data) / $itemsPerPage);
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page={$i}'>{$i}</a> ";
}
?>
