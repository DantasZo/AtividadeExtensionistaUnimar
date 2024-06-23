<?php
require("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome_filme'])) {
    $nome_filme = $_POST['nome_filme'];

    $sql = "DELETE FROM filme WHERE nome = '$nome_filme'";

    if ($conn->query($sql) === TRUE) {
        echo "<center><h1>Filme deletado com sucesso</h1>";
        echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
    } else {
        echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
    }
}
?>
