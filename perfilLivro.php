<script type="text/javascript" src="js/funcoesValidacao.js"> </script>
<?php

include_once 'conexao/conecta.inc';
include_once 'includes/funcoesuteis.inc';

    $codigo_usuario = $_SESSION['codigo'];    
    
    $query = "SELECT COD_ESTANTE FROM estante WHERE USUARIO_COD_USUARIO = $codigo_usuario";
    $result = mysql_query($query);
    $estante = mysql_fetch_array($result);
    
    $query2 = "SELECT LIVRO_COD_LIVRO FROM item_estante WHERE ESTANTE_COD_ESTANTE = $estante";
    $result2 = mysql_query($query2);
    $codLivro = mysql_fetch_array($result2);
    
    $query3 = "SELECT * FROM livro WHERE COD_LIVRO = $codLivro";
    $result3 = mysql_query($query3);
    $livro = mysql_fetch_array($result3);        
   
echo '<meta charset=UTF-8>';
// BUSCAR FOTO DO PERFIL DO LIVRO
$foto = $_REQUEST['arquivoFoto'];
echo 'Foto:'.$foto;

echo '<h6> Código do Livro: '.$livro['COD_LIVRO'].'<br/>';
echo 'Título: '.$livro['TITULO_LIVRO'];
echo '<a href=favoritar.php?codigo='.$livro['COD_LIVRO'].'> Favoritar este livro </a>'.'<br/>';

echo 'Autor: '.$livro['AUTOR_LIVRO'];
echo 'Editora: '.$livro['EDITORA_LIVRO'].'<br/>';

echo 'Nº de Páginas: '.$livro['PAGINAS_LIVRO'].'<br/>';
echo 'Sinopse: '.$livro['SINOPSE_LIVRO'].'<br/>';

echo 'Estado de Conservação: '.$livro['COD_ESTADOCONS'].'<br/>';
echo 'Gênero: '.$livro['COD_GENERO'].'<br/>'.'</h6>';

echo '<a href=troca.php?codigo='.$livro['COD_LIVRO'].'> Solicitar </a>';
echo '<a href=frmAtualizarLivro.php?codigo='.$livro.'> Alterar Dados | </a>'; 
echo '<td> <a href=excluir/excluirLivro.php?codigo='.$livro['COD_LIVRO'].'> Excluir </a> </td>';