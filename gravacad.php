<?php
    session_start();
    require "conecta.php";
/*
    nome  : $('#field-name').val(),
    mail  : $('#field-email').val(),
    birth : $('#field-birthdate').val()
*/
    $nomecad = addslashes($_POST['nome']);
    $email   = addslashes($_POST['mail']);
    $niver   = addslashes($_POST['birth']);

    //verifica se o cdastro ja existe
    $sqlsex = "SELECT *From `cadastros` where `mail`='$email'";
    $resp = mysqli_query($con,$sqlsex);
    $count = mysqli_num_rows($resp); 

    if($count>=1){
        echo "<script>toastr['warning']('Cadastro já existe em seu banco de dados!','Oop\'S!');</script>";
    }else{
    	//insere os dados no banco de dados
        $insert="INSERT into `cadastros`(`nome`, `mail`, `niver`)
                             Values ('$nomecad','$email','$niver')";
        mysqli_query($con,$insert); 
        echo   "<script>
                    toastr['success']('Cadastro Realizado com sucesso!','Tudo Certo!');
                    $('#field-name').val('');
                    $('#field-email').val('');
                    $('#field-birthdate').val('');
                </script>";
    }

                           

?>