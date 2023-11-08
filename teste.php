<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
<?php
session_start();
include "Main.php";
$usuario = new Actions();
if (isset($_GET['id'])) {
    $pedido_id = $_GET['id'];
    $usuario->buscarPedidoId($pedido_id);
} else {
    echo "Pedido não especificado. Volte e selecione um pedido para visualizar.";
}

$usuario = new Actions();

echo "<h2>Detalhes do Pedido:</h2>";

echo " <br>";
echo " <br>";
echo "<h4>Confirme a forma de pagamento desejada:</h4>";
echo '  <a class="btn btn-info" href="boletophp-master/boleto_bradesco.php" target="_blank">Gerar Boleto</a>   ';
echo '<a class="btn btn-info" href="pagCartao.php" target="_blank">Pagar com cartao</a>';
echo " <br>";
echo " <br>";
$usuario->buscarTotalPriceEsp();
echo '<br>';
echo '<form action=" " method= "post">
        <button class="btn btn-danger" type=submit>Cancelar Pedido</button>
</form>';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario->cancelarPedido();
    echo ' <br>';
    
    echo '<a class="btn btn-warning" href="index.php">Voltar para a pagina inicial</a>';
    //header("Location: .$index.php");
}

?>


</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>





