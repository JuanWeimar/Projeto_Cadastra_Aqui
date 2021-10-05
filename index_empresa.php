<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once('includes/logica/funcoes_usuario.php');
include_once('includes/logica/conecta.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="includes/css/style_candidato.css">
</head>
<body>
    <header class="menu">
        <div class="position-box">
            <div class="box">
                <label class="avatar" for="btn">
                    <img src="includes/fotos/<?php echo $_SESSION['foto']; ?>" width='100px' height='100px'/>

                </label>
                <input type="checkbox" id="btn">
                <div class="menu-box">
                    <a href="#"><i class="fa fa-upload"> <span>upload</span></i></a>
                    <br>
                    <a href="#"><i class="fa fa-edit"> <span>edite</span></i></a>
                </div>
            </div>
        </div>
        
        <p class="usuario"><?php echo $_SESSION['nome_empresa']; ?>  </p>
        <input class="input-pesquisa" type="search" name="pesquisar" id="pesquisar" placeholder="Pesquisar vagas">

        <img class="logo" src="includes/imagens/Cópia de Cadastra Aqui Logotipo.png" alt="">

        <nav>
            <li class="mensagens"><a href="mensagens.php">Mensagens</a></li>
            <img class="btn-msg" src="includes/imagens/Mensagem.png" alt="">
            <li class="notificacoes"><a href="notificacoes.php">Notificações</a></li>
            <img class="btn-notif" src="includes/imagens/Notificação.png" alt="">
            <li class="sair"><a href="includes/html/index.html">Sair</a></li>
            <img class="btn-sair" src="includes/imagens/Sair.png" alt="">
        </nav>
    </header>
    <section>
        <nav class="menu-vertical">
            <img class="btn-edit" src="includes/imagens/edit.png" alt="">
            <li class="editar"><a href="editar_empresa.php">Editar Perfil</a></li>
            <img class="btn-vagas" src="includes/imagens/Mais_vagas.png" alt="">
            <li class="mais_vagas"><a href="publicar_vagas.php">Publicar Vagas</a></li>
            <img class="btn-config" src="includes/imagens/config.png" alt="">
            <li class="config"><a href="configuracoes.php">Configurações</a></li>
            <img class="btn-ajuda" src="includes/imagens/ajuda.png" alt="">
            <li class="ajuda"><a href="ajuda.php">Ajuda</a></li>
        </nav>
    </section>
</body>
</html>