<?php

$email = $_POST['email'] ;
$assunto = $_POST['assunto'];
$mensagem = $_POST ['resposta'];
$msgrecebida = $_POST['mensagem'];

/*Aqui vai ser enviado um e-mail informando o usuário sobre seu cadastro no site. O e-mail so vai ser enviado se o servidor tiver com smtp habilitado*/
            $to = $email;
            $subject = "'$assunto'";
            $menssagem = "'Você entrou em contato com o Se Livrando: \n $msgrecebida \n
            Resposta: $mensagem \n
            Atenciosamente,
            Equipe Se Livrando'";

            $headers = "FROM: selivrando.esy.es";
            mail($to,$subject,$menssagem, $headers);
        /*--------------------------------------------------------------------*/
?>            