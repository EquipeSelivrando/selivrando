<?php

include '../conexao/conecta.inc';

$codigo_log     = $_GET['codigo'];
$sql = "DELETE FROM log WHERE COD_LOG = $codigo_log";

if(mysql_query($sql)){
    echo '<script type="text/javascript">
         alert ("Registro excluído com sucesso!")
                location.href="perfilUsuario.php"
            </script>;';
    $mensagem= "Excluiu um registro";
    salvaLog($mensagem);   
}
else{
    echo mysql_error();
}

?>
