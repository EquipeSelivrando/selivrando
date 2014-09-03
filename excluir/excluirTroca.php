<?php

include '../conexao/conecta.inc';

    $codigo_troca     = $_GET['codigo'];
$sql = "DELETE FROM troca WHERE COD_TROCA = $codigo_troca";

if(mysql_query($sql)){
    echo '<script type="text/javascript">
         alert ("Troca excluída com sucesso!")
                location.href="indexadmin.php"
            </script>;';
    $mensagem= "Excluiu uma troca";
salvaLog($mensagem);
}
else{
    echo mysql_error();
}

?>