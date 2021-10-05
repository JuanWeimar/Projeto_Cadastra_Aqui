<?php
    require_once('conecta.php');
    session_start();
    require_once('funcoes_usuario.php');
    require_once('../email/envia_email.php');
#CADASTRO USUÁRIO
    if(isset($_POST['cadastrar'])){
        
        $nome = $_POST['nome_usuario'];
        $email = $_POST['email_usuario'];
        $cpf = $_POST['cpf'];
        $curriculo = $_FILES['curriculo']['name'];
        $tmp_curriculo = $_FILES['curriculo']['tmp_name'];
        $competencia = $_POST['competencia'];
        $senha_usuario = $_POST['senha_usuario'];
        $senha_banco = password_hash($senha_usuario,PASSWORD_DEFAULT);
        $telefone = $_POST['nr_telefone_usuario'];
        $array = array($nome, $email, $curriculo, $cpf, $senha_banco, $competencia);
        $array_login = array($email);
        $array_telefone = array($telefone);
        move_uploaded_file($tmp_curriculo,'../curriculos/'.$curriculo);
        inserirUsuario($conexao, $array);
        inserirTelefoneUsuario($conexao, $array_telefone);
        $usuario = login($conexao, $array_login, $senha_usuario);
        $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
        $_SESSION['email_usuario'] = $usuario['email_usuario'];
        $_SESSION['cpf'] = $usuario['cpf'];
        $_SESSION['curriculo'] = $usuario['curriculo'];
        $_SESSION['nr_telefone_usuario'] = $usuario['nr_telefone_usuario'];
        $_SESSION['competencia'] = $usuario['competencia'];
        header('location:../../index_usuario.php');
    }
#ENTRAR
    if(isset($_POST['entrar'])){
        $email = $_POST['email_usuario'];
        $senha = $_POST['senha_usuario'];
        $senha_banco = password_hash($senha,PASSWORD_DEFAULT);
        //var_dump($senha_banco);
        $array = array($email);
        $usuario = login($conexao,$array,$senha);
        $array_telefone = array($usuario['codusuario']);
        //$telefone = buscarUsuarioTelefone($conexao,$array_telefone);
        if($usuario){
            session_start();
            $_SESSION['codusuario'] = $usuario['codusuario'];
            $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
            $_SESSION['email_usuario'] = $usuario['email_usuario'];
            $_SESSION['cpf'] = $usuario['cpf'];
            $_SESSION['curriculo'] = $usuario['curriculo'];
            $_SESSION['nr_telefone_usuario'] = $usuario['nr_telefone_usuario'];
            $_SESSION['competencia'] = $usuario['competencia'];
            header('location:../../index_usuario.php');
            
            
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
            var_dump($usuario);
            require_once('../../alterarUsuario.php');
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
            $tmp_curriculo = $_FILES['curriculo']['tmp_name'];    
            $array = array($nome_usuario, $email_usuario, $cpf, $senha, $curriculo, $competencia, $codusuario);
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
            header('location:../../index_usuario.php');
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
        header('Location:../html/login.html');
    }

#PESQUISAR COMPETENCIA
    if(isset($_POST['pesquisar'])){
        $competencia = $_POST['competencia'];
        $array=array("%".$competencia."%");
        $usuarios=pesquisarUsuario($conexao, $array);
        require_once('../../mostrarUsuario.php');
    }
?>