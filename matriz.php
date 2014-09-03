<?php

    echo '<meta charset=UTF-8>';
    include '../conexao/conecta.inc';    
    
    $sql = "SELECT * FROM livro";    
    $result = mysql_query($sql);    
    
    echo '<table name=LivrosHome border=1>';
    echo '<tr>            
            <th> </th>            
         </tr>';      
    
    while($livros = mysql_fetch_array($result))
    {                
            echo '<tr>';                        
            echo '<td>'.'<a href=http://www.selivrando.com.br/perfilLivro.php?codigo='.$livros['COD_LIVRO'].'> <img src=http://www.selivrando.com.br/uploads/'.$livros['URL_IMAGEM'].' /> </a>'.'</td>';
            echo '</tr>';
    }
    echo '</table> <br/>';  

?>