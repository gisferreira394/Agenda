<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Tarefas</title>
</head>
<body>
    <h1>Controle de tarefas</h1>

    <form>
        Nome da tarefa 
       <div class="row">
        <div class="col-6 mx-auto">
        <input name ="Nome" class="form-control" placeholder="Tarefa" aria-label="Nome da tarefa" aria-describedby="basic-addon1">>
        </div>
        </div>

        <br><br>
        finalizada
        <div class="row">
        <div class="col-6 mx-auto">
        <input name="Finalizada">
        
        <button type="submit" class="btn btn-outline-info">Salvar tudo</button>
    </form>

</div>
</div>



    <br><br>

    <?php
    if(isset($_GET["Nome"])){
        $nome = $_GET["Nome"];
        $finalizada = $_GET["Finalizada"];
    }
    else{
        $nome="";
        $finalizada ="";
    }
    
    //conexao com banco de dados //

    $servidor ="localhost";
    $usuario_bd = "root";
    $senha_usuario ="";
    $banco_dados = "tarefas1";

    //abrir a conexao com o banco de dados//

    $conexao = mysqli_connect($servidor,$usuario_bd,$senha_usuario,$banco_dados);

    //criar o sql//
    $sql = "insert into tarefas (nome, finalizada) values ('$nome', '$finalizada')";

    //executar o sql no banco de dados//

    if($nome != ""){
    mysqli_query($conexao, $sql);
    }

    //fechar a conexao//

    mysqli_close($conexao);
    ?>

<?php

//conexao com banco de dados //

$servidor ="localhost";
$usuario_bd = "root";
$senha_usuario ="";
$banco_dados = "tarefas1";

//abrir a conexao com o banco de dados//

$conexao = mysqli_connect($servidor,$usuario_bd,$senha_usuario,$banco_dados);

//criar o sql//
$sql = "select *from tarefas"; 

//executar o sql no banco de dados//
$todasAsTarefas = mysqli_query($conexao, $sql);


//laço de repetição//
while($umaTarefa = mysqli_fetch_assoc($todasAsTarefas)){
    echo $umaTarefa["Nome"] . "-" . $umaTarefa["Finalizada"] . "<br>";
}

//fechar a conexao//

mysqli_close($conexao);
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>