<?php
session_start();
session_destroy(); // Destrua a sessão
header('Location: login.php'); // Redirecione para a página de login ou para onde desejar
exit();
?>
