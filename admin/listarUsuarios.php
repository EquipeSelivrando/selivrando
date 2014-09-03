<?php

    echo '<meta charset=UTF-8>';
    include '../conexao/conecta.inc';    
    
    $sql = "SELECT * FROM usuario";    
    $result = mysql_query($sql);    
    
    echo '<table name=DadosUsuario class=tftable border=1>';
    echo '<tr>            
            <th>Nome</th>
            <th>Email</th>            
            <th>Tipo</th>
            <th>Atualizar</th>
            <th>Alterar</th>            
            <th>Desativar</th>
         </tr>';      
    
    while($usuarios = mysql_fetch_array($result))
    {
        $sql2 = "SELECT * FROM tipo_usuario";
        $result2 = mysql_query($sql2);
        $tipoUsuario = mysql_fetch_array($result2);
        
            echo '<tr>';            
            echo '<td>'.utf8_encode($usuarios['NOME_USUARIO']).'</td>';
            echo '<td>'.utf8_encode($usuarios['EMAIL_USUARIO']).'</td>';            
            echo '<td>'.utf8_encode($tipoUsuario['NOME_TIPOUSUARIO']).'</td>';
            echo '<td> <a href=frmatualizarUsuarioAdm.php?codigo='.$usuarios['COD_USUARIO'].'> Atualizar </a> </td>';
            echo '<td> <a href=novoADM.php?codigo='.$usuarios['COD_USUARIO'].'> ADM </a> </td>';        
            echo '<td> <a href=../excluir/desativar.php?codigo='.$usuarios['COD_USUARIO'].'> Desativar </a> </td>';
            echo '</tr>';
    }
    echo '</table> <br/>';  

?>