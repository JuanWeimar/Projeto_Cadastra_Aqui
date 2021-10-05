<?php
    function inserirUsuario($conexao,$array){
        try {
            $query = $conexao->prepare("insert into usuario (nome_usuario, email_usuario, curriculo, cpf, senha_usuario, competencia, profissao, foto_perfil, cep, endereço, numero, complemento, bairro, cidade, uf) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            //$nome, $email, $curriculo, $cpf, $senha_banco, $competencia, $foto, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $estado

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

    function inserirTelefoneUsuario($conexao,$array_telefone){
        try {
            $query = $conexao->prepare("insert into telefones_usuarios (nr_telefone_usuario)  values (?)");

            $resultado = $query->execute($array_telefone);

            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function alterarUsuario($conexao, $array){
        try {
            $query = $conexao->prepare("update usuario set nome_usuario= ?, email_usuario = ?, cpf= ?, senha_usuario= ?, curriculo= ?, competencia= ?, profissao=?, cep=?, endereço=?, numero=?, complemento=?, bairro=?, cidade=?, uf=? where codusuario = ?");
                                                                                            //$profissao, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $estado
            $resultado = $query->execute($array);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function alterarSenhaUsuario($conexao, $array){
        try {
            $query = $conexao->prepare("update usuario set senha_usuario= ? where codusuario = ?");
            $resultado = $query->execute($array);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function alterarTelefoneUsuario($conexao, $array){
        try {
            $query = $conexao->prepare("update telefones_usuarios set nr_telefone_usuario = ? where codtelefone = ?");
            $resultado = $query->execute($array);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarUsuario($conexao, $array){
        try {
            $query = $conexao->prepare("delete from usuario where codusuario = ?");
            $resultado = $query->execute($array);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    function listarUsuario($conexao){
        try {
        $query = $conexao->prepare("SELECT * FROM usuario");      
        $query->execute();
        $pessoas = $query->fetchAll();
        return $pessoas;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }  

    }

    function listarTelefoneUsuario($conexao, $array){
        try {
        $query = $conexao->prepare("select * from telefones_usuarios where codtelefone = ?");
        $query->execute($array);
        $usuarios_telefones = $query->fetch();
        return $usuarios_telefones;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function buscarUsuario($conexao,$array){
        try {
        $query = $conexao->prepare("select * from usuario join telefones_usuarios on (usuario.codusuario=telefones_usuarios.codtelefone) where codusuario=?");
        if($query->execute($array)){
            $usuario = $query->fetch(); //coloca os dados num array $usuario
            return $usuario;
        }
        else{
            return false;
        }
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }  
    }

    function buscarUsuarioTelefone($conexao,$array_telefone){
        try {
        $query = $conexao->prepare("select * from telefones_usuarios where codtelefone=?");
        if($query->execute($array_telefone)){
            $usuarios_telefones = $query->fetch(); //coloca os dados num array $usuario
            return $usuarios_telefones;
        }
        else{
            return false;
        }
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }  
    }

    function login($conexao,$array_login,$senha){
        try {
        $query = $conexao->prepare("select * from usuario join telefones_usuarios on (usuario.codusuario=telefones_usuarios.codtelefone) where cpf=?");
        if($query->execute($array_login)){
            $usuario = $query->fetch(); //coloca os dados num array $usuario
            
        if ($usuario && password_verify($senha,$usuario['senha_usuario']))
            {  
                echo 'Senha Correta';
                return $usuario;
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

    function pesquisarUsuario($conexao,$array){
        try {
        $query = $conexao->prepare("select * from usuario where competencia like ?");
        if($query->execute($array)){
            $usuarios = $query->fetchAll(); //coloca os dados num array $pessoa
            
        if ($usuarios)
            {  
                return $usuarios;
            }
        else
            {
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
    
?>