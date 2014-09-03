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

// caso esteja cadastrado, fazer algoritmo de senha para o usuário e atualizar a senha atual pela senha provisória
if ($numUsuarios > 0)
    {
             $senhaProvisoria = gerarSenha(6);
             $hash = Bcrypt::hash($senhaProvisoria);
             $sql = "UPDATE usuario SET SENHA_USUARIO = '$hash'";
             $sql.= " WHERE EMAIL_USUARIO = '$email'"; 
             if( mysql_query($sql))
              {
                echo 'Sua senha Provisória é: '.$senhaProvisoria.'<br/>'; 
                echo '<script type="text/javascript">
                    alert ("Faça Login.")
                    location.href="index.php"
                    </script>';
                              
            $sql = "SELECT NOME_USUARIO FROM usuario WHERE EMAIL_USUARIO = $email";
            $result = mysql_query($sql);
            $nome = mysql_fetch_array($result);

        /*Aqui vai ser enviado um e-mail informando o usuário sobre sua senha no site.*/
            $to = $email;
            $subject = "Nova Senha no site Se Livrando";
            $link = "http://selivrando.esy.es/frmrecuperarsenha.php?codigo=$codigo";
            $mensageM = "'Olá $nome, você solicitou uma nova senha no site selivrando.esy.es \n
            Acesse o link: \r\n";
            $mensageM.= "<a href=$link>".$link."</a><br/>";
            $mensageM.="Atenciosamente,
            Equipe Design Factory \n (não responda esse e-mail)'";

      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers.= "Content-type:text/html; charset=8859-1" . "\r\n";
      //email de quem mandou
      $headers.= "From: Seven Room <atendimento@sevenroom.com.br>\n..";
      //prioridade do email
      $headers.= "X-Priority:1\n..";

      if(mail($to,$subject,$mensageM,$headers)){
        echo "Email enviado com sucesso!";
      } else{
        echo "Não foi possível enviar o e-mail, tente novamente.";
            }            
        /*--------------------------------------------------------------------*/
                
            $mensagem= "Solicitou nova senha";
            salvaLog($mensagem);
              } 
              else{
                echo mysql_error() .   'Não foi possível o processo, tente mais tarde !';
              }

    }else{
        echo  '<script type="text/javascript">
               alert ("Você não tem cadastro!!!")
               location.href="index.php"
               </script>';
    }    