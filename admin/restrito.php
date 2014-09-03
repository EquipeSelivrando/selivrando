<?php

include '../conexao/conecta.inc';
include_once '../includes/funcoesuteis.inc';

$codigo_usuario     = $_GET['codigo'];
$codTipoUsuario = 1;
$UsuarioComum = "UPDATE usuario SET COD_TIPOUSUARIO = '$codTipoUsuario' WHERE COD_USUARIO = '$codigo_usuario'"; 
$query = "SELECT * FROM usuario WHERE COD_USUARIO = $codigo_usuario";
$result = mysql_query($query);
$nomeAdmInativo = mysql_fetch_array($result);


if(mysql_query($UsuarioComum)){
    echo '<script type="text/javascript">
         alert ("Tipo de usuário alterado com sucesso!!")
                location.href="listarUsuario.php"
            </script>;';
    $mensagem = "Inativou o administrador".$nomeAdmInativo;
   salvaLog($mensagem);
}
else{
    echo mysql_error();
}

?>
