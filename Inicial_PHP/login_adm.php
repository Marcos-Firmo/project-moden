<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/BD_3.css">
</head>
<body>
    
    <?php
    session_start();

        include_once('conexao.php');
        
        if (!$conn) {

            die("conexao Falhou: " . mysqli_connect_error());
        }

        $usua = $_GET['usua'];
        $senha = $_GET['senhal'];

        $sql = "SELECT * FROM adm WHERE usua= '$usua' AND senha='$senha'";

        if (($r = mysqli_query($conn, $sql))->num_rows != 0) {
            
            
            $_SESSION['id'] = $r->fetch_assoc()['usua'];
            header("location: ../Inicial_HTML/home.html");
        } else {
            header("location: ../Inicial_HTML/login_admin.html");
        }
    ?>
</body>
</html>