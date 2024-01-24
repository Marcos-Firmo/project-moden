<?php

    include_once('conexao.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM funcionario;";
    $result = mysqli_query($conn, $sql);
    if($result){
        $sql = "UPDATE funcionario SET sts = '1' WHERE Cod_Func = '$id' ;";
        $result = mysqli_query($conn, $sql);
        header("location: cadastros_func.php");
            
    }

    

?>