<?php
session_start();
include 'Main.php';
$usuario = new Actions();

if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_SESSION['carrinho'])) {
      if (isset($_POST['prod'])) {
          foreach ($_POST['prod'] as $id => $qtd) {
              $id = intval($id);
              $qtd = intval($qtd);
              if (!empty($qtd) || $qtd != 0) {
                  $_SESSION['carrinho'][$id] = $qtd;
              } else {
                  unset($_SESSION['carrinho'][$id]);
              }
          }
      }
  } 
}



if (isset($_GET['acao'])) {
  //Adicionando
  if ($_GET['acao'] == 'add') {
    $id = intval($_GET['id']);
    if (!isset($_SESSION['carrinho'][$id])) {
      $_SESSION['carrinho'][$id] = 1;
      
    } else {
      //$_SESSION['carrinho'][$id] += 1;
   
    }
  }
}



// if (isset($_GET['acao'])) {
//   //Adicionando
//   if ($_GET['acao'] == 'add') {
//     $id = intval($_GET['id']);
//     if (!isset($_SESSION['carrinho'][$id])) {
//       $_SESSION['carrinho'][$id]  = 1;
//     } else {
//       $_SESSION['carrinho'][$id]  =+ 1;
//     }
//   }
// }



  if ($_GET['acao'] == 'del') {
    
    $id = intval($_GET['id']);
    $usuario = new Actions();
    $usuario->excluirItensCarrinho($id);
    if (isset($_SESSION['carrinho'][$id])) {
      unset($_SESSION['carrinho'][$id]); 
    }
  }

  
  if ($_GET['acao'] == 'up') {
    if (is_array($_POST['prod'])) {
      foreach ($_POST['prod'] as $id => $qtd) {
        echo $qtd;
        $id = intval($id);
        $qtd = intval($qtd);
        if (!empty($qtd) || $qtd != 0) {
          $_SESSION['carrinho'][$id] = $qtd;
        } else {
          unset($_SESSION['carrinho'][$id]);
        }
      }
    }
  }


?>

<!DOCTYPE html>
<html>

<head>
  <title>Carrinho de Compras</title>
  <style>
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      font-weight: bold;
      font-size: 20px;
    }

    .product {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .add-to-cart-button {
      margin-left: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      font-weight: bold;
      font-size: 20px;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
      font-size: 20px;

    }

    .clear-cart-button {
      background-color: goldenrod;
      color: white;
      padding: 10px 20px;
      font-size: 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 20px;
      font-weight: bold;
    }

    .clear-cart-button:hover {
      background-color: blue;
      color: white;
      opacity: 40%;
      transition: 0.8s;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Carrinho de Compras</h1>
    <table>

      <tbody id="cart-items"></tbody>
    </table>
    <form action="?acao=up" method="post">
      <tbody>
        <?php
        

        if (count($_SESSION['carrinho']) == 0) {
          echo "Não há produto no carrinho";

          echo "<br>";
        } 
        else {
          foreach ($_SESSION['carrinho'] as $id => $qtd) {
           
            
            $usuario->buscarNoCarrinho($id);
            $usuario->incluirTabelaItensRequest($id, $qtd);
             
            
            
           
            echo "<br>";
            echo "Quantidade: " . '<input type="text" name="prod[' . $id . ']" value= "[' . $qtd . ']"';
            echo '<br>';
            echo $qtd;
            echo '<br>';
            echo '<a href ="?acao=del&id=' . $id . '">Remover</a>';
            echo '<br>';
            echo '<br>';
            }
            
          }
        
      
          
    

          
        

       
        ?>

      </tbody>
      <tfoot>


        <button class="clear-cart-button" type="submit">Atualizar Carrinho</button>

        <td colspan="5"><a href="index.php"><input class="clear-cart-button" type="button"
              value="Continuar comprando"></a></td>
        </tr>
      </tfoot>


    </form>
  </div>




</body>

</html>