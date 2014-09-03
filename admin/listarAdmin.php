<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
 
<style>label { display: block; }</style>
<script type="text/javascript">
(function(){
	"use strict";
 
	var marcados = 0;
	var verifyCheckeds = function($checks) {
		if( marcados>=1 ) {
			loop($checks, function($element) {
				$element.disabled = $element.checked ? '' : 'disabled';
			});
		} else {
			loop($checks, function($element) {
				$element.disabled = '';
			});
		}
	};
	var loop = function($elements, cb) {
		var max = $elements.length;
		while(max--) {
			cb($elements[max]);
		}
	}
	var count = function($element) {
		return $element.checked ? marcados + 1 : marcados - 1;
	}
	window.onload = function(){
		var $checks = document.querySelectorAll('input[type="checkbox"]');
		loop($checks, function($element) {
			$element.onclick = function(){
				marcados = count(this);
				verifyCheckeds($checks);
			}
			if($element.checked) marcados = marcados + 1;
		});
		verifyCheckeds($checks);
	}
}
());
</script>
</head>
<body>
<?php
    echo '<meta charset=UTF-8>';
    include '../conexao/conecta.inc';    
    include '../status_usuario.php';
	
    

$usuarios     = $_SESSION['codigo'];
$sql = "UPDATE * FROM usuario SET ativo = '.getGet('status').' WHERE COD_USUARIO = '.$usuarios"; 
$result = mysql_query($query);
$totalUsuarios = mysql_fetch_array($result);
$tipoUsuario = $totalUsuarios['COD_TIPOUSUARIO'];

    $sql1 = "SELECT * FROM usuario WHERE COD_TIPOUSUARIO = 2";
    $result1 = mysql_query($sql1);
    
    echo '<table name=DadosAdmin class=tftable border=1>';
    echo '<tr>            
            <th>Nome</th>
            <th>Email</th>            
            <th>Atualizar</th>	
            <th>Alterar</th>	
            <th>Excluir</th>	
            <th>Desativar</th>	

         </tr>';
    
    while($usuarios = mysql_fetch_array($result1))
    {
            echo '<tr>';            
            echo '<td>'.utf8_encode($usuarios['NOME_USUARIO']).'</td>';
            echo '<td>'.utf8_encode($usuarios['EMAIL_USUARIO']).'</td>';            
            echo '<td> <a href=frmatualizarUsuarioAdm.php?codigo='.$usuarios['COD_USUARIO'].'> Atualizar </a> </td>';            
            echo '<td> <a href=restrito.php?codigo='.$usuarios['COD_USUARIO'].'> Restrito </a> </td>';			
            echo '<td> <a href=../excluir/excluirUsuario.php?codigo='.$usuarios['COD_USUARIO'].'> Excluir </a> </td>';
	    echo '<td> <a href=../excluir/desativar.php?codigo='.$usuarios['COD_USUARIO'].'> Desativar </a> </td>';			         
	    echo '   </td><br><br>
            </tr>';
    }
    echo '</table>'.'<br/>';    
        
?>