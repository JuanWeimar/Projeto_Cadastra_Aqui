<!DOCTYPE html>
<html>

<?php
session_start();
include_once('includes/logica/funcoes_usuario.php');
include_once('includes/logica/conecta.php');
?>
<head>
    <title>Listar Usuário</title>
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<body>  
<main>
        <h2> Usuário Logado:  <?php echo $_SESSION['nome_usuario']; ?>  </h2>
        <h3> Perfil Pessoal </h3>
                <section>
                    <p>Nome: <?php echo $_SESSION['nome_usuario']; ?></p>
                    <p>Email: <?php echo $_SESSION['email_usuario']; ?></p>
                    <p>CPF: <?php echo $_SESSION['cpf']; ?></p>
                    <p>Curriculo:<a href="includes/curriculos/<?php echo $_SESSION['curriculo']; ?>"><?php echo $_SESSION['curriculo']; ?></a></p>
                    <p>Telefone: <?php echo $_SESSION['nr_telefone_usuario']; ?></p>
                    <p>Competencia: <?php echo $_SESSION['competencia']; ?></p>
                    
                    <form action="includes/logica/logica_usuario.php" method="post">
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