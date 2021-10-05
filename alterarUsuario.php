<!DOCTYPE html>
<html>
<?php

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Usuário</title>
</head>
<body>

<main>
    <section>
    <form action="logica_usuario.php" method="post" enctype="multipart/form-data">
        <p><label for="nome_usuario">Nome: </label><input type="text" name="nome" id="nome" value="<?php echo $usuario['nome_usuario']; ?>"></p>
        <p><label for="email_usuario">Email: </label><input type="text" name="email" id="email" value="<?php echo $usuario['email_usuario']; ?>"></p>
        <p><label for="cpf">CPF: </label><input type="text" name="cpf" id="cpf" value="<?php echo $usuario['cpf']; ?>"></p>
        <p><label for="curriculo">Curriculo: </label><input type="file" name="curriculo" id="curriculo" value="<?php echo $usuario['curriculo']; ?>"></p>
        <p><label for="nr_telefone_usuario">Telefone: </label><input type="text" name="nr_telefone_usuario" id="cpf" value="<?php echo $usuario['nr_telefone_usuario']; ?>"></p>
        <p><label for="competencia">Competencia: </label><input type="text" name="competencia" id="competencia" value="<?php echo $usuario['competencia']; ?>"></p>
        <p><label for="senha">Senha: </label><input type="password" name="senha" id="senha" value="<?php echo $usuario['senha_usuario']; ?>"></p>
        <input type="hidden" id='codusuario' name='codusuario' value="<?php echo $usuario['codusuario']; ?>">
        <p> <input type="submit" id='alterar' name='alterar' value="Alterar">
        </p>        
        </form>
    </section>
</main>


</body>
</html>