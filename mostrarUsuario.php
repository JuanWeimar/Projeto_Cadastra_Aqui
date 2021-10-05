<!DOCTYPE html>
<html>
<?php
include_once('includes/logica/funcoes_usuario.php');
include_once('includes/logica/conecta.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Listar Usuário</title>
</head>
<body>  
<body>

<main>
        <h2> Recrutador Logado:  <?php echo $_SESSION['nome_recrutador']; ?>  </h2>
        <h3> Pesquisa de Usuários </h3>
    <?php

        if(empty($usuarios)){
            ?>
                <section>
                    <p>Não há usuários cadastrados.</p>
                </section>
            <?php
        }
        foreach($usuarios as $usuario){
            $codusuario = $usuario['codusuario'];
            $array = array($codusuario);
            
            $usuarios_telefones = buscarUsuarioTelefone($conexao,$array);
            ?>
                <section>
                    <p>Nome do Usuário: <?php echo $usuario['nome_usuario']; ?></p>
                    <p>Email do Usuário: <?php echo $usuario['email_usuario']; ?></p>
                    <p>Telefone do Usuário: <?php echo $usuarios_telefones['nr_telefone_usuario']; ?></p>
                    <p>Competencia: <?php echo $usuario['competencia']; ?></p>
                    <p>Curriculo: <a href="includes/curriculos/<?php echo $usuario['curriculo']; ?>"><?php echo $usuario['curriculo']; ?></a></p>                                                      
                </section>
            <?php
        }
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