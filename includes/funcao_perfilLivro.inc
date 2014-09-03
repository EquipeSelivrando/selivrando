<?php


function validaPefil($img, $url){

 if ($img === selected){
echo 'Foto:'.$img['URL_IMAGEM'].'<br/>';
echo '<h6> Código do Livro: '.$livros['COD_LIVRO'].'<br/>';
echo 'Título: '.$livros['TITULO_LIVRO'].'<br/>';
echo 'Autor: '.$livros['AUTOR_LIVRO'].'<br/>';
echo 'Editora: '.$livros['EDITORA_LIVRO'].'<br/>';
echo 'Nº de Páginas: '.$livros['PAGINAS_LIVRO'].'<br/>';
echo 'Sinopse: '.$livros['SINOPSE_LIVRO'].'<br/>';
echo 'Autor: '.$livros['NOME_AUTOR'].'<br/>';
echo 'Estado de Conservação: '.$estadoconservacao.'<br/>';
echo 'Editora: '.$editoras.'<br/>';
echo 'Gênero: '.$generos.'<br/>'.'</h6>';
    }
    
else {
          echo mysql_error();
          }   
}