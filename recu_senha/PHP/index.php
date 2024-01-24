<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>
        body{
            font-family:  Arial, Helvetica, sans-serif;
            background-image: url(../Imagens/c.png);
            background-repeat: no-repeat;
            background-position-x: 50%;
            /*background-image: linear-gradient(45deg, white,grey);*/
            color: #fff;
        }
        .login{
            background-color: rgba(0, 0, 0,0.85); 
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 5%;
            border-radius: 15px;
            color: #fff;
        }
        
        .sub{
            position: relative;
            left: 20%;
            width: 60%;
            height: 40px;
            border: none;
            border-radius: 0.8rem;
            background-color: white;
            outline: none;
            font-size: 20px;
            color: #000;
            cursor: pointer;
        }
        .sub:hover{
            background-color:rgb(255, 251, 0);
            font-size: 25px;
        }
        a{
            color: white;
        }
        h1{
            font-size: 35px;
            text-align: center;
            color: white(255, 3, 3);
        }
        .res{
            text-align: center;
        }
        .InputBox{
            position: relative;
        }
        .user{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .an{
            position: absolute;
            top: 0%;
            left: 0%;
            pointer-events: none;
            transition: .5s;
        }
        .user:focus ~ .an,
        .user:valid ~ .an{
            top: -20px;
            font-size: 12px;
            color: rgb(255, 251, 0);

        }
    </style>
</head>
<body>
    <div class="login">
        <form method="post" action="email.php" enctype= "multipart/form-data">
            <h1> Recuperar Senha </h1>
            <br>
            <div class="InputBox">
                <input type="text" name="emailRecu" id="el" class="user" required />
                <label for="el" class="an"> Email </label>
                <input type="hidden" name="acao" value="recuperar" />
            </div>
            <br><br><br>
            <input class="sub" type="submit" value="Enviar email"/>  
        </form>
    </div>
</body>
</html>