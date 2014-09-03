<?php

include_once 'conexao/conecta.inc';
echo '<meta charset=UTF-8>';
$codigo_usuario = $_SESSION['codigo'];
$sql = "SELECT * FROM log WHERE USUARIO_COD_USUARIO = $codigo_usuario ";
$result = mysql_query($sql);

echo '<table name=registroLog border=1>';
    echo '<tr>
      <th> Data/Hora </th>
   <th> Mensagem </th>
     <th> Excluir </th>
</tr>';
    while($log = mysql_fetch_array($result))
    {
            echo '<tr>';            
            echo '<td>'.$log['HORA_LOG'].'</td>';
            echo '<td>'.$log['MENSAGEM_LOG'].'</td>';                                    
            echo '<td> <a href=excluir/excluirLog.php> Excluir </a> </td>';
            echo '</tr>';
    }
    echo '</table> <br/>';    
?>	