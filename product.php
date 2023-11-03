<?php
include 'Main.php';
session_start();
$usuario = new Actions();
$id_user = $_SESSION['usuario'];


if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $usuario->buscarNome($product_id);
    echo '<a href="index.php">Voltar Pagina inicial</a>';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comentario'])) {
        $comentario = $_POST['comentario'];
        
        if (!empty($comentario)) {
            // Insere o comentário no banco de dados
            $usuario->inserirComentario($product_id, $comentario, $id_user);
            
            // Redireciona o usuário de volta para a mesma página
            header("Location: product.php?id=$product_id");
            exit();
        } else {
            echo "O campo de comentário está vazio. Por favor, insira um comentário.";
        }
    }
    
    echo "<br>";
    echo "<br>";
    echo "<br>";
    
    $usuario->avaliacoes($product_id);
    
    // Formulário para inserir comentários
    echo "<form method='post' action=''>";
    echo "<input type='hidden' name='product_id' value='$product_id'>";
    echo "<textarea name='comentario' placeholder='Insira seu comentário'></textarea>";
    echo "<input type='submit' value='Enviar Comentário'>";
    echo "</form";
} else {
    echo "ID do produto não especificado.";
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#enviar-comentario').click(function() {
        // Código para enviar comentários (já mencionado anteriormente)
    });

    // Carregar comentários iniciais
    $.get('carregar_comentarios.php', { product_id: <?php echo $product_id; ?> }, function(data) {
        $('#comentarios').html(data);
    });

    
});
</script>
