<script type="text/javascript" src="js/funcoesValidacao.js"> </script>

<?php
include 'conexao/conecta.inc';
         
    $query = "SELECT * FROM livro";
    $result = mysql_query($query);
    $livros = mysql_fetch_array($result);

echo '<meta charset=UTF-8>';

//listar todos os livros cadastrados de 5 em 5 por linha (MATRIZ + BUSCA)
// foto + título com link para o perfil do livro