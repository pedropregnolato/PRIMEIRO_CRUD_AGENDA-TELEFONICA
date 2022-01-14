<?php
require_once('validar_cpf.php');
$id = filter_input(INPUT_GET, "id");
$nome = filter_input(INPUT_GET, "nome");
$documento = filter_input(INPUT_GET, "documento");
$telefone = filter_input(INPUT_GET, "telefone");

$nome = strtoupper($nome);
$documento = preg_replace("/[^0-9]/", "", $documento);
$telefone = preg_replace("/[^0-9]/", "", $telefone);

$link = mysqli_connect("localhost", "root", "", "agenda_telefonica");


if (!empty($nome) && !empty($documento) && !empty($telefone)) {
    if (strlen($telefone) == 11 && strlen($documento) == 11) {
        if (validaCPF($documento)) {
            $verifica_cpf = mysqli_query($link, "select * from contato where documento = '$documento' and id <> '$id'");
            if (mysqli_num_rows($verifica_cpf) < 1) {
                $query = mysqli_query($link, "update contato set nome='$nome', documento='$documento', telefone='$telefone' where id='$id';");
                if ($query) {
                    header("Location: index.php");
                } else {
                    echo "Ocorreu um erro, tente novamente!";
                    die();
                }
            } else {
                echo "CPF ja cadastrado!";
                die();
            }
        } else {
            echo "digite um cpf valido!";
            die();
        }
    }
} else {
    echo ("Por favor insira nome, documento e telefone.");
    die();
}
