<?php
    $mysqli = mysqli_connect("localhost","root","");
    mysqli_select_db($mysqli,"arquivo"); //conexao com o banco

    $mensagem = false;

    if(isset($_FILES['arquivo'])){
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //extensao do arquivo - conta o ponto + 3 caracteres; .png por exemplo
        $novo_nome = md5(time()) ; $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //diretorio para onde vao os arquivos

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);

        $sql = "INSERT INTO arquivo (codigo, arquivo, data) VALUES (null, $novo_nome, NOW())";
        if($mysqli_query->query($mysqli, $sql)){
            $mensagem = "Imagem salva!";
        } else {
            $mensagem = "Ocorreu um erro!";
        }

    }
?>

<h1>Subir imagem pro banco</h1>

<?php 
    if($mensagem != false) echo "<p> $mensagem </p>";
?>

<form action="upload.php" method="post" enctype="multipart/form-data"> <!-- enctype serve pra declarar que estará enviando um arquivo para o banco -->
    <input type="file" name="arquivo">
    <input type="submit" value="Enviar">
</form> 
