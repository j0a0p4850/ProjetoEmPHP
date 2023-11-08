<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    
    <title>Document</title>
</head>

<body>

</body>

</html>

<?php
include 'Main.php';
session_start();
$usuario = new Actions();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['usuario'];

if (isset($_GET['campo'])) {
    $campo = $_GET['campo'];

    switch ($campo) {
        case 'nome':
         
            echo '
            <div class="container">
                <form  method="POST">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <input  type="submit" value="Atualizar Dado">
                    </div>
                </form>
            </div>';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nome = $_POST['nome'];
                $usuario->alterar_Nome_Usuario($nome);
            }
            break;
        case 'email':
           echo '
            <div class="container">
                <form  method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input  type="submit" value="Atualizar Dado">
                    </div>
                </form>
            </div>';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $usuario->alterar_Email($email);
            }
            break;
        case 'cep':
            echo '
            <div class="container">
                <form  method="POST">
                    <div class="form-group">
                        <label for="CEP">CEP:</label>
                        <input type="text" id="CEP" name="CEP" required>
                    </div>
                    <div class="form-group">
                        <input  type="submit" value="Atualizar Dado">
                    </div>
                </form>
            </div>';

            echo '<script>
                        document.getElementById("CEP").addEventListener("input", function (e) {
                            let value = e.target.value;
                            value = value.replace(/\D/g, ""); 
                            if (value.length > 8) {
                                value = value.substring(0, 8);
                            }
                            if (value.length > 5) {
                                value = value.substring(0, 5) + "-" + value.substring(5);
                            }
                            e.target.value = value;
                        });
                      </script>';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $cep = $_POST['CEP'];
                $usuario->alterar_CEP_Usuario($cep);
            }
            break;



        default:

            break;
    }
}
?>