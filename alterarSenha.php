<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Senha</title>
</head>
<body>
    <main>
        <section>
            <form action="logica_usuario.php" method="post" enctype="multipart/form-data">
                <p><label for="senha_nova">Senha Nova:</label><input type="text" name="senha_nova" id="senha_nova"></p>
                <input type="hidden" id='codusuario' name='codusuario' value="<?php echo $usuario['codusuario']; ?>">
                <p> <input type="submit" id='alterar_senha' name='alterar_senha' value="Alterar">
                </p>        
            </form>
        </section>
    </main>
</body>