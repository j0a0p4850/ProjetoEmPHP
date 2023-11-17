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
        <img src="imgs/cordas3.jpeg" class="card-img-top" alt="...">
        <div class="card-body ">
          <h5 class="card-title">Cordas</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagCordas.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="imgs/sopro2.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Sopro</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagSopro.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="imgs/eletronicos.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Eletricos</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagEletricos.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="imgs/percussao.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Percussão</h5>
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
        <img src="imgs/partitura.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Partituras E Livros</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="pagScores.php" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="imgs/acessorios.jpg" class="card-img-top" alt="...">
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
        <p>Benefícios para a saúde: Ouvir música tem sido associado a uma redução do estresse e da ansiedade. Estudos mostram que a música pode ajudar a diminuir a pressão arterial e aumentar a liberação de endorfinas, melhorando o humor e bem-estar.</p>
                <p>Desenvolvimento cognitivo: A prática musical está ligada a melhorias na memória, concentração e habilidades motoras. Tocar um instrumento pode aprimorar significativamente diversas habilidades mentais.</p>
                <p>Expressão emocional: A música é uma forma poderosa de expressar emoções complexas. Ela pode transmitir sentimentos profundos, sejam alegres, tristes ou reflexivos, conectando-se intimamente com as experiências humanas.</p>
                <p>Cultura e sociedade: A música desempenha um papel vital em várias culturas ao redor do mundo. Ela é utilizada em celebrações, rituais e expressões artísticas, sendo um componente fundamental na identidade cultural de diferentes povos.</p>
                <p>Aproveitamento do tempo: Aprender a tocar um instrumento musical ou explorar diferentes gêneros musicais é uma maneira enriquecedora de passar o tempo. Além de entretenimento, a música pode estimular a criatividade e proporcionar um hobby gratificante.</p>
                <p>Terapia sonora: A musicoterapia é utilizada como um método terapêutico para ajudar na recuperação de pacientes com condições físicas e mentais. Ela pode auxiliar na redução da dor, melhoria do sono e na reabilitação após lesões.</p>
                <p>Diversidade cultural: A diversidade na música é imensa, com gêneros, instrumentos e estilos musicais provenientes de diferentes partes do mundo. Isso reflete a riqueza e complexidade das culturas humanas.</p>
                <p>Efeitos no cérebro: Ouvir música ativa áreas do cérebro relacionadas à recompensa, memória e emoção. Ela pode estimular a liberação de dopamina, neurotransmissor associado ao prazer e motivação.</p>
                <p>Música na aprendizagem: Estudos sugerem que a exposição à música desde a infância pode melhorar o desempenho acadêmico, especialmente em áreas como matemática e linguagem, ao aprimorar habilidades de raciocínio.</p>
                <p>Impacto social: A música tem sido usada como ferramenta para promover mudanças sociais e conscientização sobre questões importantes. Ela pode transmitir mensagens poderosas e unir comunidades para causas comuns.</p>
                <p>Conexões universais: Independentemente da língua ou cultura, a música é uma linguagem universal. Ela pode criar laços entre pessoas de diferentes origens, conectando-se através de emoções e experiências compartilhadas.</p>
          </div>
      </div>
    </div>
  </article>



  </div>

  <div class="footer">
    &copy; 2023 Maestro Academy. Todos os direitos reservados.
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