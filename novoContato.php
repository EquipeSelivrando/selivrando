<?php
include_once 'conexao/conecta.php';
include_once 'includes/funcoesuteis.inc';

$data = date('d/m/Y H:i:s'); 
$email = isset($_POST['email'])?utf8_decode($_POST['email']):null;
$assunto = isset($_POST['assunto'])?utf8_decode($_POST['assunto']):null;
$descricao = isset($_POST['mensagem'])?utf8_decode($_POST['mensagem']):null;
$status = isset($_POST['status'])?utf8_decode($_POST['status']):null;
$codUsuario = $_SESSION['codigo'];             

//Inserir dados do Contato no banco
$inserirContato = "INSERT INTO contato (DATA_CONTATO, ASSUNTO_CONTATO, DESCRICAO_CONTATO, STATUS_CONTATO, USUARIO_COD_USUARIO, EMAIL_CONTATO) VALUES ($data, $assunto, $descricao, $status, $codUsuario, $email)";

if (mysql_query($inserirContato)){
    echo '<script type="text/javascript">
         alert ("Sua mensagem foi enviada! \n Fique atento ao seu e-mail.")
                location.href="perfilUsuario.php"
            </script>';
    $mensagem = "Entrou em contato com o site";
   salvaLog($mensagem);
}
else{
    echo mysql_error();
}