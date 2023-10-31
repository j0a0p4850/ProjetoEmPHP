<?php
include 'Main.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new Actions();
    $user_id = $_SESSION['usuario'];

    
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $user_CEP = $_POST['user_CEP'];

    
    $usuario->atualizarInformacoesUsuario($user_id, $user_name, $email, $user_CEP);

    
    header('Location: perfil.php');
} else {
   
    header('Location: atualizarDadosPerfil.php');
}
?>
