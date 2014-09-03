<?php

include '../conexao/conecta.inc';

$codigo_livro     = $_GET['codigo'];

$query = "DELETE FROM item_estante WHERE LIVRO_COD_LIVRO = $codigo_livro";

$query2 = "SELECT TITULO_LIVRO FROM livro WHERE COD_LIVRO = $codigo_livro";
$result = mysql_query($query2);
$titulo = mysql_fetch_array($result);

if (mysql_query($query)){
$sql = "DELETE FROM livro WHERE COD_LIVRO = $codigo_livro";

if(mysql_query($sql)){
    echo '<script type="text/javascript">
         alert ("Livro excluído com sucesso!")
                location.href="perfilUsuario.php"
            </script>;';
    $mensagem= "Excluiu o livro".$titulo;
salvaLog($mensagem);
}
else{
    echo mysql_error();
}

}
else{
    echo mysql_error();
}
?>