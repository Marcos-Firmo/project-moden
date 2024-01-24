<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php

        include_once('conexao.php');

        $CP = $_POST["nums"];
        $NS = $_POST["num_sala"];
        $desc = $_POST["desc"];

        $sql ="UPDATE sala SET Num_Sala= '$NS', dsc= '$desc' WHERE Num_Sala= '$CP'";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            header("location: ../PHP_S/lista.php");
        }
    ?>
</body>
</html>