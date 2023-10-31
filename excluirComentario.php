<?php
include 'Main.php';
$usuario = new Actions();

if (isset($_GET['comentario_id'])) {
    $comentarioId = $_GET['comentario_id']; 
    $usuario->excluirComentario($comentarioId); 

    
    header('Location: index.php?id=' . $product_id);
} else {
    echo "ID do comentário não especificado.";
}
?>

