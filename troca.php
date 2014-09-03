<?php

include 'conexao/conecta.inc';
include 'includes/funcoesuteis.inc';

$codigo_livro = $_GET['codigo'];

$query = "SELECT COD_ESTANTE FROM item_estante WHERE LIVRO_COD_LIVRO = $codigo_livro";
$result = mysql_query($query);
$estante = mysql_fetch_array($result);

$query2 = "SELECT USUARIO_COD_USUARIO FROM estante WHERE COD_ESTANTE = $estante";
$result2 = mysql_query($query2);
$codUsuario = mysql_fetch_array($result2);

$query3 = "SELECT * FROM usuario WHERE COD_USUARIO = $codUsuario";
$result3 = mysql_query($query3);
$usuario = mysql_fetch_array($result3);

$email = $usuario['EMAIL_USUARIO'];
$nome = $usuario['NOME_USUARIO'];

$codigo_receptor = $_SESSION['codigo'];
$sqlR = "SELECT * FROM usuario WHERE COD_USUARIO = $codigo_receptor";
$resultR = mysql_query($sqlR);
$receptor = mysql_fetch_array($resultR);

$nomereceptor = $receptor['NOME_USUARIO'];
$emailReceptor = $receptor['EMAIL_USUARIO'];

$sqlLivro = "SELECT TITULO_LIVRO FROM livro WHERE COD_LIVRO = $codigo_livro";
$resultLivro = mysql_query($sqlLivro);
$livro = mysql_fetch_array($resultLivro);
$titulo = $livro['TITULO_LIVRO'];
        /*Aqui vai ser enviado um e-mail informando o usuário sobre a troca */
            $to = $email;
            $subject = "Solicitação de troca no site Se Livrando";
            $link = "http://selivrando.com.br/";
            $mensageM = "'Olá $nome, você recebeu uma solicitação  de troca no site selivrando.com.br! \n";            
            $mensageM.="O usuário $nomereceptor deseja trocar o livro $titulo. Entre em contato através do e-mail
            disponível em seu perfil no Se Livrando: $emailReceptor. \n";
            $mensageM.="Obs: Após a troca é de sua responsabilidade retirar o livro da estante! \n
            Atenciosamente, \n
            Equipe Design Factory \n (não responda esse e-mail)'";   

      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers.= "Content-type:text/html; charset=8859-1" . "\r\n";
      //email de quem mandou
      $headers.= "From: Se Livrando <atendimento@selivrando.com.br>\n..";
      //prioridade do email
      $headers.= "X-Priority:1\n..";

      if(mail($to,$subject,$mensageM,$headers)){
        echo "Email enviado com sucesso!";
      } else{
        echo "Não foi possível enviar o e-mail, tente novamente.";
            }            
        /*--------------------------------------------------------------------*/

$mensagem= "Solicitou uma troca com ".$nomereceptor;
salvaLog($mensagem);            
?>