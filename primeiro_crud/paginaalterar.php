<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda telefonica | Alterar</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <?php
    $id = filter_input(INPUT_GET, "id");
    $nome = filter_input(INPUT_GET, "nome");
    $documento = filter_input(INPUT_GET, "documento");
    $telefone = filter_input(INPUT_GET, "telefone");

    if (!empty($nome) && !empty($documento) && !empty($telefone)) {
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
            Nome: <input type="text" name="nome" value="<?php echo ucwords(strtolower($nome)) ?>" required /> <br />
            CPF: <input type="text" name="documento" id="documento" placeholder="___.___.___-__" value="<?php echo $documento ?>" required> <br />
            Telefone: <input id="telefone" type="text" name="telefone" placeholder="(__)_____-____" value="<?php echo $telefone ?>" required /> <br />
            <input type="submit" value="Alterar">
        </form>
        </p>
    </div>
    <br>
    <a href="index.php">Voltar</a>

    <script>
        $("#telefone").mask("(99)99999-9999");
        $("#documento").mask("999.999.999-99");
    </script>

</body>

</html>

<?php
    } else {
        echo ("Por favor insira nome, documento e telefone.");
        die();
    }
?>