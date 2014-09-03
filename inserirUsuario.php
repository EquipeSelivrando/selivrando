<?php

include_once 'conexao/conecta.inc';
include_once 'classe/Bcrypt.class.php';
session_start();

if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{
echo '<script type="text/javascript">
         alert ("Você digitou os valores errados. \n Tente novamente!")                
            </script>';
}

$nome = isset($_POST['nome'])?utf8_decode($_POST['nome']):null;
$email = isset($_POST['email'])?utf8_decode($_POST['email']):null;
$logradouro = isset($_POST['logradouro'])?utf8_decode($_POST['logradouro']):null;
$cep = isset($_POST['cep'])?$_POST['cep']:null;
$telefone = isset($_POST['telefone'])?$_POST['telefone']:null;
$bairro = isset($_POST['bairro'])?$_POST['bairro']:null;
$cidade = isset($_POST['cidade'])?$_POST['cidade']:null;
$estado = isset($_POST['estado'])?$_POST['estado']:null;
$numero = isset($_POST['num'])?$_POST['num']:null;
$senha = isset($_POST['senha'])?$_POST['senha']:null;

//CIDADE
$sql = "SELECT * FROM cidade WHERE NOME_CIDADE = '$cidade'";
$result = mysql_query($sql);
$qtdeCidade = mysql_num_rows($result);
if($qtdeCidade == 1)
{
    $cidades = mysql_fetch_array($result);
    $cidade = $cidades['NOME_CIDADE'];
    $codCidade =  $cidades['COD_CIDADE'];
}else {
   $cidade = $cidade;
   $sql = "INSERT INTO cidade(NOME_CIDADE) VALUES('$cidade')";
    mysql_query($sql);
    $sql = "SELECT * FROM cidade WHERE NOME_CIDADE = '$cidade'";
    $result = mysql_query($sql);
    $cidades = mysql_fetch_array($result);
    $codCidade =  $cidades['COD_CIDADE'];
   }

//ESTADO
$sql2 = "SELECT * FROM estado WHERE UF_ESTADO = '$estado'";
$result2 = mysql_query($sql2);
$qtdeEstado = mysql_num_rows($result2);
if($qtdeEstado == 1)
{
    $estados = mysql_fetch_array($result2);
    $estado = $estados['UF_ESTADO'];
    $codEstado =  $estados['COD_ESTADO'];
}else {
   $estado = $estado;
   $sql2 = "INSERT INTO estado(UF_ESTADO) VALUES('$estado')";
    mysql_query($sql2);
    $sql2 = "SELECT * FROM estado WHERE UF_ESTADO = '$estado'";
    $result2 = mysql_query($sql2);
    $estados = mysql_fetch_array($result2);
    $codEstado =  $estados['COD_ESTADO'];
   }   


   
   
// criptografia
$senha = Bcrypt::hash($senha);

//INSERT Usuario
$tipoUsuario = 1;
$status_usuario = 1;
$inserirUsuario = "INSERT INTO usuario (NOME_USUARIO, EMAIL_USUARIO, COD_TIPOUSUARIO, LOGRADOURO_USUARIO, CEP_USUARIO, NUMERO_USUARIO, TELEFONE_USUARIO, BAIRRO_USUARIO, COD_CIDADE, COD_ESTADO, SENHA_USUARIO, STATUS_COD_STATUS)VALUES('$nome', '$email', $tipoUsuario, '$logradouro', '$cep', '$numero', '$telefone', '$bairro', $codCidade, $codEstado, '$senha', '$status_usuario')";

if(mysql_query($inserirUsuario)){
  
    $sql3 = "SELECT COD_USUARIO FROM usuario WHERE EMAIL_USUARIO ='$email'";
    $result4 = mysql_query($sql3);
    $codUsuarios = mysql_fetch_array($result4);
    $codUsuario = $codUsuarios['COD_USUARIO'];
                 // Criando a estante
   $estante = "INSERT INTO estante (USUARIO_COD_USUARIO)VALUES('$codUsuario')";
   if(mysql_query($estante))
   {
        echo '<script type="text/javascript">
         alert ("Cadastro realizado com sucesso. Faça Login!")
                location.href="index.php"
            </script>';
           $mensagem = "Criou sua conta no Se Livrando";
           salvaLog($mensagem);
      
     }  else{
        echo mysql_error();
   }
}
 else
 {
     echo mysql_error();
 }