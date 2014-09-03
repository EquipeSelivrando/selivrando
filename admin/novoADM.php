<?php

session_start();
include '../conexao/conecta.inc';
include_once '../includes/funcoesuteis.inc';

$codigo_usuario     = $_GET['codigo'];
$codTipoUsuario = 2;
$atualizaUsuario = "UPDATE usuario SET COD_TIPOUSUARIO = '$codTipoUsuario' WHERE COD_USUARIO = '$codigo_usuario'"; 

$query = "SELECT NOME_USUARIO FROM usuario WHERE COD_USUARIO = $codigo_usuario";
$result = mysql_query($query);
$nomeNovoAdm = mysql_fetch_array($result);

if(mysql_query($atualizaUsuario)){
   echo '<script type="text/javascript">
         alert ("Tipo de usuário alterado com sucesso!!")
                location.href="listarAdministradores.php"
            </script>;';
    $mensagem = "Adicionou um novo administrador".$nomeNovoAdm;
   salvaLog($mensagem);
}
else{
    echo mysql_error();
}
