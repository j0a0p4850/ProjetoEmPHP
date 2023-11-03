<?php
session_start();
include "main.php";

echo "Parte basica da compra feita!";
echo "Pagina de boleto!";



$usuario = new Actions();

$usuario->buscarTeste();

echo '<a href="boletophp-master/boleto_bradesco.php" target="_blank">Gerar Boleto</a>';
echo " <br>";
echo " <br>";
echo '<a href="pagCartao" target="_blank">Pagar com cartao</a>';
echo " <br>";
echo " <br>";
echo '<a href="index.php" target="_blank">Pagina inicial</a>';

?>