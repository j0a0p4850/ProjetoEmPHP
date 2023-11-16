<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Maestro Academy - Produtos</title>
</head>

<body>


<nav class="navbar navbar-expand-lg bg-body-tertiary ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Maestro Academy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Pagina inicial</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Itens da loja
          </a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="pagCordas.php">Instrumentos de Cordas</a></li>
              <li><a class="dropdown-item" href="pagPercussao.php">Instrumentos de Percussão</a></li>
              <li><a class="dropdown-item" href="pagSopro.php">Instrumento de Sopro</a></li>
              <li><a class="dropdown-item" href="pagEletricos.php">Instrumentos de Eletrico</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="pagScores.php">Partituras e Livros</a></li>
            </ul>
        </li>
        
      </ul>
      <li class="nav-item">
        <a href="perfil_Page.php"><input type="button" value="Perfil" class="btn btn-outline-success"></a>
            <a href="carrinho.php"><input type="button" value="Carrinho Usuario" class="btn btn-outline-success"></a>
            <a href="pagPedidos.php"><input type="button" value="Pedidos" class="btn btn-outline-success"></a>
        </li>
    </div>
  </div>
</nav>

    <div class="container">

        <?php
        include 'Main.php';
        session_start();
        $usuario = new Actions();
        if (!isset($_SESSION['usuario'])) {

            if (isset($_GET['id'])) {
                $product_id = $_GET['id'];
                $usuario->buscarNome($product_id);
                echo '<a  class="btn btn-dark" href="index.php">Voltar Pagina inicial</a>';

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
            }


        } else {
            $id_user = $_SESSION['usuario'];


            if (isset($_GET['id'])) {
                $product_id = $_GET['id'];
                $usuario->buscarNome($product_id);
                echo '<a  class="btn btn-dark" href="index.php">Voltar Pagina inicial</a>';

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

                echo '<div class="form-floating">
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comentario"></textarea>
    <label for="floatingTextarea2">Insira seu comentário</label>
  </div>';

                // echo "<textarea  placeholder='Insira seu comentário'></textarea>";
                echo "<input class='btn btn-primary me-md-2' type='submit' value='Enviar Comentário'>";
                echo "</form";
            } else {
                echo "ID do produto não especificado.";
            }

        }
        ?>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#enviar-comentario').click(function () {
                    // Código para enviar comentários (já mencionado anteriormente)
                });

                // Carregar comentários iniciais
                $.get('carregar_comentarios.php', { product_id: <?php echo $product_id; ?> }, function (data) {
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