<!DOCTYPE html>
<html>

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
    <title>Listar Usuário</title>
    <link rel="stylesheet" href="includes/css/style_editar_perfil.css">
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
<main>
        <h2> Usuário Logado:  <?php echo $_SESSION['nome_usuario']; ?>  </h2>
        <h3> Perfil Pessoal </h3>
                <section>
                    <p>Nome: <?php echo $_SESSION['nome_usuario']; ?></p>
                    <p>Email: <?php echo $_SESSION['email_usuario']; ?></p>
                    <p>CPF: <?php echo $_SESSION['cpf']; ?></p>
                    <p>Curriculo:<a href="includes/curriculos/<?php echo $_SESSION['curriculo']; ?>"><?php echo $_SESSION['curriculo']; ?></a></p>
                    <p>Profissão: <?php echo $_SESSION['profissao']; ?></p>
                    <p>CEP: <?php echo $_SESSION['cep']; ?></p>
                    <p>Endereço: <?php echo $_SESSION['endereco']; ?></p>
                    <p>Número: <?php echo $_SESSION['numero']; ?></p>
                    <p>Complemento: <?php echo $_SESSION['complemento']; ?></p>
                    <p>Bairro: <?php echo $_SESSION['bairro']; ?></p>
                    <p>Cidade: <?php echo $_SESSION['cidade']; ?></p>
                    <p>Estado: <?php echo $_SESSION['estado']; ?></p>
                    <p>Telefone: <?php echo $_SESSION['nr_telefone_usuario']; ?></p>
                    <p>Competencia: <?php echo $_SESSION['competencia']; ?></p>
                    
                    <form action="includes/logica/logica_candidato.php" method="post">
                        <button type="submit" name="editar" value="<?php echo $_SESSION['codusuario']; ?>"> Editar </button>
                        <button type="submit" name="deletar" value="<?php echo $_SESSION['codusuario']; ?>" onclick = "return confirma_excluir()"> Deletar </button>
                        <button type="submit" name="editar_senha" value="<?php echo $_SESSION['codusuario']; ?>">Alterar Senha</button>
                        <button type="submit" name="sair" value="sair">Sair</button> 
                    </form>
                    <br><br>                                                          
                </section>
            <?php
        
    ?>
</main>
</body>
<script type="text/javascript">
    function confirma_excluir()
    {
        resp=confirm("Confirma Exclusão?")

        if (resp==true)
        {

            return true;
        }
        else
        {
            return false;

        }

    }

</script>
</html>