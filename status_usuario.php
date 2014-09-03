<?php

include '../conexao/conecta.inc';

$cod_usuarioInativo = 0;
$codigo_usuario = $_SESSION['codigo'];
$UsuarioComum = "UPDATE usuario SET COD_TIPOUSUARIO = '$cod_usuarioInativo' WHERE COD_USUARIO = '$codigo_usuario'"; 
$query = "SELECT * FROM usuario WHERE COD_USUARIO = $codigo_usuario";
$result = mysql_query($query);
$nomeUsuarioInativo = mysql_fetch_array($result);
$result1 = mysql_query($query);
$nomeUsuarioAtivo = mysql_fetch_array($result1);


if($codTipoUsuario === true){
   $codTipoUsuario = $cod_usuarioInativo;
   echo '<script type="text/javascript">
         alert ("Tipo de usuário alterado com sucesso!!")
                location.href="listarUsuario.php"
            </script>;';
    $mensagem = "Inativou o Usuario".$nomeUsuarioInativo;
   salvaLog($mensagem);
   
}else{
    echo mysql_error();
}

if($codTipoUsuario === false){
   $cod_usuarioInativo = $codTipoUsuario; 
      echo '<script type="text/javascript">
         alert ("Tipo de usuário alterado com sucesso!!")
                location.href="listarUsuario.php"
            </script>;';
    $mensagem = "Ativou o Usuario".$nomeUsuarioAtivo;
   salvaLog($mensagem);
   
}else{
    echo mysql_error();
}
