<?php
    include_once('conexao.php');
?>
<?php 

        date_default_timezone_set("America/Sao_Paulo");
        ini_set('smtp_port', '465');
?>
<?php
    $email = addslashes($_POST['emailRecu']);
    function enviar_email($conn, $email){
         $verificar = mysqli_query($conn, "SELECT * FROM funcionario WHERE Email = '$email'");

        if(mysqli_num_rows($verificar) == 1){
            $codigo = md5(rand());
            $data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));

            $mensagem = '<p>Olá Funcionário!! <br> Recebemos sua solicitação para alterar sua senha de acesso ao sistema! <br>
                            Para Alterar sua senha de acesso clique no Link abaixo! <br> 
                            Link: <a href="http://gerenciadoroliveira.rf.gd/recu_senha/PHP/recuperar.php?codigo='.$codigo.'"> Clique aqui !! </a>
                            <br> Este Link irá expirar em: '.$data_expirar.'</p>';
            $email_remetente = "gerenciadoroliveira0676@gmail.com";
            $assunto = "Alteração de Senha";

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $headers .= "From: $email_remetente\n";
            $headers .= "Return-Path: $email_remetente\n";
            $headers .= "Reply-To: $email\n";
            $inserir = mysqli_query($conn, "INSERT INTO codigos SET codigo = '$codigo', data_vali = '$data_expirar'");
            if($inserir){
                if(mail($email, $assunto, $mensagem, $headers)){
                    header("location: ../../Inicial_HTML/login.html");
                }else{
                    echo "nnnnnnnnnnnnnnnnnnnnnnnnnnnnn";
                }
            }else{
                echo "nnnnnnnnnnnnnnnnnnnnnnn";
            }
        }
    }

    echo enviar_email($conn, $email);

?>