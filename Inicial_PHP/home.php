
<?php

    function Nav(){

      return<<<HTML
                <nav class="navbar navbar-expand-lg"style="background-color: #D11800">
                  <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                    <img class="img" src="../Imagens/c.png" >
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                      <ul class="navbar-nav">
                        <li class="nav-item">
                        <div class="cor">  <a class="nav-link" aria-current="page" href="../Inicial_HTML/home.html">Home</a></div> 
                        </li>
                        <li class=" nav-item dropdown">
                          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Lista</a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../PHP_P/lista.php">Patrimônio</a></li>
                            <li><a class="dropdown-item" href="../PHP_S/lista.php">Sala</a></li>
                        </ul>
                        </li>
                        <li class=" nav-item dropdown">
                          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Cadastro</a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../PHP_P/cadastrar.php">Patrimônio</a></li>
                            <li><a class="dropdown-item" href="../PHP_S/cadastrar.php">Sala</a></li>
                        </ul>
                        </li>
                        <li class="nav-item">
                          <div class="cor">  <a class="nav-link" aria-current="page" href="../Inicial_PHP/cadastros_func.php"> Solicitações </a></div> 
                        </li>
                        <div class="icon-wrapper">
                        <li class="dropstart">
                          <a class="icon dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                          <div class="icon">
                            <i class="fa-solid fa-user"></i>
                          </div>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Inicial_HTML/login_admin.html">Sair</a></li>
                          </ul>
                        </li>
                      </div>
                      </nav>  
                HTML;
    }
?>