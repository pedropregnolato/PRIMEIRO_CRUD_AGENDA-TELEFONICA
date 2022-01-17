<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de imagem</title>
</head>

<body>
    <h1>
        Upload de imagem
    </h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <form method="POST" action="proc_cad_img.php" enctype="multipart/form-data">

        <label>
            Nome:
        </label>
        <input type="text" name="nome" placeholder="Nome da imagem no BD" required><br><br>

        <label>
            Imagem
        </label>
        <input type="file" name="imagem" required><br><br>

        <input type="submit" name="SendCadImg" value="Inserir">

    </form>
    <br>
    <a href="index.php"> Voltar </a>

</body>

</html>