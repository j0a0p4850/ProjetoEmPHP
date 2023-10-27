<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "Style.css">
    <title>Minha Loja Online</title>
</head>
<body>

    <div class="navbar">
        <h1>Lojinha de musica</h1>
        <form id="search-form" >
            <input type="text" id="search-bar" placeholder="Buscar" name="nome" >
            <input type="submit" value="Buscar">
            <a href="perfil_Page.php"><input type="button" value="Perfil"></a>
            <a href="carrinho.php"><input type="button" value="Carrinho Usuario"></a>
        </form>
    <div>
            <?php
                include 'Main.php';
                $usuario = new Actions();
                if(!isset($_GET['nome'])){
                    
                }
           
                else{
                        $nome = $_GET['nome'];
                        $usuario->buscarNomeProduto($nome);  
                }
               
           
            ?>
        </div>
    </div>

   
    <?php
           $usuario = new Actions();
           $usuario -> buscar2();
        ?>
   

        
    </div>

    <div class="footer">
        &copy; 2023 Lojinha de musica. Todos os direitos reservados.
    </div>


</body>
</html>
