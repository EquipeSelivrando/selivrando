<script type="text/javascript" src="js/funcoesValidacao.js"> </script>                

  <?php              
              include 'conexao/conecta.inc';              
                $codigo_usuario = $_SESSION['codigo'];              
              $sql = "SELECT * FROM usuario WHERE COD_USUARIO ='$codigo_usuario'";
              $result = mysql_query($sql);
              $usuarios = mysql_fetch_array($result);
        ?>

<form name="Troca" method="post" action="troca.php"> 
   <label> Data:<br/> </label>
   <script type="text/JavaScript">

   var data = new Date();
   var dia = data.getDate();
   var mes = data.getMonth();
   var ano = data.getFullYear();
   var sem = data.getDay();  
   var meses = new Array(11);
   var semana =new Array(6);
   
   meses[0] = 'janeiro';
   meses[1] = 'fevereiro';
   meses[2] = 'março';
   meses[3] = 'abril';
   meses[4] = 'maio';
   meses[5] = 'junho';
   meses[6] = 'julho';
   meses[7] = 'agosto';
   meses[8] = 'setembro';
   meses[9] = 'outubro';
   meses[10] = 'novembro';
   meses[11] = 'dezembro';
    
   semana[0] = 'Domingo';
   semana[1] = 'Segunda-feira';
   semana[2] = 'Terça-feira';
   semana[3] = 'Quarta-feira';
   semana[4] = 'Quinta-feira';
   semana[5] = 'Sexta-feira';
   semana[6] = 'Sábado';	
   document.write( semana[sem] + ' , ' +dia + ' de ' + meses[mes] + ' de ' + ano);
 </script>
<br/>

<script type="text/JavaScript">

 var relogio = new Date();
 var hora = relogio.getHours();
 var minuto = relogio.getMinutes();
 var segundo = relogio.getSeconds();
 
if( hora <=9){
  
  hora = '0' + hora;

}

if( minuto <=9){
  
  minuto = '0' + minuto;

}
if( segundo <=9){
  
  segundo = '0' + segundo;

}
  document.write( hora + ':' + minuto + ':' + segundo);

</script>
<br/>
<br/>     
    <label> Receptor: </label> <input type="text" name="receptor" value="<?php echo $usuarios['NOME_USUARIO'] ?>" > <br/>     
    <label> Remetente: </label> <input type="text" name="nome" > <!-- Solicitar o código do usuário visitado --> <br/><br/>
    <a href="http://www2.correios.com.br/sistemas/rastreamento/" target="quadro">Rastreamento</a>
 <br/>
   <input type="submit" onClick="return Validacao();"  value="Trocar"> 
</form>
<?php
        include_once 'includes/funcoesuteis.inc';
                $codRemetente = $_GET['perfil'];               
                $mensagem= "Solicitação de troca com o usuário:".$Remetente;
                salvaLog($mensagem);