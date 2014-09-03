<?php

include_once 'conexao/conecta.inc';
include_once 'includes/funcoesuteis.inc';


$titulo  = isset($_POST['titulo'])?utf8_decode($_POST['titulo']):null;
$anopub  = isset($_POST['anopublicacao'])?utf8_decode($_POST['anopublicacao']):null;
$isbn    = isset($_POST['isbn'])?utf8_decode($_POST['isbn']):null;
$qntpgs  = isset($_POST['qntpgs'])?$_POST['qntpgs']:null;
$sinopse = isset($_POST['sinopse'])?$_POST['sinopse']:null;
$img     = isset($_POST['arquivo'])?$_POST['arquivo']:null;
$autor   = isset($_POST['nomeautor'])?$_POST['nomeautor']:null;

$editora     = isset($_POST['editora'])?$_POST['editora']:null;
$genero      = isset($_POST['genero'])?$_POST['genero']:null;
$conservacao = isset($_POST['estadoconservacao'])?$_POST['estadoconservacao']:null;

//Livro cadastrado
   $query = "SELECT * FROM livro WHERE TITULO_LIVRO = $titulo";
   $result = mysql_query($query);
   $livros = mysql_fetch_array($result);
   $titulo  = $livros['TITULO_LIVRO'];

$sql = "UPDATE livro SET TITULO_LIVRO='$titulo', ANO_PUBLICACAO='$anopub', ISBN_LIVRO='$isbn', PAGINAS_LIVRO=$qntpgs', SINOPSE_LIVRO='$sinopse', URL_IMAGEM='$img', NOME_AUTOR='$autor', COD_EDITORA='$editora', COD_GENERO='$genero', COD_ESTADOCONS='$conservacao' WHERE COD_LIVRO = '$codLivro'";

//A função mysql_query, executa uma ação (INSERT, UPDATE, SELECT ou DELETE)no banco de dados, ela recebe um parâmetro query 
//e retorna um valor booleano (TRUE ou FALSE)
if(mysql_query($sql)){
    echo '<script type="text/javascript">
         alert ("Dados atualizados com sucesso!")
                location.href="perfilLivro.php"
            </script>;';
    $mensagem = "Atualizou os dados do livro";
    salvaLog($mensagem);
}
else{
    echo mysql_error();
}
