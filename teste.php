
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>First-Tech</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
  
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
      }
      
      header {
        background-color: #050505;
        color: #fdae02;
        padding: 20px;
        text-align: center;
      }

      
      
      h1 {
        margin: 0;
        font-size: 36px;
        text-transform: uppercase;
        width: 100%;
      }
      
      section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        max-width: 1200px; 
      }
      
      article {
        background-color: #f1f1f1;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        margin: 10px;
        padding: 20px;
        text-align: center;
        width: calc(33.3% - 20px); 
        /*display: flex;*/
      }
      
      article h2 {
        margin-top: 0;
        font-size: 24px;
        text-transform: uppercase;
      }
      
      article p {
        font-size: 18px;
        line-height: 1.5;
      }
      
      article a {
        background-color: #ffae00;
        color: #141414;
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        text-decoration: none;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
      }
      
      article a:hover {
        background-color: #fcfffb;
      }
      
      footer {
        background-color: #030303;
        color: #ffae00;
        padding: 40px;
        text-align: center;
        width: 100%;  
        font-size: 30px;
        justify-content: center;
      }

      button {
      background-color: #ffae00;
      color: rgb(19, 18, 18);
      padding: 32px;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      /*width: 100%;*/
      display: block;
      font-size: 15px;
      text-align: right;
      float: right;
      margin-top: 20px;
      /*width: 50px;
      height: 30px; */   
      }
  
      button:hover {
      background-color: #faf7f7;     
      }

      header {
      background-color: #0c0c0c;
      padding: 20px;
      text-align: left;
    }

    input[type="text"] {
      padding: 8px;
      font-size: 16px;
    }

    input[type="submit"] {
      padding: 10px 30px;
      font-size: 16px;
      background-color: #ffd000;
      color: white;
      border: none;
      cursor: pointer;
    }
    .cart-button {
  border: none;
  background: none;
  cursor: pointer;
  font-size: 16px;
}

.cart-button a {
  text-decoration: none;
  color: #ffd000;
}

.cart-button i {
  margin-right: 5px;
}

.signup-button {
  border: none;
  background: none;
  cursor: pointer;
  font-size: 16px;
}

.signup-button a {
  text-decoration: none;
  color: #ffd000;
}

.signup-button i {
  margin-right: 5px;
}


      
    </style>
  </head>
  <button class="signup-button">
      <a href="cadastro.php">
      <i class="fas fa-user-plus"></i> 
    </a>
  </button>
  
  <button class="cart-button">
      <a href="carrinho.php">
      <i class="fas fa-shopping-cart"></i>
    </a>
  </button>
  
  <body>
      
    <header>     
      <h1>First-Tech</h1>
      <form id="search-form" method="post">
         <input type="text" id="search-bar" placeholder="Pesquisar" name="nome">
      <input type="submit" value="Buscar">
      <div>
          <br>
      <?php
           include 'Main.php';
           $usuario = new Actions();
           if($_SERVER["REQUEST_METHOD"]=="POST"){
            $nome = $_POST['nome'];
           
            
            $usuario->buscarNomeProduto($nome);
           
            
           }
           
        ?>
      </div>
     
      </form>
     
        
    </header>
      
      
           

    <section>     
      <article>
           <?php
           
        $usuario = new Actions();
        $usuario -> buscar();
           
        ?>
       
              </article>
        </section> 
        <footer> <p> O MELHOR SITE DE TECNOLOGIA</p> 
        </footer> 

    </body>
   </html>
