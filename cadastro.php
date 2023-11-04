<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    
    <title>Cadastro</title>
    
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <form action="cadastro.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <label for="CEP">CEP:</label>
                <input type="text" id="CEP" name="CEP" required pattern="\d{4}-\d{3}">
                
            </div>
            <div class="form-group">
                <input type="submit" value="Cadastrar">
            </div>
        </form>
        <?php
           include 'Main.php';
           session_start();
           $usuario = new Actions();
           if($_SERVER["REQUEST_METHOD"]=="POST"){
            $name = $_POST['nome'];
            $email = $_POST['email'];
            $password = $_POST['senha'];
            $endereco = $_POST['CEP'];
            
           $usuario->incluir($name, $email, $password, $endereco);
           
           
           }
           
        ?>
    </div>

    <script>
        
        document.getElementById('CEP').addEventListener('input', function (e) {
            let value = e.target.value;
            value = value.replace(/\D/g, ''); 
            if (value.length > 8) {
                value = value.substring(0, 8);
            }
            if (value.length > 5) {
                value = value.substring(0, 5) + '-' + value.substring(5);
            }
            e.target.value = value;
        });
    </script>
</body>
</html>
