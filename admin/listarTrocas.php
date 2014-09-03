<?php

    echo '<meta charset=UTF-8>';
    include '../conexao/conecta.inc';    
    
    $sql = "SELECT * FROM troca";
    $result = mysql_query($sql);
    
    echo '<table name=Trocas class=tftable border=1 >';
            echo '<tr>';
            echo '<th> COD </th>';
            echo '<th> Usuário 1 </th>';
            echo '<th> Data </th>';
            echo '<th> Situação </th>';
            echo '<th> Receptor </th>';
            echo '<th> COD Livro </th>';
            echo '<th> Remetente </th>';
            echo '<th> Status Correio </th>';
            echo '<th> Usuário 2 </th>';
            echo '</tr>';
            
    while($trocas = mysql_fetch_array($result))
    {                        
            echo '<tr>';
            echo '<td>'.$trocas['COD_TROCA'].'</td>';
            echo '<td>'.$trocas['COD_USUARIO'].'</td>';
            echo '<td>'.$trocas['DATA_TROCA'].'</td>';
            echo '<td>'.$trocas['SITUACAO_TROCA'].'</td>';
            echo '<td>'.$trocas['RECEPTOR_TROCA'].'</td>';
            echo '<td>'.$trocas['COD_LIVRO'].'</td>';
            echo '<td>'.$trocas['REMETENTE_TROCA'].'</td>';
            echo '<td>'.$trocas['STATUS_CORREIO'].'</td>';
            echo '<td>'.$trocas['USUARIO2_TROCA'].'</td>';
            
            echo '<td> <a href=../excluir/excluirTroca.php?codigo='.$trocas['COD_TROCA'].'> Excluir </a> </td>';
            echo '</tr>';
    }
echo '</table>';

?>
