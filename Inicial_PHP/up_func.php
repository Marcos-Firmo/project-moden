<?php
    $sql = "UPDATE funcionario SET sts = '1';";
    $result = mysqli_query($conn, $sql);
    header("location: 'cadastros_func.php'");
?>