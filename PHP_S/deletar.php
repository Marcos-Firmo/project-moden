<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/desing.css">
</head>
<body>
    <?php

        include_once('conexao.php');

        $id = $_GET['id'];
        $sql = "DELETE FROM sala WHERE Num_Sala = '$id'";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            header("location: ../PHP_S/lista.php");
        }
    ?>
</body>
</html>