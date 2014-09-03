<?php

include '../conexao/conecta.inc';

    $codigo_contato     = $_GET['codigo'];
    
    $sql = "DELETE FROM contato WHERE COD_CONTATO = $codigo_contato";
    
    if(mysql_query($sql)){
    echo '<script type="text/javascript">
         alert ("Mensagem excluída com sucesso!")
                location.href="indexadmin.php"
            </script>;';
    $mensagem= "Excluiu uma mensagem";
salvaLog($mensagem);
}
else{
    echo mysql_error();
}
    
?>