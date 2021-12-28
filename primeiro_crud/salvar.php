<?php
    $nome = filter_input(INPUT_GET, "nome");
    $telefone = filter_input(INPUT_GET, "telefone");

    $link = mysqli_connect("localhost", "root", "", "agenda_telefonica");



    if(!empty($nome) && !empty($telefone)){ //assim se tirar o required do html ainda será seguro nao inserindo o dado no banco
        if($link) { 
            $query = mysqli_query($link, "insert into contato values ('', '$nome', '$telefone')");
            if($query){
                header("Location: index.php");
            }else{
                die("Erro: ". mysqli_error($link));
            }
        }else{
            die("Erro: ". mysqli_error($link));
        }
    }else {
        echo("Por favor insira nome e telefone.");
        die();
    }
?>
