<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "Style.css">
    <title>Minha Loja Online</title>
   
</head>
<body>
    <!-- Barra de navegação -->
    <div class="navbar">
        <h1>Minha Loja Online</h1>
        <input type="text" placeholder="Buscar...">
        <button>Buscar</button>
    </div>

    <!-- Cards de produtos -->
    <div class="card">
         <?php
        include "Main.php";
            
                $usuario = new Actions();
                $usuario -> buscar2();
           
        ?>
        
        
    </div>


    

    <!-- Rodapé -->
    <div class="footer">
        &copy; 2023 Minha Loja Online. Todos os direitos reservados.
    </div>
</body>
</html>
