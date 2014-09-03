<?php

echo '<meta charset=UTF-8>';
    include 'conexao/conecta.inc';
    session_start();
    $sql = "SELECT * FROM troca";
    $result = mysql_query($sql);    
    
    while($trocas = mysql_fetch_array($result))
    {
            echo '<tr>';           
            echo '<th> COD </th>';
            echo '<th> Data </th>';
            echo '<th> Situação </th>';           
            echo '<th> Livro </th>';
            echo '<th> Remetente </th>';
            echo '<th> Receptor </th>';
            echo '<th> Correio </th>';             
            echo '</tr>';
            
            echo '<tr>';          
            echo '<td>'.$trocas['COD_TROCA'].'</td>';
            echo '<td>'.$trocas['DATA_TROCA'].'</td>';
            echo '<td>'.$trocas['SITUACAO_TROCA'].'</td>';            
            echo '<td>'.$trocas['NOME_LIVRO'].'</td>';
            echo '<td>'.$trocas['REMETENTE_TROCA'].'</td>';
            echo '<td>'.$trocas['RECEPTOR_TROCA'].'</td>';
            echo '<td>'.$trocas['STATUS_CORREIO'].'</td>';
                                     
            echo '</tr>';
    }

?>