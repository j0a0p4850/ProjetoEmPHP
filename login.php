<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maestro Academy - Login</title>
    <link rel="stylesheet" href="Style.css">
    
</head>
<body>
    
    <div class="container">
        <h2>Login</h2>
        
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <h7>Ainda não conta? <a href="cadastro.php" class="cadastro_link">Clique aqui</a></h7>
            </div>
            <div class="form-group">
                <input type="submit" value="Entrar">
            </div>
        </form>

        <?php
            include 'Main.php';
            session_start();
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $usuario = new Actions();
                if($id_usuario = $usuario->logar($email, $senha)){
                    $_SESSION['usuario'] = $id_usuario;
                    header('Location: index.php');
                    
                   
                    
                } else {
                    echo 'Usuário ou senha inválidos';
                }
                
            }
        ?>
        
        
    </div>
</body>
</html>
