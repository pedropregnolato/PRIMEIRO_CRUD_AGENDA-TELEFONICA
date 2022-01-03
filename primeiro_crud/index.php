<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica</title>

    <?php
        $parametro = filter_input(INPUT_GET, "parametro"); //definindo variaveis e usando metodo INPUT_GET e nao POST
        $mysqli = mysqli_connect("localhost","root","");
        mysqli_select_db($mysqli,"agenda_telefonica"); //conexao com o banco

        if($parametro){ //se tiver parametro (dado no pesquisar) seleciona ele, caso contrario consulta o banco todo
            $dados = mysqli_query($mysqli, "select * from contato where nome like '$parametro%' order by id");
        }else{
            $dados = mysqli_query($mysqli, "select * from contato order by id");
        }

        //modo de exibição na tela - declara a linha como uma matriz associativa e conta o numero de linhas pra passar automaticamente pro html
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

                <!-- SELECT -->
                <div>
                    <h3>Buscar na agenda:</h3>
                    <input type="text" name="parametro" placeholder="Pesquisar"/>
                    <button type="submit" ><img src="imagens/pesquisar.png" alt="pesquisar" height="12px" border="0px"></button>
                </div>

                <br>
                <a href="upload.php" style="margin-left:1em">Inserir imagem no banco</a>
                <br>
                <!-- INSERT -->
                <a href="paginanovocontato.php"><img src="imagens/add.png" alt="adicionar_pessoa" height="21px" style="margin-top:10px; margin-left:6em"><br></a>
              
            </form>
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
                            <!-- UPDATE -->
                            <td><a href="<?php echo "paginaalterar.php?id=" . $linha['id'] . "&nome=" . $linha['nome'] . "&telefone=" . $linha['telefone'] ?>"><img src="imagens/editar.png" alt="editar" width="18px"></a></td>
                            <!-- DELETE -->
                            <td><a href="<?php echo "excluir.php?id=" . $linha['id'] ?>"><img src="imagens/lixeira.png" alt="lixeira" width="18px"></a></td>
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