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

    if (!$conn) {

        die("conexao Falhou: " . mysqli_connect_error());
    }

    $NS = $_POST["num_sala"];
    $desc = $_POST["desc"];

    $sql = "INSERT INTO sala(Num_Sala, dsc) 
            VALUES ('$NS', '$desc')";
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: ../PHP_S/lista.php");
    }
    ?>
</body>

</html>