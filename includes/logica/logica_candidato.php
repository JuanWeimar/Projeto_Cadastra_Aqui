<?php
    require_once('conecta.php');
    session_start();
    require_once('funcoes_usuario.php');
    require_once('../email/envia_email.php');
    require_once('config_upload.php');
#CADASTRO USUÁRIO
    if(isset($_POST['cadastrar'])){
        
        $nome = $_POST['nome_usuario'];
        $email = $_POST['email_usuario'];
        $cpf = $_POST['cpf'];
        $profissao = $_POST['profissão'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];


        $curriculo = $_FILES['curriculo']['name'];
        $tmp_curriculo = $_FILES['curriculo']['tmp_name'];
        move_uploaded_file($tmp_curriculo,'../curriculos/'.$curriculo);
        $competencia = $_POST['competencia'];
        $senha_usuario = $_POST['senha_usuario'];
        $senha_banco = password_hash($senha_usuario,PASSWORD_DEFAULT);
        $telefone = $_POST['nr_telefone_usuario'];
        $foto = $_FILES['foto']['name'];
        $tamanho_foto = $_FILES['foto']['size'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        if(!empty($foto)){

            if($sobrescrever=="não" && file_exists("$caminho/$foto"))
            die("Arquivo já existe");

            if($limitar_tamanho=="sim" && ($tamanho_foto > $tamanho_bytes))  
                die("Arquivo deve ter o no máximo $tamanho_bytes bytes");

            $ext = strrchr($foto,'.');
            if (($limitar_ext == "sim") && !in_array($ext,$extensoes_validas))
                die("Extensão de arquivo inválida para upload");

            if (move_uploaded_file($tmp_foto, '../fotos/'.$foto)) {
                echo " Upload do arquivo: ". $foto."concluído com sucesso"; }
                else {
                die( "Falha no envio do arquivo"); }
                }
                else{
                die("Selecione o arquivo a ser enviado"); }

        $array = array($nome, $email, $curriculo, $cpf, $senha_banco, $competencia, $profissao, $foto, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $estado);
        $array_login = array($email);
        $array_telefone = array($telefone);
        inserirUsuario($conexao, $array);
        inserirTelefoneUsuario($conexao, $array_telefone);
        $usuario = login($conexao, $array_login, $senha_usuario);
        $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
        $_SESSION['email_usuario'] = $usuario['email_usuario'];
        $_SESSION['cpf'] = $usuario['cpf'];
        $_SESSION['curriculo'] = $usuario['curriculo'];
        $_SESSION['nr_telefone_usuario'] = $usuario['nr_telefone_usuario'];
        $_SESSION['competencia'] = $usuario['competencia'];
        $_SESSION['foto'] = $usuario['foto_perfil'];
        header('location:../../index_candidato.php');
    }
#ENTRAR
    if(isset($_POST['entrar'])){
        //$email = $_POST['email_usuario'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha_usuario'];
        $senha_banco = password_hash($senha,PASSWORD_DEFAULT);
        //var_dump($senha_banco);
        $array = array($cpf);
        $usuario = login($conexao,$array,$senha);
        $array_telefone = array($usuario['codusuario']);
        var_dump($usuario);
        //$telefone = buscarUsuarioTelefone($conexao,$array_telefone);
        if($usuario){
            session_start();
            $_SESSION['codusuario'] = $usuario['codusuario'];
            $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
            $_SESSION['email_usuario'] = $usuario['email_usuario'];
            $_SESSION['cpf'] = $usuario['cpf'];
            $_SESSION['foto'] = $usuario['foto_perfil'];
            $_SESSION['curriculo'] = $usuario['curriculo'];
            $_SESSION['profissao'] = $usuario['profissao'];
            $_SESSION['cep'] = $usuario['cep'];
            $_SESSION['endereco'] = $usuario['endereço'];
            $_SESSION['numero'] = $usuario['numero'];
            $_SESSION['complemento'] = $usuario['complemento'];
            $_SESSION['bairro'] = $usuario['bairro'];
            $_SESSION['cidade'] = $usuario['cidade'];
            $_SESSION['estado'] = $usuario['uf'];
            $_SESSION['nr_telefone_usuario'] = $usuario['nr_telefone_usuario'];
            $_SESSION['competencia'] = $usuario['competencia'];
            header('location:../../index_candidato.php');
            
            
        }
        else{
            header('location:../html/login.html');
        }
    }

#SAIR
    if(isset($_POST['sair'])){
            session_start();
            session_destroy();
            header('location:../html/login.html');
    }

#EDITAR USUÁRIO
    if(isset($_POST['editar'])){
    
            $codusuario = $_POST['editar'];
            $array = array($codusuario);
            $array_telefone = array($codusuario);
            $usuario=buscarUsuario($conexao, $array);
            //$usuario_telefone=buscarUsuarioTelefone($conexao, $array_telefone);
            require_once('../../alterarCandidato.php');
    } 
    
#EDITAR SENHA USUÁRIO
    if(isset($_POST['editar_senha'])){

            $codusuario = $_POST['editar_senha'];
            $array = array($codusuario);
            $usuario = buscarUsuario($conexao, $array);
            var_dump($usuario);
            require_once('../../alterarSenha.php');
    }
#ALTERAR USUÁRIO
    if(isset($_POST['alterar'])){
    
            $codusuario = $_POST['codusuario'];
            $nome_usuario = $_POST['nome'];
            $email_usuario = $_POST['email'];
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];
            $telefone = $_POST['nr_telefone_usuario'];
            $curriculo = $_FILES['curriculo']['name'];
            $competencia = $_POST['competencia'];
            $profissao = $_POST['profissao'];
            $cep = $_POST['cep'];
            $endereco = $_POST['endereco'];
            $numero = $_POST['numero'];
            $complemento = $_POST['complemento'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $tmp_curriculo = $_FILES['curriculo']['tmp_name'];    
            $array = array($nome_usuario, $email_usuario, $cpf, $senha, $curriculo, $competencia, $profissao, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $estado, $codusuario);
            $array_telefone = array($telefone,$codusuario);
            move_uploaded_file($tmp_curriculo,'../curriculos/'.$curriculo);
            alterarUsuario($conexao, $array);
            alterarTelefoneUsuario($conexao, $array_telefone);
            $_SESSION['nome_usuario'] = $nome_usuario;
            $_SESSION['email_usuario'] = $email_usuario;
            $_SESSION['cpf'] = $cpf;
            $_SESSION['curriculo'] = $curriculo;
            $_SESSION['competencia'] = $competencia;
            $_SESSION['nr_telefone_usuario'] = $telefone;
            header('location:../../index_candidato.php');
    }

#ALTERAR SENHA USUÁRIO
    if(isset($_POST['alterar_senha'])){

            $codusuario = $_POST['codusuario'];
            $senha = $_POST['senha_nova'];
            $senha_nova = password_hash($senha, PASSWORD_DEFAULT);
            $array_senha = array($senha_nova, $codusuario);
            alterarSenhaUsuario($conexao, $array_senha);
            header('location:../html/login.html');
    }

#DELETAR USUÁRIO
    if(isset($_POST['deletar'])){
        $codusuario = $_POST['deletar'];
        $array=array($codusuario);
        deletarUsuario($conexao, $array);
        header('Location:../html/index.html');
    }

#PESQUISAR COMPETENCIA
    if(isset($_POST['pesquisar'])){
        $competencia = $_POST['competencia'];
        $array=array("%".$competencia."%");
        $usuarios=pesquisarUsuario($conexao, $array);
        require_once('../../mostrarUsuario.php');
    }
?>