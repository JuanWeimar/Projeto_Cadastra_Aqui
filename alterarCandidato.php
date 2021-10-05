<!DOCTYPE html>
<html>
<?php

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="144x144" href="../imagens/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="../imagens/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="../imagens/favicon.ico">
    <link rel="mask-icon" href="../imagens/favicon.ico" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../css/style_alterarCandidato.css">
    <title>Alterar Usuário</title>
    <script src="../javascript/alterarCandidato.js"></script>
</head>
<body>
    <header class="menu">
        <div class="position-box">
            <div class="box">
                <label class="avatar" for="btn">
                    <img src="../fotos/<?php echo $_SESSION['foto']; ?>" width='100px' height='100px'/>

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
        

        <img class="logo" src="../imagens/Cópia de Cadastra Aqui Logotipo.png" alt="">

        <nav>
            <li class="mensagens"><a href="mensagens.php">Mensagens</a></li>
            <img class="btn-msg" src="../imagens/Mensagem.png" alt="">
            <li class="notificacoes"><a href="notificacoes.php">Notificações</a></li>
            <img class="btn-notif" src="../imagens/Notificação.png" alt="">
            <li class="sair"><a href="../html/index.html">Sair</a></li>
            <img class="btn-sair" src="../imagens/Sair.png" alt="">
        </nav>
    </header>
<main>
    <section>
    <form action="logica_candidato.php" method="post" enctype="multipart/form-data">
        <p><label for="nome_usuario">Nome: </label><input type="text" name="nome" id="nome" value="<?php echo $usuario['nome_usuario']; ?>"></p>
        <p><label for="email_usuario">Email: </label><input type="text" name="email" id="email" value="<?php echo $usuario['email_usuario']; ?>"></p>
        <p><label for="cpf">CPF: </label><input type="text" name="cpf" id="cpf" value="<?php echo $usuario['cpf']; ?>"></p>
        <div class="input-wrapper-curriculo">
            <p><label for="curriculo">Curriculo: </label><input type="file" class="input-curriculo" name="curriculo" id="curriculo" value="<?php echo $usuario['curriculo']; ?>"></p>
        </div>
        <p><label for="profissao">Profissão: </label><input type="text" name="profissao" id="profissao" value="<?php echo $_SESSION['profissao']; ?>"></p>
        <p><label for="cep">CEP: </label><input type="text" name="cep" id="cep" value="<?php echo $_SESSION['cep']; ?>"></p>
        <p><label for="endereco">Endereço: </label><input type="text" name="endereco" id="endereco" value="<?php echo $_SESSION['endereco']; ?>"></p>
        <p><label for="numero">Número: </label><input type="text" name="numero" id="numero" value="<?php echo $_SESSION['numero']; ?>"></p>
        <p><label for="complemento">Complemento: </label><input type="text" name="complemento" id="complemento" value="<?php echo $_SESSION['complemento']; ?>"></p>
        <p><label for="bairro">Bairro: </label><input type="text" name="bairro" id="bairro" value="<?php echo $_SESSION['bairro']; ?>"></p>
        <p><label for="cidade">Cidade: </label><input type="text" name="cidade" id="cidade" value="<?php echo $_SESSION['cidade']; ?>"></p>
        <p><label for="estado">Estado: </label><input type="text" name="estado" id="estado" value="<?php echo $_SESSION['estado']; ?>"></p>
        <p><label for="nr_telefone_usuario">Telefone: </label><input type="text" name="nr_telefone_usuario" id="nr_telefone_usuario" value="<?php echo $usuario['nr_telefone_usuario']; ?>"></p>
        <p><label for="competencia">Competencia: </label><input type="text" name="competencia" id="competencia" value="<?php echo $usuario['competencia']; ?>"></p>
        <p><label for="senha">Senha: </label><input type="password" name="senha" id="senha" value="<?php echo $usuario['senha_usuario']; ?>"></p>
        <input type="hidden" id='codusuario' name='codusuario' value="<?php echo $usuario['codusuario']; ?>">
        <p> <input type="submit" id='alterar' name='alterar' value="Alterar">
        </p>        
        </form>
        <script type="text/javascript"></script>
    </section>
</main>


</body>
</html>