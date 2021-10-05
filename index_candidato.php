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
    <link rel="apple-touch-icon" sizes="144x144" href="includes/imagens/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="includes/imagens/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="includes/imagens/favicon.ico">
    <link rel="mask-icon" href="includes/imagens/favicon.ico" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Meu Perfil</title>
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
        
        <p class="usuario"><?php echo $_SESSION['nome_usuario']; ?>  </p>
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
            <li class="editar"><a href="editar_perfil.php">Editar Perfil</a></li>
            <img class="btn-vagas" src="includes/imagens/Mais_vagas.png" alt="">
            <li class="mais_vagas"><a href="mais_vagas.php">Mais Vagas</a></li>
            <img class="btn-config" src="includes/imagens/config.png" alt="">
            <li class="config"><a href="configuracoes.php">Configurações</a></li>
            <img class="btn-ajuda" src="includes/imagens/ajuda.png" alt="">
            <li class="ajuda"><a href="ajuda.php">Ajuda</a></li>
        </nav>
    </section>

    <footer class="rodape">
        <div class="contato">
            <p class="fale_conosco">Fale Conosco</p>
            <p class="whatsapp">Whatsapp</p>
            <p class="numero">(53) 98468-5546</p>
            <p class="email">E-mail</p>
            <p class="endereco_email">contato@cadastraaqui.com.br</p>
        </div>
        <div class="marca">
            <img class="logotipo" src="includes/imagens/Cópia de Cadastra Aqui Logotipo.png" alt="">
            <p class="copyright">Copyright 2021. CadastraAqui - Todos os direitos reservados</p>
        </div>
        <div class="icones">
            <img class="facebook" src="includes/imagens/VectorFacebook.png" alt="">
            <img class="instagram" src="includes/imagens/VectorInstagram-1.png" alt="">
            <img class="circulo-insta" src="includes/imagens/VectorInstagram.png" alt="" width="15" height="15">
            <img class="linkedin" src="includes/imagens/VectorLinkedin-1.png" alt="">
            <img class="sigla-linkedin" src="includes/imagens/VectorLinkedin.png" alt="" width="25" height="25">
        </div>
    </footer>
</body>
</html>