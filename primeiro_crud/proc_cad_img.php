<?php
session_start();
include_once './conexao.php';

$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);

if ($SendCadImg) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $nome_imagem = $_FILES['imagem']['name'];
    //var_dump($_FILES['imagem']);

    //INSERT
    $result_img = "INSERT INTO imagens (nome, imagem) VALUES (:nome, :imagem)";
    $insert_msg = $conexao->prepare($result_img);
    $insert_msg->bindParam(':nome', $nome);
    $insert_msg->bindParam(':imagem', $nome_imagem);

    if ($insert_msg->execute()) {

        //recuperar ultimo ID no BD
        $ultimo_id = $conexao->lastInsertId();

        //diretorio que salva as imagens
        $diretorio = 'fotos/' . $ultimo_id . '/';

        //criar subpastas
        mkdir($diretorio, 0755);

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $nome_imagem)) {
            $_SESSION['msg'] = "<p>Dados salvos com sucesso e a imagem foi importada!</p>";
            header("Location: upload.php");
        } else {
            $_SESSION['msg'] = "<p>Erro ao importar a imagem!</p>";
            header("Location: upload.php");
        }


        $_SESSION['msg'] = "<p>Dados salvos com sucesso!</p>";
        header("Location: upload.php");
    } else {
        $_SESSION['msg'] = "<p>Erro ao salvar os dados!</p>";
        header("Location: upload.php");
    }
} else {
    $_SESSION['msg'] = "<p>Erro ao salvar os dados!</p>";
    header("Location: upload.php");
}
