<?php
include "main.php";
require('boleto_santander.php');
echo "Parte basica da compra feita!";
echo "Pagina de boleto!";

$usuario = new Actions();
$usuario->buscarTeste();


?>