window.onload = function(){
    formulario_empresa.addEventListener("submit", validaFormulario)
    formulario_empresa.addEventListener("click", function(){vazia(this,event)})
    formulario_empresa.nr_telefone_empresa.addEventListener("keypress", function(){numeros(event,event.keyCode)})
    formulario_empresa.nr_telefone_empresa.addEventListener("keypress", function(){mascara_fone(this,event)})
    
    formulario_empresa.cnpj.addEventListener("keypress", function(){numeros(event,event.keyCode)})
    formulario_empresa.cnpj.addEventListener("keypress", function(){mascara_cnpj(this,event)})

    var $input_foto = document.getElementById('foto'),
    $fileName_foto = document.getElementById('file-name-foto');

    $input_foto.addEventListener('change', function(){
    $fileName_foto.textContent = this.value;
});

    }
    

    function validaFormulario(event)
    {
        event.preventDefault()
            var campos = document.querySelectorAll('input[value=""]'),
                submeter=true;
    
            var cnpj= document.getElementById('cnpj').value.replace(/[^\d]+/g,'')
        if(TestaCNPJ(cnpj)==false)
        {
            document.getElementById('cnpj').classList.add('invalid')
            document.getElementById('mensagem').innerHTML="CNPJ Inválido"
            submeter=false
        }
    

    campos.forEach(function (campo, indice) {
        
        if(campo.value=="")
        {
            
            campo.classList.add('invalid')
            
            document.getElementById('mensagem').innerHTML="Campos Obrigatorios"
            submeter=false
            campo.addEventListener("change", function(){campo.classList.remove('invalid')});
        }
        else
        {
            if(campo.classList.contains('invalid')==true)
            {
                campo.classList.remove('invalid')
            }
    
        }

        })

            if(submeter==true)
            {
                document.getElementById("formulario_empresa").submit()
            }
    }

    function TestaCNPJ(cnpj) {
        cnpj = cnpj.replace(/[^\d]+/g, '');
        if (cnpj == '') return false;
        if (cnpj.length != 14)
        return false;
        if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        return false;
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
        pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) return false;
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
        pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
        return false;
        return true;
        }
    
    // function TestaCPF(strCPF) {
    //     var Soma;
    //     var Resto;
    //     Soma = 0;
    //     if (strCPF == "00000000000") return false;
    
    //     for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
    //     Resto = (Soma * 10) % 11;
    
    //     if ((Resto == 10) || (Resto == 11))  Resto = 0;
    //     if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
    
    //     Soma = 0;
    //       for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    //       Resto = (Soma * 10) % 11;
    
    //     if ((Resto == 10) || (Resto == 11))  Resto = 0;
    //     if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    //     return true;
    // }
    
    function numeros(event,tecla){

        if ((tecla < 47 || tecla > 58) && tecla != 40 && tecla != 41 && tecla != 45) 
                    
            {
                event.preventDefault() 
            }
    
        
        }
    function mascara_fone(elemento,event){
            if(elemento.value.length>14)
            {
            event.preventDefault()
    
            }
            elemento_ajustado=elemento.value.replace(/^(\d{2})(\d)/g,"($1) $2"); 
            elemento.value=elemento_ajustado
            elemento_ajustado=elemento.value.replace(/(\d{4})(\d{4})/g,"$1-$2")    
            elemento.value=elemento_ajustado  
        }
    
    //function mascara_cpf(elemento,event){
      //      if(elemento.value.length>10)
        //    {
          //  event.preventDefault()
    
            //}
    
            
            //elemento_ajustado=elemento.value.replace(/^(\d{3})(\d{3})(\d{3})(\d{1})/,"$1.$2.$3-$4"); 
            //elemento.value=elemento_ajustado
        
            
        //}

    function mascara_cnpj(elemento,event){
            if(elemento.value.length>13)
            {
            event.preventDefault()
    
            }
    
            
            elemento_ajustado=elemento.value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5"); 
            elemento.value=elemento_ajustado
        
            
        }
    


    function vazia(event){
        let telefone = document.getElementById("nr_telefone_recrutador").value,
            cpf = document.getElementById("cpf_recrutador").value,
            nome = document.getElementById("nome_recrutador").value,
            email = document.getElementById("email_recrutador").value,
            empresa = document.getElementById("empresa").value,
            senha = document.getElementById("senha").value;

            if(nome=="")
            {
                document.getElementById('mensagem').innerHTML="Preencha os seguintes campos obrigatórios:Nome";
                return true;
            }
            if(nome!="")
            {
                document.getElementById('mensagem').innerHTML="";
            }

            if(email=="")
            {
                document.getElementById('mensagem').innerHTML="Preencha os seguintes campos obrigatórios:Email";
                return true;
            }
            if(email!="")
            {
                    let usuario = email.substring(0, email.indexOf("@")),
                        dominio = email.substring(email.indexOf("@")+ 1, email.length),
                        msn;
                    if ((usuario.length >=1) &&
                        (dominio.length >=3) &&
                        (usuario.search("@")==-1) &&
                        (dominio.search("@")==-1) &&
                        (usuario.search(" ")==-1) &&
                        (dominio.search(" ")==-1) &&
                        (dominio.search(".")!=-1) &&
                        (dominio.indexOf(".") >=1)&&
                        (dominio.lastIndexOf(".") < dominio.length - 1)) {
                        msn = document.getElementById('mensagem').innerHTML="";
                    //return msn;
                    }
                    else
                    {
                        msn = document.getElementById('mensagem').innerHTML="Email Inválido";
                        return msn;
                    }
                    
                
            }

            if(telefone=="")
            {
                document.getElementById('mensagem').innerHTML="Preencha os seguintes campos obrigatórios:Telefone";
                return true;
            }
            if(telefone!="")
            {
                document.getElementById('mensagem').innerHTML="";
            }

            if(cpf=="")
            {
                document.getElementById('mensagem').innerHTML="Preencha os seguintes campos obrigatórios:CPF";
                return true;
            }
            if(cpf!="")
            {
                document.getElementById('mensagem').innerHTML="";
            }

            if(empresa=="")
            {
                document.getElementById('mensagem').innerHTML="Preencha os seguintes campos obrigatórios:Empresa";
                return true;
            }
            if(empresa!="")
            {
                document.getElementById('mensagem').innerHTML="";
            }

            if(senha=="")
            {
                document.getElementById('mensagem').innerHTML="Preencha os seguintes campos obrigatórios:Senha";
                return true;
            }

            
        }

    function mensagem_email(elemento_email)
    {
        document.getElementById('mensagem').innerHTML="Email Invalido";
        return;
    }