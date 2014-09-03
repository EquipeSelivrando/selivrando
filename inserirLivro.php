<?php

include_once 'conexao/conecta.inc';
include_once 'includes/funcoesuteis.inc';
session_start();

$titulo = isset($_POST['titulo'])?utf8_decode($_POST['titulo']):null;
$anopub = isset($_POST['anopublicacao'])?utf8_decode($_POST['anopublicacao']):null;
$isbn = isset($_POST['isbn'])?utf8_decode($_POST['isbn']):null;
$qntpgs = isset($_POST['qntpgs'])?$_POST['qntpgs']:null;
$sinopse = isset($_POST['sinopse'])?$_POST['sinopse']:null;
$img = isset($_POST['arquivoFoto'])?$_POST['arquivoFoto']:null;
$autor = isset($_POST['autor'])?$_POST['autor']:null;

$editora = isset($_POST['editora'])?$_POST['editora']:null;
$genero = isset($_POST['genero'])?$_POST['genero']:null;
$conservacao = isset($_POST['estadoconservacao'])?$_POST['estadoconservacao']:null;

//INSERT livro
$inserirLivro = "INSERT INTO livro (TITULO_LIVRO, ANO_PUBLICACAO, ISBN_LIVRO, PAGINAS_LIVRO, SINOPSE_LIVRO, URL_IMAGEM, EDITORA_COD_EDITORA, GENERO_COD_GENERO, ESTADO_CONSERVACAO_COD_ESTADOCONS, AUTOR_COD_AUTOR)VALUES('$titulo', '$anopub', '$isbn', '$qntpgs', '$sinopse', '$img', '$editora', $genero, $conservacao, $autor)";

if(mysql_query($inserirLivro)){
   echo '<script type="text/javascript">
         alert ("Livro cadastrado com sucesso!")
                location.href="perfilLivro.php"
            </script>';
   $mensagem = "Cadastrou um novo livro";
   salvaLog($mensagem);
}
else{
    echo mysql_error();
}

//SALVANDO O LIVRO NO ITEM_ESTANTE
$codUsuario =  $_SESSION['codigo'];                        

$query = "SELECT COD_ESTANTE FROM estante WHERE USUARIO_COD_USUARIO = $codUsuario";
$result = mysql_query($query);
$codEstante = mysql_fetch_array($result);

