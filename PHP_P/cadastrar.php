<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7fd362441c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../CSS/desing.css">
    <link rel="stylesheet" href="../CSS/home.css">
</head>
<body>
    
</body>
</html>
<?php
        require_once('../Inicial_PHP/home.php');
        echo nav();
?>
<?php
    session_start();
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
        position: relative;
    }   
    .out{
            position: relative;
            left: 95%;
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
    include_once('../Inicial_PHP/conexao.php');
        
        echo "<div class='snick'>";
        echo "<div class = 'table-wrapper'>";
        echo "<form action= cadastro.php method= post>
        <center>
                <P><h1> Cadastrar Patrimônio </h1></P>

                <div class='InputBox'>
                    <input type=hidden name=cod_func value=".$_SESSION['id']." id=el class=\"user\" required>";
        
           
        echo"<br><div class='InputBox'>
        
            <input type=text name=resgi id=el class=user required>
            <label for=el class=an> Registro </label>
            </div>
            <br><br>
            <div class='InputBox'>
                <input type=text name=desc id=el class=user required>
                <label for=el class=an> Descrição </label>
            </div>";
            echo "<br>Data:      <input type=date name=data required>
            <b>Tipo: <select name=Tipo>
                    
            <option value=null id=sl> Nenhum </option>
            <option value=Eletrônico id=sl> Eletrônico </option>
            <option value=Mobília id=sl > Mobília </option>
            </select></b>
            <br><br>

            Status: <select name=sts required>
            <option value='' id=sl disabled selected hidden> Status </option>
            <option value='Em uso' id=sl> Em uso </option>
            <option value='Em estoque' id=sl > Em estoque </option>
            <option value='Em manutenção' id=sl > Em manutenção </option>
            <option value='Danificado' id=sl > Danificado </option>
            </select>
            

            ";
        $sqlS = "select * from sala";
        $resultS = mysqli_query($conn, $sqlS);

        echo " Sala: <select name=num_sala required> 
                <option value=null id=sl> Nenhum </option>";
        while ($row = mysqli_fetch_array ($resultS)){
            echo "<option id=sl>". $row['Num_Sala'] ."</option>";
        }
        echo " </select>  
           <br><br>
            <input class=sub type=submit  value=Cadastrar name=Cad id=bell>
            </center>
            </form>
            </div>
            </div>";

    ?>
</body>
</html>