<?php

include_once 'conexao/conecta.inc';
include_once 'classe/Bcrypt.class.php';
include_once 'includes/funcoesuteis.inc';

echo '<meta charset=UTF-8>';

$email = isset($_POST['email'])?$_POST['email']:null;

// fazer uma consulta no banco e verificar se o email esta cadastrado
$query = "SELECT * FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
$numUsuarios = mysql_num_rows($result);

// caso esteja cadastrado, fazer algoritmo de senha para o usu�rio e atualizar a senha atual pela senha provis�ria
if ($numUsuarios > 0)
    {
             $senhaProvisoria = gerarSenha(6);
             $hash = Bcrypt::hash($senhaProvisoria);
             $sql = "UPDATE usuario SET SENHA_USUARIO = '$hash'";
             $sql.= " WHERE EMAIL_USUARIO = '$email'"; 
             if( mysql_query($sql))
              {
           
               echo "Email enviado com sucesso!<br/>";
                              
            $sql = "SELECT NOME_USUARIO FROM usuario WHERE EMAIL_USUARIO = $email";
            $result = mysql_query($sql);
            $nome = mysql_fetch_array($result);

        /*Aqui vai ser enviado um e-mail informando o usu�rio sobre sua senha no site.*/
            $to = $email;
            $subject = "Nova Senha no site Se Livrando";
            $link = "http://selivrando.esy.es/index.php";
            $mensageM = "Ol�, voc� solicitou a recupera��o de senha no site selivrando.esy.es \n <br/>
     Sua senha Provis�ria �: $senhaProvisoria <br/> 
            Acesse o link para entrar no site: \r\n";
            $mensageM.= "<a href=$link>".$link."</a><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
            $mensageM.="Atenciosamente,
            Equipe Design Factory \n <br/>
 (n�o responda esse e-mail!)";

      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers.= "Content-type:text/html; charset=8859-1" . "\r\n";
      //email de quem mandou
      $headers.= "From: Se Livrando <selivrando@hotmail.com>\n..";
      //prioridade do email
      $headers.= "X-Priority:1\n..";

      if(mail($to,$subject,$mensageM,$headers)){
  echo'<a href=index.php>Fa�a Login</a>';
       
      } else{
        echo "N�o foi poss�vel enviar o e-mail, tente novamente.";
            }            
        /*--------------------------------------------------------------------*/
                
            $mensagem= "Solicitou nova senha";
            salvaLog($mensagem);
              } 
              else{
                echo mysql_error() .   'N�o foi poss�vel o processo, tente mais tarde !';
              }

    }else{
        
                echo'<a href=index.php>Voc� n�o tem cadastro!!!</a>';
             
    }   