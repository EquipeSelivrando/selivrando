<?php

include '../conexao/conecta.inc';

$codigo_usuario     = $_GET['codigo'];

$query = "DELETE FROM log WHERE USUARIO_COD_USUARIO = $codigo_usuario";
$query2 = "DELETE FROM estante WHERE USUARIO_COD_USUARIO = $codigo_usuario";

$sql = "SELECT NOME_USUARIO FROM usuario WHERE COD_USUARIO = $codigo_usuario";
$nome = mysql_query($sql);

if (mysql_query($query) && mysql_query($query2)){

    $sql = "DELETE FROM usuario WHERE COD_USUARIO = $codigo_usuario";

if(mysql_query($sql)){
    echo '<script type="text/javascript">
         alert ("Usuário excluído com sucesso!")
                location.href="listarAdministradores.php"
            </script>;';
    $mensagem= "Excluiu o Usuário".$nome;
    salvaLog($mensagem);
}
else{
    echo mysql_error();
}

}