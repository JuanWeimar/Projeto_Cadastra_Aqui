window.onload = function(){
    formulario_usuario.addEventListener("submit", validaFormulario)
    formulario_usuario.addEventListener("click", function(){vazia(this,event)})
    formulario_usuario.nr_telefone_usuario.addEventListener("keypress", function(){numeros(event,event.keyCode)})
    formulario_usuario.nr_telefone_usuario.addEventListener("keypress", function(){mascara_fone(this,event)})
    formulario_usuario.cpf.addEventListener("keypress", function(){numeros(event,event.keyCode)})
    formulario_usuario.cpf.addEventListener("keypress", function(){mascara_cpf(this,event)})
    formulario_usuario.addEventListener("click", buscaCep)
    
    
    var $input_curriculo = document.getElementById('curriculo'),
    $fileName_curriculo = document.getElementById('file-name-curriculo');

    $input_curriculo.addEventListener('change', function(){
    $fileName_curriculo.textContent = this.value;
});

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
    
            var cpf= document.getElementById('cpf').value.replace(/[^\d]+/g,'')
        if(TestaCPF(cpf)==false)
        {
            document.getElementById('cpf').classList.add('invalid')
            document.getElementById('mensagem').innerHTML="CPF Inválido"
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
            document.getElementById("formulario_usuario").submit();
        }
    }
    
    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;
    
        for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;
    
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
    
        Soma = 0;
          for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
          Resto = (Soma * 10) % 11;
    
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
    }
    
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
    
    function mascara_cpf(elemento,event){
            if(elemento.value.length>10)
            {
            event.preventDefault()
    
            }
    
            
            elemento_ajustado=elemento.value.replace(/^(\d{3})(\d{3})(\d{3})(\d{1})/,"$1.$2.$3-$4"); 
            elemento.value=elemento_ajustado
        
            
        }


     function vazia(event){
        let telefone = document.getElementById("nr_telefone_usuario").value,
            cpf = document.getElementById("cpf").value,
            nome = document.getElementById("nome_usuario").value,
            email = document.getElementById("email_usuario").value,
            competencia = document.getElementById("competencia").value,
            curriculo = document.getElementById("curriculo").value,
            senha = document.getElementById("senha_usuario").value;

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

            if(competencia=="")
            {
                document.getElementById('mensagem').innerHTML="Preencha os seguintes campos obrigatórios:Competencia";
                return true;
            }
            if(competencia!="")
            {
                document.getElementById('mensagem').innerHTML="";
            }

            if(curriculo=="")
            {
                document.getElementById('mensagem').innerHTML="Preencha os seguintes campos obrigatórios:Curriculo";
                return true;
            }
            if(curriculo!="")
            {
                document.getElementById('mensagem').innerHTML="";
            }

            if(senha=="")
            {
                document.getElementById('mensagem').innerHTML="Preencha os seguintes campos obrigatórios:Senha";
                return true;
            }

            
        } 

        function buscaCep() {
            let inputCep = document.querySelector('input[name=cep]');
            let cep = inputCep.value.replace('-', '');
            let url = 'http://viacep.com.br/ws/' + cep + '/json';
            let xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status = 200)
                        preencheCampos(JSON.parse(xhr.responseText));
                }
            }
            xhr.send();
        }

        function preencheCampos(json) {
            document.querySelector('input[name=endereco]').value = json.logradouro;
            document.querySelector('input[name=bairro]').value = json.bairro;
            document.querySelector('input[name=complemento]').value = json.complemento;
            document.querySelector('input[name=cidade]').value = json.localidade;
            document.querySelector('input[name=estado]').value = json.uf;
        }

    function mensagem_email(elemento_email)
    {
        document.getElementById('mensagem').innerHTML="Email Invalido";
        return;
    }