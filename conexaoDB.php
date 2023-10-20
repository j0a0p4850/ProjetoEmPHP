<?php
class ConexaoBD {
    private $nome_servidor = "localhost";
    private $nome_usuario = "myuser";
    private $senha = "mysql123";
    private $banco = "db_loja_site";
    private $porta = "3306";
    private $conecta;
    
    function __construct() {
        
    }

    public function conectar() {
        $this->conecta = new mysqli($this->nome_servidor, $this->nome_usuario, $this->senha, $this->banco, $this->porta);
        // Verificar Conexão
        if ($this->conecta->connect_error) {
            die("Conexão falhou: " . $this->conecta->connect_error."<br>");
        }
        return $this->conecta;
    }
    
    public function desconectar() {
        $this->conecta->close();
    }
    
    public function getConecta() {
        return $this->conecta;
    }

}