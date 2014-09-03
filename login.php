<?php

echo '<meta charset=UTF-8>';

include_once 'conexao/conecta.inc';
include_once 'criptografiabcrypt.php';
include_once 'includes/funcoesuteis.inc';

//isset verifica se a variável foi definida
$email = isset($_POST['email'])?$_POST['email']:null;
$senha = isset($_POST['senha'])?$_POST['senha']:null;
$query = "SELECT * FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
$totalUsuarios = mysql_fetch_array($result);
$tipoUsuario = $totalUsuarios['COD_TIPOUSUARIO'];

$hash = $totalUsuarios['SENHA_USUARIO'];

if($totalUsuarios === 0){
            echo "<center><br><br><span class=vermelho>Por favor, faça login!</span><br/></center>";
		}  
 else{
  
  /*$usuarios = mysql_fetch_array($result);
  $senhaUsuario = $usuarios['SENHA_USUARIO'];
  $tipoUsuario = $usuarios['COD_TIPOUSUARIO'];*/
    
  $codigo = $usuarios['COD_USUARIO'];
  
      //Aqui temos o email e a senha corretos
      //Posso criar a sessão e direcionar
  if(Bcrypt::check($senha, $hash)){
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha; 
      $_SESSION['codigo'] = $codigo;
      
      if($tipoUsuario === '1'){
          echo '<script language= "JavaScript">
                 location.href="perfil.php"
                </script>';        
      } else if($tipoUsuario === '2'){
          echo '<script language= "JavaScript">
                 location.href="admin/indexadmin.php"
                </script>';
      }  
  } else{      
      echo '<script language= "JavaScript">
                 location.href="index.php"
                </script>';
  }
}

$mensagem= "Fez Login em sua conta no Se Livrando";
salvaLog($mensagem);