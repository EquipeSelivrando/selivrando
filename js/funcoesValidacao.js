//Validação Javascript
function valida(){
    if (cadastro.email.value !== cadastro.conf_email.value){
                alert ("E-mail não confere!");
                return false;
            }else if (cadastro.nome.value === ""){
                alert ("O campo nome é obrigatório!");
                cadastro.nome.focus();
                return false;            
            }else if (cadastro.email.value === ""){
                alert ("O campo E-mail é obrigatório!");
                cadastro.email.focus();
                return false;                   
            }else if (cadastro.conf_email.value === ""){
                alert ("O campo de confirmação do e-mail é obrigatório!");
                cadastro.conf_email.focus();
                return false;   
            } else if (cadastro.senha.value === ""){
                alert ("O campo senha é obrigatório!");
                cadastro.senha.focus();
                return false;                     
            }else if (cadastro.senha.value !== cadastro.conf_senha.value){
                alert ("Senhas não conferem!");
                return false;}
              else if(cadastro.senha.value.legth < 5){
                    alert("Digite uma senha válida ou acima de 5 dígitos");
                    return false;
                    cadastro.senha.focus();
            }
            else if(cadastro.email.value === "" || cadastro.email.value.indexOf('@')===-1 || cadastro.email.value.indexOf('.')===-1){
                    alert("Digite um e-mail válido. \n exemplo@exemplo.com");
                    return false;
                    cadastro.email.focus();
            }
             else if (cadastro.cep.value === ""){
                alert ("O campo CEP é obrigatório!");
                cadastro.cep.focus();
                return false; }
	else if (cadastro.captcha.value === ""){
                alert ("O preenchimento do captcha é obrigatório!");
                cadastro.captcha.focus();
                return false;            
            }
}

function validaLogin(){
    if (login.email.value === ""){
                alert ("O campo E-mail é obrigatório!");
                login.email.focus();
                return false;}
    else if(login.email.value === "" || login.email.value.indexOf('@')===-1 || login.email.value.indexOf('.')===-1){
                    alert("Digite um e-mail válido \n exemplo@exemplo.com ");
                    return false;
                    Login.email.focus();
      }
  }        
   
function validaLogin2(){
if (loginAdm.email.value === ""){
                alert ("O campo E-mail é obrigatório!");
                loginAdm.email.focus();
                return false;}
    else if(loginAdm.email.value === "" || loginAdm.email.value.indexOf('@')===-1 || loginAdm.email.value.indexOf('.')===-1){
                    alert("Digite um e-mail válido \n exemplo@exemplo.com ");
                    return false;
                    loginAdm.email.focus();
      }
            
}

function formatar(mascara, documento){
	  var i = documento.value.length;
	  var saida = mascara.substring(0,1);
	  var texto = mascara.substring(i);
	  
    if (texto.substring(0,1) !== saida){
	            documento.value += texto.substring(0,1);
	  }	  
	}

//adiciona mascara de data
function MascaraData(data){
        if(mascaraInteiro(data)==false){
                event.returnValue = false;
        }       
        return formataCampo(data, '00/00/0000', event);
}

//valida data
function ValidaData(data){
        exp = /\d{2}\/\d{2}\/\d{4}/
        if(!exp.test(data.value))
                alert('Data Invalida!');                        
}

//adiciona mascara ao telefone
function MascaraTelefone(telefone){	
	if(mascaraInteiro(telefone)==false){
		event.returnValue = false;
	}	
	return formataCampo(telefone, '(00) 0000-0000', event);
}


//valida telefone
function ValidaTelefone(telefone){
	exp = /\(\d{2}\)\ \d{4}\-\d{4}/
	if(!exp.test(telefone.value))
		alert('Numero de Telefone Invalido!');
}


//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
	var boleanoMascara; 
	
	var Digitato = evento.keyCode;
	exp = /\-|\.|\/|\(|\)| /g;
	campoSoNumeros = campo.value.toString().replace( exp, "" ); 
   
	var posicaoCampo = 0;	 
	var NovoValorCampo="";
	var TamanhoMascara = campoSoNumeros.length;; 
	
	if (Digitato != 8) { // backspace 
		for(i=0; i<= TamanhoMascara; i++) { 
			boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
								|| (Mascara.charAt(i) == "/")) 
			boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
								|| (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
			if (boleanoMascara) { 
				NovoValorCampo += Mascara.charAt(i); 
				  TamanhoMascara++;
			}else { 
				NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
				posicaoCampo++; 
			  }	   	 
		  }	 
		campo.value = NovoValorCampo;
		  return true; 
	}else { 
		return true; 
	}
}

