<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7fd362441c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/home.css">

    <style>
        

    </style>
</head>
<body>
    
</body>
</html>
<?php
        require_once('../Inicial_PHP/home.php');
        echo nav();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/desing.css">

    <style>
    input[id=bell]{
        width: 40%;
        left: 0%;
        
    } 
    .out{
            position: relative;
            left: 95%;
    }
    body{
    background-color: #fff;

    }
    .form{
    background-color: #000;
    }
    .snick{
    background-color: rgba(0, 0, 0, 0.9);
    position: relative;
    width: 60%;
    left: 20%;
    padding: -10%;
    border-radius: 15px;
    color: #fff;
    }
    .sub{
    width: 30%;
    height: 40px;
    border: none;
    border-radius: 0.8rem;
    background-color: white;
    outline: none;
    font-size: 20px;
    color: #000;
    cursor: pointer;
    margin: 5px;
    position: relative;
    }
    .user{
    background: none;
    border: none;
    border-bottom: 1px solid white;
    outline: none;
    color: white;
    font-size: 15px;
    width: 85%;
    letter-spacing: 2px;
    }
    .user:focus ~ .an,
    .user:valid ~ .an{
        top: -20px;
    font-size: 12px;
    color: yellow;
    }
    .an{
    position: absolute;
    top: 0%;
    left: 8%;
    pointer-events: none;
    transition: .5s;
    }
    input[id=ainz]{
    left: 200px;
    position: relative;
    }
    h1{
    font-family:  Arial, Helvetica, sans-serif;
    color: white;
    text-align: center;
    }
    fieldset{
    text-align: center;
    width: 40%;
    margin: auto;
    background-color: #000;
    }

    input[type='number']{
    outline: none;
    border: none;
    border-bottom: 1px solid white;
    }
    input[type='radio']{
    width: 20px;
    height: 16px;
    }
    .InputBox{
    position: relative;
    }
    a{
    position: relative;
    color:white;
    }
    select{
    background-color: white;
    }
    input[type="date"]{
    background-color: white;
    }
    b{
    color: white;
    position: relative;
    }
    .icon-wrapper {
        right: 40px;
        position: absolute;
        border: 1px solid white;
        border-radius: 50%;
        width: 43px;
        height: 43px;
        text-align: center;
    }

    </style>
</head>
<body>
    
    <?php
    include_once('conexao.php');
    
    echo "<div class='snick'>";
    echo "<div class = 'table-wrapper'>";
    echo "<form action= cadastro.php method= post>
            <center>
                <P><h1> Cadastrar Sala </h1></P><br>
                <div class='InputBox'>
                    <input type=number name=num_sala id=el class=user required>
                    <label for=el class=an> Número da Sala </label>
                </div>
                <br><br>
                <div class='InputBox'>
                    <input type=text name=desc id=el class=user required>
                    <label for=el class=an> Descrição </label>
                </div>
                <br><br>
                
                <input class=sub type=submit  value=Cadastrar name=Cad id=bell><br>
                </center>
            </form>
            </div>
            </div>";
    ?>
</body>
</html>