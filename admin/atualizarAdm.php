<?php
 include '../conexao/conecta.inc';
 include_once '../includes/funcoesuteis.inc';
 include '../classe/Bcrypt.class.php';
 
$codigo_usuario     = $_GET['codigo'];
$nome_usuario       = isset($_POST['nome'])?$_POST['nome']:null;
$email_usuario      = isset($_POST['email'])?$_POST['email']:null;
$cep_usuario        = isset($_POST['cep'])?$_POST['cep']:null;
$logradouro_usuario = isset($_POST['rua'])?$_POST['rua']:null;
$num_usuario        = isset($_POST['num'])?$_POST['num']:null;
$bairro_usuario     = isset($_POST['bairro'])?$_POST['bairro']:null;
$cidade             = isset($_POST['cidade'])?$_POST['cidade']:null;
$estado             = isset($_POST['estado'])?$_POST['estado']:null;
$telefone_usuario   = isset($_POST['telefone'])?$_POST['telefone']:null;


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
    
//SENHA cadastrada
   $query = "SELECT * FROM usuario WHERE COD_USUARIO = $codigo_usuario";
   $result3 = mysql_query($query);
   $usuario = mysql_fetch_array($result3);
   $senha = $usuario['SENHA_USUARIO'];

$AtualizaAdm = "UPDATE usuario SET NOME_USUARIO = '$nome_usuario', LOGRADOURO_USUARIO = '$logradouro_usuario', CEP_USUARIO ='$cep_usuario', COD_CIDADE='$codCidade', COD_ESTADO='$codEstado', EMAIL_USUARIO='$email_usuario', SENHA_USUARIO='$senha', BAIRRO_USUARIO='$bairro_usuario', TELEFONE_USUARIO='$telefone_usuario', NUMERO_USUARIO='$num_usuario'  WHERE COD_USUARIO = '$codigo_usuario'";

if(mysql_query($AtualizaAdm)){
    echo '<script type="text/javascript">
         alert ("Dados atualizados com sucesso!")
                location.href="indexadmin.php"
            </script>;';
    $mensagem = "Atualizou os dados de cadastro";
   salvaLog($mensagem);
}
else{
    echo mysql_error();
}