function validaLivro()
		{
             if (Cadastro.titulo.value ===""){
                alert ("O campo título é obrigatório");
                Cadastro.titulo.focus();
                return false;            
            }else if (Cadastro.anopublicacao.value ===""){
                alerro.anopublicacao.focus();
                return false; 
            } else if (Cadastro.isbn.value ===""){
                alert ("O campo ISBN é obrigatório");
                Cadastro.isbn.focus();
                return false; 
            } else if (Cadastro.qntpgs.value ===""){
                alert ("O campo quantidade de páginas é obrigatório");
                Cadastro.qt ("O campo ano de publicação é obrigatório");
                Cadastro.anopublicacao.focus();
                return false; 
            } else if (Cadastro.isbn.value ===""){
                alert ("O campo ISBN é obrigatório");
                Cadastro.isbn.focus();
                return false; 
            } else if (Cadastro.qntpgs.value ===""){
                alert ("O campo quantidade de páginas é obrigatório");
                Cadastro.qntpgs.focus();
                return false;  
       
            } else if (Cadastro.sinopse.value ===""){
                alert ("O campo sinopse é obrigatório");
                Cadastro.sinopse.focus();
                return false;  
          
            } else if (Cadastro.img.value ===""){
                alert ("O campo inserir imagem é obrigatório");
                Cadastro.img.focus();
                return false;  
          	
            } else if (Cadastro.nomeautor.value ===""){
                alert ("O campo nome do autor é obrigatório");
                Cadastro.nomeautor.focus();
                return false;  
          
            } else if (Cadastro.editora.value ===""){
                alert ("O campo editora é obrigatório");
                Cadastro.editora.focus();
                return false;  
          
            } else if (Cadastro.genero.value ===""){
                alert ("O campo gênero é obrigatório");
                Cadastro.genero.focus();
                return false;  
          
            } else if (Cadastro.estadoconservacao.value ===""){
                alert ("O campo estado de conservação é obrigatório");
                Cadastro.estadoconservacao.focus();
                return false;  
          
            } 
 
       }       

function validaemail($email){
	//verifica se e-mail esta no formato correto de escrita
	if (!ereg('^([a-zA-Z0-9.-])*([@])([a-z0-9]).([a-z]{2,3})',$email)){
		$mensagem='E-mail Inválido!';
		return $mensagem;
    }
    else{
		//Valida o dominio
		$dominio=explode('@',$email);
		if(!checkdnsrr($dominio[1],'A')){
			$mensagem='E-mail Inválido!';
			return $mensagem;
		}
		else{return true;} // Retorno true para indicar que o e-mail é valido
	}
}

//Validação do arroba e ponto final (.)
    function validacaoEmail($email) {
    usuario = field.value.substring(0, field.value.indexOf("@")); 
    dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length); 
    
    if ((usuario.length >=1) && (dominio.length >=3) && (usuario.search("@")==-1) && (dominio.search("@")==-1) && (usuario.search(" ")==-1) && (dominio.search(" ")==-1) && (dominio.search(".")!=-1) && (dominio.indexOf(".") >=1)&& (dominio.lastIndexOf(".") < dominio.length - 1))
        { document.getElementById("msgemail").innerHTML="E-mail válido"; alert("email valido"); 
    } else{
        document.getElementById("msgemail").innerHTML="<font color='red'>Email inválido </font>"; alert("E-mail invalido"); 
        }
        
    usuario = field.value.substring(0, field.value.indexOf(".")); 
    dominio = field.value.substring(field.value.indexOf(".")+ 1, field.value.length); 
    
    if ((usuario.length >=1) && (dominio.length >=3) && (usuario.search(".")==-1) && (dominio.search(".")==-1) && (usuario.search(" ")==-1) && (dominio.search(" ")==-1) && (dominio.search(".")!=-1) && (dominio.indexOf(".") >=1)&& (dominio.lastIndexOf(".") < dominio.length - 1))
        { document.getElementById("msgemail").innerHTML="E-mail válido"; alert("email valido"); 
    } else{
        document.getElementById("msgemail").innerHTML="<font color='red'>Email inválido </font>"; alert("E-mail invalido"); 
        }
        
    } 

//function marcarFavorito