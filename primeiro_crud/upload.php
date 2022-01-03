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
        Cadastrar imagem
    </h1>

    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

    <form method="POST" action="proc_cad_img.php" enctype="multipart/form-data">

        <label>
            Nome:
        </label>
        <input type="text" name="nome" placeholder="Digitar o nome"><br><br>

        <label>
            Imagem
        </label>
        <input type="file" name="imagem"><br><br>

        <input type="submit" name="SendCadImg" value="Cadastrar">

    </form>

</body>
</html>