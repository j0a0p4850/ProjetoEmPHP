<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Minha Loja Online</title>
</head>

<body>

    <div class="navbar">
        <h1>Lojinha de musica</h1>
        <form id="search-form">
            <input type="text" id="search-input" placeholder="Buscar" name="nome">
            <input type="submit" value="Buscar">
            <a href="perfil_Page.php"><input type="button" value="Perfil"></a>
            <a href="carrinho.php"><input type="button" value="Carrinho Usuario"></a>
        </form>


        <?php
            include 'Main.php';
            $usuario = new Actions();
            if (!isset($_GET['nome'])) {

            } else {
                $nome = $_GET['nome'];
                $usuario->buscarNomeProduto($nome);
            }

            ?>


        





    </div>

    <div class="container">
        <div class="d-flex justify-content-evenly flex-wrap">
            <?php
            $usuario = new Actions();
            $usuario->buscar2();


            ?>
        </div>
    </div>



    </div>

    <div class="footer">
        &copy; 2023 Lojinha de musica. Todos os direitos reservados.
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const searchInput = $('#search-input');
            const searchResults = $('#search-results');

            searchInput.on('input', function () {
                const nome = searchInput.val();

                if (nome.length > 1) { // Realize a busca após 3 caracteres, por exemplo
                    $.ajax({
                        url: 'index.php',
                        method: 'GET',
                        data: { nome: nome },
                        success: function (data) {
                            searchResults.html(data);
                        },
                        error: function (error) {
                            console.error('Erro na busca: ' + error);
                        }
                    });
                } else {
                    searchResults.empty(); // Limpar resultados se a entrada for curta
                }
            });
        });
    </script>

</body>

</html>