<?php
    session_start();
    require_once('conecta.php');
    require_once('funcoes_recrutador.php');
    require_once('../email/envia_email.php');
    require_once('config_upload.php');

#CADASTRO EMPRESA
    if(isset($_POST['cadastrar'])){
        $nome_empresa = $_POST['nome_empresa'];
        $email = $_POST['email_empresa'];
        $cnpj = $_POST['cnpj'];
        $telefone_empresa = $_POST['nr_telefone_empresa'];
        $nome_responsavel = $_POST['nome_responsavel'];
        $codigo_acesso = $_POST['codigo_acesso'];
        $senha_empresa = $_POST['senha_empresa'];
        $senha_banco = password_hash($senha_empresa, PASSWORD_DEFAULT);
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
        $array = array($nome_empresa, $email, $cnpj, $senha_banco, $nome_responsavel, $codigo_acesso, $foto);
        $array_telefone = array($telefone_empresa);
        $array_login = array($cnpj, $senha_banco);
        inserirEmpresa($conexao, $array);
        inserirTelefoneEmpresa($conexao, $array_telefone);
        $empresa =  loginEmpresa($conexao, $array_login, $senha_empresa);
        $_SESSION['nome_empresa'] = $empresa['nome_empresa'];
        $_SESSION['codempresa'] = $empresa['codempresa'];
        $_SESSION['foto'] = $empresa['foto_empresa'];
        header('location:../../index_empresa.php');
    }

#ENTRAR
    if(isset($_POST['entrar_emp'])){
    $cnpj = $_POST['cnpj'];
    $senha = $_POST['senha_empresa'];
    $senha_banco = password_hash($senha, PASSWORD_DEFAULT);
    $array_login = array($cnpj);
    $empresa = loginEmpresa($conexao,$array_login,$senha);
    if($empresa){
        session_start();
        $_SESSION['codempresa'] = $empresa['codempresa'];
        $_SESSION['nome_empresa'] = $empresa['nome_empresa'];
        $_SESSION['foto'] = $empresa['foto_empresa'];
        header('location:../../index_empresa.php');
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
