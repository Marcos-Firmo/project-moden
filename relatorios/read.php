<?php 
    require_once("conexao.php");

    $sala = $_GET["sl"];
    $tipo = $_GET["tp"];
    $sts = $_GET["st"];
    $sql = "SELECT * FROM patrimonio;";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)){
        if($sala == $row['Num_Sala']) {
            header("location: ../relatorios/Relat_porsala.php");
        }
    }
?>