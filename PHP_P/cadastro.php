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
    
    $RSG = $_POST["resgi"];
    $CF = $_POST["cod_func"];
    $NS = $_POST["num_sala"];
    $tipo = $_POST["Tipo"];
    $data = $_POST["data"];
    $sta = $_POST["sts"];
    $desc = $_POST["desc"];

    do {
        $codP = rand(0000001, 9999999);
        $CP = $codP;
        $sqlC = "SELECT * FROM patrimonio 
                WHERE Cod_Pat = $CP";
    }while(mysqli_query($conn, $sqlC)->num_rows);

    $sql = "INSERT INTO patrimonio(rsg, Cod_Func, Num_Sala, Cod_Pat, dsc, Tipo, Data_Tomb, sts) 
            VALUES ('$RSG', '$CF', '$NS', '$CP', '$desc', '$tipo','$data', '$sta')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: ../PHP_P/lista.php");
    }
    ?>
</body>

</html>