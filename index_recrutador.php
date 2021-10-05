<!DOCTYPE html>
<html>

<?php
session_start();
include_once('includes/logica/funcoes_usuario.php');
include_once('includes/logica/conecta.php');
?>
<head>
    <title>Página Inicial</title>
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<body>  
<body>

<main>
        <h2> Recrutador Logado:  <?php echo $_SESSION['nome_recrutador']; ?>  </h2>
        <h3> Listagem de Usuários </h3>

    <section>
    <form action="includes/logica/logica_usuario.php" method="post">
        <p><label for="competencia">Pesquisa por Competencia: </label><input type="text" name="competencia" id="competencia"></p>
            <button type="submit" id='pesquisar' name='pesquisar' value="Pesquisar"> Pesquisar </button>
    </form>
    <form action="includes/logica/logica_recrutador.php" method="post">   
            <button type="submit" id='sair' name="sair" value="Sair">Sair</button>
            <button type="submit" id="deletar" name="deletar">Excluir</button>  
            
    </form>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
<script type="text/javascript">

</script>
</html>