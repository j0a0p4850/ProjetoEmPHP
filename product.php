<?php

  include 'Main.php';
  $usuario = new Actions();
  if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $usuario->buscarNome($product_id);
   
  
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $usuario->avaliacoes($product_id);
    
    
} else {
    echo "ID do produto não especificado.";
}



           
        ?>