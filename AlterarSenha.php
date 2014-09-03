<!DOCTYPE html>
<html>
    <head>
        <title>Alterar senha</title>
        <meta charset="8859-1">
        <link rel="stylesheet" href="#">
    </head>    
    <body>
<?php 
 $codigo = isset($_GET['codigo_usuario'])?$_GET['codigo_usuario']:null;
 session_start();
 // echo $codigo;
        
     if($codigo != null)
     { 
       $_SESSION['codigo_usuario'] = $codigo;
       echo '<h3>Alterar senha</h3><br/> 
       <form action=inserirUsuario.php method=post>
	      <input type=hidden value="'.$_SESSION['codigo_usuario'].'">
		   <label>Email: </label>
    <input id=email name=email type=email value=<?php echo '.$usuarios['EMAIL_USUARIO'].'; ?>" <br/>
           Nova senha: <input type=password name=novasenha required> <br/>
           Confirme a senha: <input type=password name=confSenha required> <br/>
           <input type=submit value=Enviar >
        </form>';
        }else{
                echo 'Por favor preencha o formulário para Alterar a Senha<br/>';
      
      }
       ?> 
    </body>
</html>