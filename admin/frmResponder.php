<?php
              $codMensagem =  $_SESSION['codMsg'];
              $sql = "SELECT * FROM contato WHERE COD_CONTATO ='$codMensagem'";
              $result = mysql_query($sql);
              $mensagem = mysql_fetch_array($result);
                            
?>

<form name="responder" action="enviarMsg.php" method="post">
Para: <input type="email" name="email" value="<?php echo $mensagem['EMAIL_CONTATO']?>"> <br>
Assunto: <input type="text" name="assunto" value="<?php echo $mensagem['ASSUNTO_CONTATO']?>"><br>
Mensagem Recebida: <textarea name="mensagem" cols="30" rows="5" placeholder="<?php echo $mensagem['MENSAGEM_CONTATO'] ?>"> </textarea> <br>
Resposta: <textarea name="resposta" cols="35" rows="6"> </textarea>
Status: <select name="status">
    <option> Resolvido </option>
    <option> Não Resolvido </option>
    </select>
<input type="submit" name="enviar" value="Responder">
</form>
