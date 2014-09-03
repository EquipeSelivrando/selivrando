<?php

    echo '<meta charset=UTF-8>';
    include '../conexao/conecta.inc';        
    
    $sql = "SELECT * FROM livro";
    $result = mysql_query($sql);
           
    echo '<table name=DadosLivro class=tftable border=1>';
    echo '<tr>
            <th>Código</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Editora</th>
            <th> ISBN </th>
            <th> Estado </th>
            <th>Usuário</th>            
         </tr>';
    
    while($livro = mysql_fetch_array($result))
    {
            echo '<tr>';
            echo '<td name=codigo>'.$livro['COD_LIVRO'].'</td>';
            echo '<td>'.$livro['TITULO_LIVRO'].'</td>';
            echo '<td>'.$livro['AUTOR_LIVRO'].'</td>';
            echo '<td>'.$livro['COD_EDITORA'].'</td>';      
            echo '<td>'.$livro['ISBN_LIVRO'].'</td>';
            echo '<td>'.$livro['COD_ESTADOCONS'].'</td>';
            echo '<td>'.$livro['COD_USUARIO_COD'].'</td>';            
            echo '<td> <a href=../excluir/excluirLivro.php?codigo='.$livro['COD_LIVRO'].'> Excluir </a> </td>';
            echo '</tr>';
    }
    echo '</table> <br/>';     

?>