<?php
    try {
    $conexao = new PDO("pgsql:host=localhost; port=5432; dbname=Projeto_PHP; user=postgres; password=120498");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
     //try {
    //$conexao = new PDO("mysql:host=localhost; dbname=projeto_lpw; charset=utf8", "root","");
    //$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //}catch(PDOException $e) {
           // echo 'Error: ' . $e->getMessage();
        //}   
?>
