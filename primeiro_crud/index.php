<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica</title>

    <?php
        $parametro = filter_input(INPUT_GET, "parametro");
        $mysqli = mysqli_connect("localhost","root","");
        mysqli_select_db($mysqli,"agenda_telefonica");

        if($parametro){
            $dados = mysqli_query($mysqli, "select * from contato where nome like '$parametro%' order by id");
        }else{
            $dados = mysqli_query($mysqli, "select * from contato order by id");
        }

        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);


    ?>

</head>
<body>
    <div id="conteudo">
        <h1>
            Agenda Telefonica
        </h1>

        <p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="parametro"/>
                <input type="submit" value="Buscar"/>
            </form>
        </p>

        <p>
            <a href="paginanovocontato.html">Adicionar novo contato</a>
        </p>

        <table border="1"> 
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Telefone</td>
            </tr>

            <?php
                if($total) {
                    do{
                        ?>

                        <tr>
                            <td><?php echo $linha['id'] ?></td>
                            <td><?php echo $linha['nome'] ?></td>
                            <td><?php echo $linha['telefone'] ?></td>
                            <td><a href="<?php echo "paginaalterar.php?id=" . $linha['id'] . "&nome=" . $linha['nome'] . "&telefone=" . $linha['telefone'] ?>">Alterar</a></td>
                            <td><a href="<?php echo "excluir.php?id=" . $linha['id'] ?>">Excluir</a></td>
                        </tr>

                        <?php 
                    } while($linha = mysqli_fetch_assoc($dados));

                    mysqli_free_result($dados);
                    }

                mysqli_close($mysqli);
                


            ?>

        </table>
    </div>
</body>
</html>