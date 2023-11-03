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
            echo '<form action=" " method="POST" >
            <lable>Editar Nome</lable>
            <input type="text" name="nome">
            <input type="submit" value="Editar Nome">
    </form>
';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $usuario-> alterar_Nome_Usuario($nome);
    }
            break;
        case 'email':
            echo '<form action=" " method="POST">
                    <lable>Editar Email</lable>
                    <input type="text" name="email">
                    <input type="submit" value="Editar Email">
            </form>';

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = $_POST['email'];
                $usuario-> alterar_Email($email);
            }
            break;
            case 'cep':
                echo '<form action=" " method="POST">
                        <label>Editar CEP</label>
                        <input type="text" name="CEP" id="CEP" pattern="\d{5}-\d{3}" title="Digite um CEP válido no formato 00000-000" required>
                        <input type="submit" value="Editar CEP">
                      </form>';
            
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
