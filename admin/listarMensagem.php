<?php
  
echo '<meta charset=UTF-8>';
    include '../conexao/conecta.inc';
    
    $sql = "SELECT * FROM contato";
   $result = mysql_query($sql);
     
    echo '<table name=DadosMensagens class=tftable  border=1>';
            echo '<tr>';            
            echo '<th> COD </th>';
            echo '<th> DATA </th>';
            echo '<th> NOME </th>';
            echo '<th> ASSUNTO </th>';
            echo '<th> MENSAGEM </th>';
            echo '<th> USUÁRIO </th>';
            echo '<th> STATUS </th>';
            echo '<th> E-MAIL </th>';
            echo '</tr>';
            
    while($mensagens = mysql_fetch_array($result))
    {                        
            echo '<tr>';
            echo '<td name=codigoMensagem>'.$mensagens['COD_CONTATO'].'</td>'; 
            
            $codigoMensagem = $_POST['codigoMensagem'];
            $_SESSION['codMsg'] = $codigoMensagem;
            
            echo '<td>'.$mensagens['DATA_CONTATO'].'</td>';             
            echo '<td>'.$mensagens['ASSUNTO_CONTATO'].'</td>'; 
            echo '<td>'.$mensagens['MENSAGEM_CONTATO'].'</td>'; 
            echo '<td>'.$mensagens['USUARIO_COD_USUARIO'].'</td>'; 
            echo '<td>'.$mensagens['STATUS_CONTATO'].'</td>';
            echo '<td>'.$mensagens['EMAIL_CONTATO'].'</td>';
            echo '<a href=frmResponder.php?codigo='.$codigoMensagem.'> Responder </a>';
            echo '<td><a href=../excluir/excluirMsg.php?codigo='.$mensagens['COD_CONTATO'].'> Excluir </a> </td>';            
            echo '</tr>';
    }
echo '</table>';
  
?>