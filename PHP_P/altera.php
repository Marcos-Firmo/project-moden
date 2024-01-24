<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://kit.fontawesome.com/7fd362441c.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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
<!DOCTYPE html>
<html lang="en">
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
     
    </style>
</head>
<body>
    <?php

        include_once('conexao.php');

        $id = $_GET['id'];
        $sql ="SELECT * FROM patrimonio WHERE Cod_Pat= '$id'";
        $result = mysqli_query($conn, $sql);
        $sqlS = "select * from sala";
        $resultS = mysqli_query($conn, $sqlS);

        echo "<br><div class=snick><center>";

        echo "<h1> Alterar Patrimônio </h1>";
        echo "<form action= 'update.php' method= 'post'>";
        while ($row=mysqli_fetch_array ($result)){
        echo "<input type=hidden name=cod_pat value=\"".$row['Cod_Pat']."\"><br>
        <input type=hidden name=cod_func value=\"".$row['Cod_Func']."\"><br>";
        echo"<div class='InputBox'>
        
            <input type=text name=regis id=el class=user value=".$row['rsg']." required>
            <label for=el class=an> Registro </label>
            </div>
            <br><br>
            <div class='InputBox'>
                <input type=text name=desc value=".$row['dsc']." id=el class=user required>
                <label for=el class=an> Descrição </label>
            </div>";
            echo "<br>Data:      <input type=date name=data value=\"".$row['Data_Tomb']."\"required>
            <b>Tipo: <select name=tipo required>
                    
            <option value=".$row['Tipo']." id=sl hidden > " .$row['Tipo']. "</option>
            <option value=Eletrônico id=sl> Eletrônico </option>
            <option value=Mobília id=sl > Mobília </option>
            </select></b>
            <br><br>

            Status: <select name=sts required>
        <option value=\"".$row['sts']."\" id=sl hidden> ".$row['sts']."\ </option>
            <option value='Em uso' id=sl> Em uso </option>
            <option value='Em estoque' id=sl > Em estoque </option>
            <option value='Em manutenção' id=sl > Em manutenção </option>
            <option value='Danificado' id=sl > Danificado </option>
            </select>";
            $ns = $row['Num_Sala'];
        
        echo " Sala: <select name=num_sala required> 
                 <option value=".$row['Num_Sala']." id=sl hidden> ".$row['Num_Sala']." </option>";
        }
        while ($row = mysqli_fetch_array ($resultS)){
            echo "<option id=sl>". $row['Num_Sala'] ."</option>";
        }
        echo " </select><br><br>";
            
            echo "<input class=sub type=submit  value=Alterar name=Cad id=bell >";
            echo "</form> </center";
        echo "</div>"; 
    ?>
</body>
</html>