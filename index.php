<?php
    session_start();
    require "conecta.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jQuery - Find age from DOB</title>


            <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
            <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!--TOASTR CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="//cdn.dhtmlx.com/edge/dhtmlx.css">


    </head>
    <body>
        <div class="col-sm-12">
            <div class="row">
                <div class="container col-sm-5 p-5">
                    <div id="form-date" class="form-group">
                        <h3 class="text-center">Register Form</h3>
                        <hr/> 
                        <div class="form-group">
                            <label for="field-name">Your name</label>
                            <input type="text" class="form-control" id="field-name" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="field-email">Your E-Mail</label>
                            <input type="text" class="form-control" id="field-email" name="email" value="">
                        </div>

                        <div class="form-group">
                            <label for="field-birthdate">Birth day</label>
                            <input type="date" class="form-control" id="field-birthdate" for="field-birthdate" placeholder="mm/dd/yyyy"  name="birthdate"  value=""/>
                        </div>
                        <div class="footer text-right">
                        <hr/> 
                            <button class="btn btn-primary" onclick="novocad();">Save</button>
                            <button class="btn btn-secondary" type="reset" onclick="clearall();">Clear</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    Ristros já ralizados
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Birth day</th>
                            </tr>
                        </thead>
                        <tbody id="cadastros">
                            
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
        <div id="msg"></div>    
    </body>
<!--CARREGA AS BIBLIOTACAS JAVASCRIPT -->

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>

<script src="//cdn.dhtmlx.com/edge/dhtmlx.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function novocad(){
            $.ajax({
                type:"POST",
                url:'gravacad.php',
                data:{
                    nome  : $('#field-name').val(),
                    mail  : $('#field-email').val(),
                    birth : $('#field-birthdate').val()
                },
                success:function(data){
                    $('#msg').html(data);
                    listarcadastros();
                }
            });
        } 
        
        function clearall(){
            dhtmlx.confirm({
                title:"Custom title",
                ok:"Yes", 
                cancel:"No",
                text:"Quer mesmo limpar os campos? Se houver dados serão perdidos!",
                callback:function(result){
                    if(result){
                        $('#field-name').val('');
                        $('#field-email').val('');
                        $('#field-birthdate').val('');
                        toastr['success']('Dados apagados com sucesso!');
                    }else{
                        toastr['info']('Seus dados contnuam da mesma forma!');
                    }
                }
            });

           
        }

         function listarcadastros(){
            $.ajax({
                url:'listarcadastros.php',
                success:function(data){
                    $("#cadastros").fadeIn("slow");
                    $("#cadastros").fadeIn(2000);
                    $('#cadastros').html(data);
                }
            });
         }

    </script>   

</html>        
            