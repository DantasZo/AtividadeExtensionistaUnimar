<?php
    require("conecta.php");

    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $diretor = $_POST['diretor'];
    $data_visto = $_POST['data_visto'];
    $nota = $_POST['nota'];
    $resenha = $_POST['resenha'];

    $sql = "INSERT INTO filme (nome, genero, diretor, data_visto, nota, resenha)
    VALUES ('$nome', '$genero', '$diretor', '$data_visto', '$nota', '$resenha')";

    if ($conn->query($sql) === TRUE) {
        echo "<center><h1>Registro Inserido com Sucesso</h1>";
        echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
    } else {
        echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
