<?php
include 'Main.php';
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
$usuario = new Actions();
$user_id = $_SESSION['usuario'];
$usuario->buscarUsuarioPorId($user_id);
echo '<a href="atualizarDadosPerfil.php">Atualizar Dados</a>';
echo "<br>";
echo '<a href="logout.php">Logout</a>';



?>