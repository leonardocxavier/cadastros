<?php

//Informações para conectar no banco de dados
$servidor  = 'localhost';
$usuarioDb = 'root';
$senhaDb   = '';
$nomeDb    = 'projeto';

//conecta no banco de dados
  $con = new mysqli($servidor,$usuarioDb,$senhaDb,$nomeDb);
  $con -> set_charset("utf8");
    if (mysqli_connect_errno()) {
        printf("Conexão falhou: Entre em contato com o nosso suporte! Informe o erro #BD000.");
        #exit();
    }else{
        //descomentar a linha abaixo caso queria testar somente a conexão com o banco de dados
        //echo "conectado!";
        #$mysqli->close(); 
    }

?>