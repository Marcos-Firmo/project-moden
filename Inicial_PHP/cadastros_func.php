<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/7fd362441c.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7fd362441c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <link rel="stylesheet" href="../CSS/desing.css">
    <link rel="stylesheet" href="../css/home.css">

    <style>
        .table-wrapper {
            max-height: 400px;
            width: 97,5%;
            Overflow-y: scroll;
            margin: 01px;
        }

        .search-bar-container {
        color: white;
        padding: 10px;
        width: 100%;
        background-color:#303941 ;
        }

        .search-bar-container > #search-form {
        margin: 0px auto;
        }

        #search-form {
            height: fit-content;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin: 3px 0;
            width: 30vw;
        }

        #search-form > #search-input {
            flex: 4;
            border-radius: 15px;
            text-indent: 10px;
            height: 30px;

            margin-right: 10px;

            border: 1px solid lightgray;
        }

        #search-form > #search-button {
            flex: 1;
        }

        a{
            color: rgb(15, 226, 40);
        }

    </style>

</head>
<?php
        require_once('../Inicial_PHP/home.php');
        echo nav();
?>
<body>

<div class = "table-wrapper">
<table class="table table-secondary table-bordered table-hover">
          <thead class="table table-secondary table-bordered table-hover">
            <tr>
                <th scope="col"> Email </th>
                <th scope="col"> Código </th>
                <th scope="col"> Confirmar </th>
            </tr>  
          </thead>
            <tbody>
              <tr>
           
</div>
<?php
require_once ("conexao.php");

  $pesquisa = false;
  $filtrob = false;

$sql = "SELECT * FROM funcionario WHERE sts = '0';";
$result = mysqli_query($conn, $sql);

echo "<tr>";
while ($row = mysqli_fetch_array($result)){
 
    echo "<tr>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['Cod_Func'] . "</td>";
    echo "<td>";
    echo "<a href=\"confirmacao.php?id=".$row['Cod_Func'] . "\"><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-square' viewBox='0 0 16 16'>
    <path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
    <path d='M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z'/>
  </svg></a>";
    echo "</td>";
    echo "</tr>";

                       
}
echo "</table>";
?>
</div>
    
</body>
</html>