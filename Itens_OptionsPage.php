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

<nav class="navbar navbar-expand-lg bg-body-tertiary ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Maestro Academy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Pagina inicial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Itens da loja
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Instrumentos de Cordas</a></li>
            <li><a class="dropdown-item" href="#">Instrumentos de percussão</a></li>
            <li><a class="dropdown-item" href="#">Instrumento de Sopro</a></li>
            <li><a class="dropdown-item" href="#">Instrumentos de Metal</a></li>
            <li><a class="dropdown-item" href="#">Instrumentos de Madeira</a></li>
            <li><a class="dropdown-item" href="#">Instrumentos de Eletrico</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
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




        


        





    </div>

    <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imgs/cordas.webp" class="d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="h5-index-page">First slide label</h5>
        <p class="p-index-page">Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imgs/piano.jpeg" class="d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="h5-index-page">Second slide label</h5>
        <p class="p-index-page">Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imgs/guitarra_fender.png" class="d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="h5-index-page">Third slide label</h5>
        <p class="p-index-page">Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imgs/violino.jpeg" class="d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="h5-index-page">Third slide label</h5>
        <p class="p-index-page">Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <div class="container">
        <div class="d-flex justify-content-evenly flex-wrap">
            <?php
            include "Main.php";
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