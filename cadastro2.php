<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 500px;
    margin: 45px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

.form-group {
    margin-right: 25px;
}


.form-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10%; 
}

.half-width {
    width: calc(50% - 10px);
}

label {
    display: block;
}

input {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


    </style>
    
</head>
<body>
<div class="container">
        <h2>Cadastro</h2>
        <form id="registration-form" onsubmit="return validateForm()">
            <div class="form-row">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" required>
                </div>
                <div class="form-group">
                    <label for="confirm-senha">Confirme a Senha:</label>
                    <input type="password" id="confirm-senha" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Número de Telefone:</label>
                    <input type="text" id="telefone" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" required>
                </div>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <script>
    function validateForm() {
    var senha = document.getElementById("senha").value;
    var confirmSenha = document.getElementById("confirm-senha").value;

    if (senha !== confirmSenha) {
        alert("As senhas não coincidem. Por favor, tente novamente.");
        return false;
    }

    return true;
}

    </script>
</body>
</html>
