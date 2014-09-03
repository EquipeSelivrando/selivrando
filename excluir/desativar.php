<?php

include '../conexao/conecta.inc';
include '../includes/funcoesuteis.inc';

$codigo_usuario     = $_GET['codigo'];

//Para STATUS_USUARIO 1 = Ativo e STATUS_USUARIO 2 = Inativo
$sql = "UPDATE usuario SET STATUS_USUARIO = 2 WHERE COD_USUARIO = '$codigo_usuario'";

$query = "SELECT NOME_USUARIO FROM usuario WHERE COD_USUARIO = $codigo_usuario";
$result = mysql_query($query);
$nome = mysql_fetch_array($result);

$query2 = "SELECT EMAIL_USUARIO FROM usuario WHERE COD_USUARIO = $codigo_usuario";
$result2 = mysql_query($query2);
$email = mysql_fetch_array($result2);

if(mysql_query($sql)){
       
    $mensagem= "Desativou o Usuário".$nome;
    salvaLog($mensagem);
    
   /* //E-mail informando o usuário
      $destinatario = $email;
       $link = "http://www.selivrando.com.br/frmRecuperar.php?codigo=$codigo";
      $assunto = "Conta Desativada - SE LIVRANDO ";
      $corpo = "Content-type:text/html; charset=8859-1" . "\r\n";
      $corpo .= "Olá " .$nome. ", o seu acesso ao Se Livrando foi desativado por tempo indetermindao \r\n";      
      $corpo .= "Para saber mais entre em contato com o site na guia Contato ou em nossas redes sociais.";
      $corpo .= " Atenciosamente, \n Equipe Design Factory \n (não responda esse e-mail)";

      //formato do email - HTML
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html; charset=8859-1" . "\r\n";
      //email de quem mandou
      $headers .= "From: Se Livrando <atendimento@selivrando.com.br>\n..";
      //prioridade do email
      $headers .= "X-Priority:1\n..";
      
      if(mail($destinatario,$assunto,$corpo,$headers)){       */
          echo '<script type="text/javascript">
         alert ("Usuário desativado!")
                location.href="listarUsuarios.php"
            </script>;';
      }
else{
    echo mysql_error();
}

?>