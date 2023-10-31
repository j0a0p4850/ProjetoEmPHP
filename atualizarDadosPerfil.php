<?php
include 'Main.php';
session_start();
$usuario = new Actions();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['usuario'];

if (isset($_GET['campo'])) {
    $campo = $_GET['campo'];

    switch ($campo) {
        case 'nome':
           echo "Ta indo pra nome";
            break;
        case 'email':
            echo "Ta indo pra email";
            break;
        case 'cep':
            echo "Ta indo pra cep";
            break;
        default:
            
            break;
    }
}
?>
