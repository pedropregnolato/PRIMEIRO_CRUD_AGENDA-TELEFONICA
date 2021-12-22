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

                <!-- SELECT -->
                <div>
                    <h3>Buscar na agenda:</h3>
                    <input type="text" name="parametro" placeholder="Pesquisar"/>
                    <button type="submit" ><img src="https://cdn-icons.flaticon.com/png/512/3031/premium/3031293.png?token=exp=1639668686~hmac=f52e00210c2d7b96d6efd18d5bcea332" alt="pesquisar" height="12px" border="0px"></button>
                </div>

                <br>
                <!-- INSERT -->
                <a href="paginanovocontato.html"><img src="https://cdn-icons.flaticon.com/png/512/3793/premium/3793621.png?token=exp=1639665684~hmac=768a718f399d1b1c937372e6f371e167" alt="adicionar_pessoa" height="21px" style="margin-top:10px; margin-left:6em"><br></a>
              
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
                            <td><a href="<?php echo "paginaalterar.php?id=" . $linha['id'] . "&nome=" . $linha['nome'] . "&telefone=" . $linha['telefone'] ?>"><img src="https://cdn-icons.flaticon.com/png/512/1633/premium/1633251.png?token=exp=1639663161~hmac=323b31e1b9270861f25b186a5cbd4e25" alt="editar" width="18px"></a></td>
                            <td><a href="<?php echo "excluir.php?id=" . $linha['id'] ?>"><img src="https://cdn-icons.flaticon.com/png/512/1175/premium/1175343.png?token=exp=1639663106~hmac=7fb39639ae8c32b2986033aad0c35833" alt="lixeira" width="18px"></a></td>
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