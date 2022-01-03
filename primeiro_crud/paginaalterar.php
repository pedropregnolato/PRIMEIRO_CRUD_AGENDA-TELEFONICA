<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda telefonica | Alterar</title>

    <?php
    $id = filter_input(INPUT_GET, "id");
    $nome = filter_input(INPUT_GET, "nome");
    $telefone = filter_input(INPUT_GET, "telefone");

    if (!empty($nome) && !empty($telefone)) {

    ?>
</head>

<body>
    <div id="conteudo">
        <h1>
            Alterar contato
        </h1>
        <p>
        <form action="alterar.php">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            Nome: <input type="text" name="nome" value="<?php echo $nome ?>" required /> <br />
            Telefone: <input type="text" name="telefone" value="<?php echo $telefone ?>" required /> <br />
            <input type="submit" value="Alterar">
        </form>
        </p>
    </div>
</body>

</html>

<?php

    } else {
        echo ("Por favor insira nome e telefone.");
        die();
    }
?>