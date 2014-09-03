<?php session_start(); ?>

<?php

function validaAutenticacao($url, $tipo)
{
    if ($tipo === '1'){
    include_once 'conexao/conecta.inc';
    }
    
    else if ($tipo === '2'){
        include_once '../conexao/conecta.inc';    
        
    }

    if(!isset($_SESSION['email']) or !isset($_SESSION['senha']))
    {        
        session_destroy();
        echo '<script type="text/javascript">
                location.href="'.$url.'"    
            </script>';
    }
    echo '<meta charset=UTF-8>';
   $email    = $_SESSION['email'];
   $senha    = $_SESSION['senha'];
   $query    = "SELECT * FROM usuario WHERE EMAIL_USUARIO='$email'";
   $result   = mysql_query($query);
   $usuarios = mysql_fetch_array($result);    

    $emailCadastrado       = $usuarios['EMAIL_USUARIO'];
    $senhaCadastrada       = $usuarios['SENHA_USUARIO'];
    $tipoUsuarioCadastrado = $usuarios['COD_TIPOUSUARIO'];
        
    $query2 = "SELECT STATUS_USUARIO FROM usuario WHERE EMAIL_USUARIO = $email";
    $result2 = mysql_query($query2);
    $status = mysql_fetch_array($result2);
    
    if ($status == 2){
       session_destroy();
       echo '<script type="text/javascript">
                alert ("Usuário Desativado!! \n Entre em contato com o site para saber mais.");
                location.href="'.$url.'"
            </script>';
    }else{
    
    if ($email != $emailCadastrado){
       session_destroy();   
      echo 'Email não confere! <br/>';
       echo '<script type="text/javascript">
                alert ("Email não confere!");
                location.href="'.$url.'"    
            </script>';
    } 
    //criptografar $senha
    if($tipoUsuarioCadastrado == '1'){
        include 'classe/Bcrypt.class.php';
    }
    else if($tipoUsuarioCadastrado == '2'){
        include '../classe/Bcrypt.class.php';                
    }
    $hash = Bcrypt::hash($senha);
    //comparar
       if($hash != $senhaCadastrada){
        session_destroy();
         echo 'Senha não confere! <br/>';
        echo '<script type="text/javascript">
                alert ("Senha não confere!");
                location.href="'.$url.'"    
            </script>';
    }
        else if ($tipo != $tipoUsuarioCadastrado) {
        session_destroy();
        echo 'Acesso negado para esse tipo de usuário!';     
        echo '<script type="text/javascript">
                alert ("Acesso negado\n Tipo de usuário inválido!");
                location.href="'.$url.'"    
            </script>';
    }
}}

function gerarSenha($tamanho = 22)
    {    
       return substr(sha1(mt_rand()), 0, $tamanho);
    }


function salvaLog($mensagem) {
$codigo_usuario = $_SESSION['codigo']; // Salva o código do usuário
$datetime = date('d/m/Y H:i:s'); // Salva a data e hora atual (formato MySQL) 

// Usamos o mysql_escape_string() para poder inserir a mensagem no banco
//sem ter problemas com aspas e outros caracteres
$mensagem = mysql_escape_string($mensagem);
 
// Monta a query para inserir o log no sistema
$query = "INSERT INTO log (HORA_LOG, MENSAGEM_LOG, USUARIO_COD_USUARIO) VALUES ('$datetime', '$mensagem', '$codigo_usuario')";

        if (mysql_query($query)) {
            return true;
        } else {
            return false;
        }
}
