<?php

include("./mysql/conexao.php");

$sql =
    "INSERT INTO 
        usuarios (nome, email, cpf, nascimento, senha) 
    VALUES 
        ('" . $_POST['nome'] . "', '" . $_POST['email'] . "', '" . $_POST['cpf'] . "', '" . $_POST['nascimento'] . "', MD5('" . $_POST['senha'] . "'))";

if ($conn->query($sql) === TRUE)
    echo 'OK';
else
    echo 'erro';

$conn->close();
