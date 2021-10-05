<?php
    session_start();
    require_once('conecta.php');
    require_once('funcoes_recrutador.php');

#CADASTRO RECRUTADOR
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome_recrutador'];
        $email = $_POST['email_recrutador'];
        $cpf = $_POST['cpf_recrutador'];
        $telefone = $_POST['nr_telefone_recrutador'];
        $empresa = $_POST['empresa'];
        $senha = $_POST['senha'];
        $array = array($nome, $email, $cpf, $senha, $empresa);
        $array_telefone = array($telefone);
        $array_login = array($email, $senha);
        inserirRecrutador($conexao, $array);
        inserirTelefoneRecrutador($conexao, $array_telefone);
        $recrutador =  loginRecrutador($conexao, $array_login);
        $_SESSION['nome_recrutador'] = $recrutador['nome_recrutador'];
        $_SESSION['codrecrutador'] = $recrutador['codrecrutador'];
        header('location:../../index_recrutador.php');
    }

#ENTRAR
    if(isset($_POST['entrar_rec'])){
    $email = $_POST['email_recrutador'];
    $senha = $_POST['senha'];
    $array_login = array($email, $senha);
    $recrutador = loginRecrutador($conexao,$array_login);
    if($recrutador){
        session_start();
        $_SESSION['codrecrutador'] = $recrutador['codrecrutador'];
        $_SESSION['nome_recrutador'] = $recrutador['nome_recrutador'];
        header('location:../../index_recrutador.php');
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

#DELETAR RECRUTADOR
if(isset($_POST['deletar'])){
    $codrecrutador = $_SESSION['codrecrutador'];
    $array=array($codrecrutador);
    deletarRecrutador($conexao, $array);
    header('location:../html/login.html');
}

#EDITAR RECRUTADOR
if(isset($_POST['editar'])){
    
    $codproduto = $_POST['editar'];
    $array = array($codproduto);
    $produto=buscarProduto($conexao, $array);
    require_once('../../alterarProduto.php');
}    

#ALTERAR RECRUTADOR
if(isset($_POST['alterar'])){
    
    $codproduto = $_POST['codproduto'];
    $nomeprod = $_POST['nomeprod'];
    $descprod = $_POST['descprod'];   
    $array = array($nomeprod, $descprod, $codproduto);
    alterarProduto($conexao, $array);

    header('location:../../listarProduto.php');
}
