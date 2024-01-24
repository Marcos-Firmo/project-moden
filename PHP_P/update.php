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

        $RSG = $_POST['regis'];
        $CP = $_POST["cod_pat"];
        $CF = $_POST["cod_func"];
        $NS = $_POST["num_sala"];
        $tipo = $_POST["tipo"];
        $data = $_POST["data"];
        $sta = $_POST["sts"];
        $desc = $_POST["desc"];

        $sql ="UPDATE patrimonio SET Cod_Func= '$CF', rsg= '$RSG', Num_Sala= '$NS', dsc= '$desc', Tipo= '$tipo', Data_Tomb= '$data', sts= '$sta' WHERE Cod_Pat= '$CP'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("location: ../PHP_P/lista.php");
        }

    ?>
</body>
</html>