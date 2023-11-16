<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    .card-img-top {
      height: 200px;
      /* Defina a altura desejada para as imagens */
      object-fit: cover;
      /* Isso ajuda a manter a proporção da imagem */
    }
    .classe{
      margin-left: 30rem;
    }
    .pa {
      text-align: center;
      width: 50%;
      margin-left: 20rem;
    }
  </style>


  <title>Maestro Academy - Pagina inicial</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Maestro Academy</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
              <li><a class="dropdown-item" href="pagAcessorios.php">Acessorios</a></li>
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


  </div>

  </div>
  <div class="container">
    <div class="d-flex justify-content-evenly flex-wrap">
      <div class="card" style="width: 18rem;">
        <img src="imgs/cordas.webp" class="card-img-top" alt="...">
        <div class="card-body ">
          <h5 class="card-title">Cordas</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagCordas.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="imgs/sopro.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Sopro</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagSopro.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="imgs/elect.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Eletricos</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagEletrico.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="imgs/piano.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Percussão Harmonia</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagPercussao.php" class="btn btn-primary">Pagina de Percussão</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="imgs/piano.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Pianos</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagPiano.php" class="btn btn-primary">Pagina de pianos</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="imgs/piano.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Partituras E Livros</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagScore.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="imgs/piano.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Acessorios</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagAcessorios.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      
    </div>
  </div>

  <article class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <h3 class="text-center">O que deseja saber sobre música?</h3>
        <div class="text-center ">
        <p>Lorem ipsum dolor sit amet. 33 assumenda dolorem aut dolores quasi et esse odio qui doloremque neque et
          blanditiis laudantium et cupiditate incidunt non nisi impedit. Est doloribus ratione ex consequatur voluptatem
          a consequatur corporis ut praesentium fuga qui saepe natus vel consequuntur odit eum enim vitae. Quo galisum
          rerum vel nihil voluptates vel molestias reprehenderit. Et dolores ipsam et culpa dolore non dignissimos
          molestias. </p>
        <p>Et similique quibusdam est earum voluptatem At alias veniam vel nostrum galisum sit ullam laboriosam. Eum
          autem voluptas ad natus dolorum et recusandae dolorum et quae quisquam eos dolor delectus sit dolores repellat
          non quia aperiam? </p>
        <p>Ut quis culpa sed omnis ipsa eos nobis animi. Quo dolor voluptatem ex iste accusantium sit dignissimos
          doloribus aut iure placeat. Et corrupti ipsum aut nisi assumenda et rerum doloribus. Ut libero fugit cum
          dolores distinctio est nihil sint. </p>
        <p>Et numquam praesentium sed modi nisi et voluptatem accusamus eum repellendus velit. Sit reprehenderit totam
          et velit libero rem fugiat facere ut praesentium totam qui necessitatibus minima ut alias dolores id cumque
          minus. </p>
        <p>33 excepturi autem cum galisum atque non eius adipisci ut minus consectetur cum inventore possimus. Qui velit
          nemo et quod provident et molestias exercitationem. </p>
        <p>Ut mollitia molestiae eum ipsa laboriosam sed perferendis internos sed accusamus nostrum ab explicabo galisum
          eos tempore dicta rem harum cumque. Et rerum suscipit vel deleniti ipsum et pariatur dolore et Quis iure vel
          itaque enim et beatae necessitatibus ut recusandae amet. Sed quae necessitatibus eum autem explicabo a
          aspernatur quia. Et laborum molestiae 33 commodi saepe aut cumque debitis est laboriosam internos eum
          doloremque molestiae! </p>
        <p>Non sunt aspernatur aut nisi omnis sed sunt corporis qui excepturi ducimus id quisquam quidem et autem dolor.
          Aut excepturi enim est quisquam voluptas qui inventore animi ab nostrum neque eos corrupti alias. Ut dolorum
          quam et cumque voluptates ut mollitia cumque et nihil voluptatem. </p>
        <p>Cum omnis error et fuga quia aut aliquam voluptas aut error sint ut animi delectus. Sed sapiente corporis et
          accusamus perspiciatis quo reiciendis laudantium qui odio tempora qui nihil rerum At voluptates voluptatibus
          ut veritatis quos. </p>
        <p>Ea illum fuga sit facere natus At maxime temporibus eos maxime sapiente quo nemo similique non illo nobis est
          voluptate dolorum. Et voluptates voluptatibus est minus voluptas sit eveniet quis in voluptatem voluptatem aut
          laboriosam nesciunt. </p>
          </div>
      </div>
    </div>
  </article>



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