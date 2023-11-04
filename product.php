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


    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>


