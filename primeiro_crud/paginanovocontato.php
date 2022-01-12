<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda telefonica | novo contato</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

</head>

<body>
    <div id="conteudo">
        <h1>
            Novo contato
        </h1>
        <p>
        <form action="salvar.php">
            Nome: <input type="text" name="nome" required /> <br />
            Telefone <input id="telefone" type="text" name="telefone" placeholder="(__)_____-____" required /> <br />
            <input type="submit" value="adicionar" />
        </form>
        </p>
    </div>
    <br>
    <a href="index.php"> Voltar</a>

    <script>
        $("#telefone").mask("(99)99999-9999");
    </script>

</body>
</html>