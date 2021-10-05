<?php
    function inserirEmpresa($conexao,$array){
        try {
            $query = $conexao->prepare("insert into empresa (nome_empresa, email_empresa, cnpj, senha_empresa, nome_responsavel, codigo_acesso, foto_empresa) values (?, ? , ?, ?, ?, ?, ?)");
                                                            //$nome_empresa, $email, $cnpj, $senha_banco, $nome_responsavel, $codigo_acesso, $foto

            $resultado = $query->execute($array);

        if($resultado)
        {
            $mensagem="Bem Vindo ".$array[0]." Seu cadastro foi concluído com sucesso";
            $assunto="Cadastro Sistema";

            $retorno= enviaEmail($array[1],$array[0],$mensagem,$assunto);
        
            $_SESSION["msg"]= "Cadastro Efetuado com sucesso";

        }
        else
        {
            $_SESSION["msg"].= 'Erro ao inserir <br>';
        }
            
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    function inserirTelefoneEmpresa($conexao, $array_telefone){
        try {
            $query = $conexao->prepare("insert into telefones_empresas (nr_telefone_empresa) values (?)");

            $resultado = $query->execute($array_telefone);

            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function listarProduto($conexao){
        try {
            $query = $conexao->prepare("SELECT * FROM produto");      
            $query->execute();
            $produtos = $query->fetchAll();
            return $produtos;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }  

    }

    function alterarRecrutador($conexao, $array){
        try {
            var_dump($array);
            $query = $conexao->prepare("update recrutador set nome_recrutador= ?, email_recrutador = ?, cpf = ?, senha = ? where codrecrutador = ?");
            $resultado = $query->execute($array);   
            var_dump($resultado);
            var_dump($query);
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarRecrutador($conexao, $array){
        try {
            $query = $conexao->prepare("delete from recrutador where codrecrutador = ?");
            $resultado = $query->execute($array);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    function buscarProduto($conexao,$array){
        try {
        $query = $conexao->prepare("select * from produto where codproduto=?");
        if($query->execute($array)){
            $produto = $query->fetch(); //coloca os dados num array $usuario
            return $produto;
        }
        else{
            return false;
        }
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
    }  
    }

    function loginEmpresa($conexao,$array_login,$senha){
        try {
        $query = $conexao->prepare("select * from empresa join telefones_empresas on (empresa.codempresa=telefones_empresas.codtelefone_empresa) where cnpj=?");
        if($query->execute($array_login)){
            $empresa = $query->fetch(); //coloca os dados num array $usuario
        
        if ($empresa && password_verify($senha,$empresa['senha_empresa']))
            {  
                echo 'Senha Correta';
                return $empresa;
            }
        else
            {
                echo 'Senha Incorreta';
                return false;
            }
        }
        else{
            return false;
        }
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
    }  
    }

    function listarUsuarioRecrutador($conexao){
        try {
        $query = $conexao->prepare("select * from usuario where competencia like ?");      
        $query->execute();
        $pessoas = $query->fetchAll();
        return $pessoas;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }  

    }

    function listarTelefoneUsuarioRecrutador($conexao, $array){
        try {
        $query = $conexao->prepare("select * from telefones_usuarios where codtelefone = ?");
        $query->execute($array);
        $usuarios_telefones = $query->fetch();
        return $usuarios_telefones;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }