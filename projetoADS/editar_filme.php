<?php
require("conecta.php");

$filme = []; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome_filme'])) {
    $nome_filme = $_POST['nome_filme'];

    $sql = "SELECT * FROM filme WHERE nome = '$nome_filme'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $filme = $result->fetch_assoc();
    } else {
        echo "<center><h1>Filme não encontrado</h1>";
        echo "<a href='seleciona_filme.php'><input type='button' value='Voltar'></a></center>";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_film'])) {
    $id_film = $_POST['id_film'];
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $diretor = $_POST['diretor'];
    $data_visto = $_POST['data_visto'];
    $nota = $_POST['nota'];
    $resenha = $_POST['resenha'];

    $sql = "UPDATE filme SET nome='$nome', genero='$genero', diretor='$diretor', data_visto='$data_visto', nota='$nota', resenha='$resenha' WHERE id_film='$id_film'";

    if ($conn->query($sql) === TRUE) {
        echo "<center><h1>Filme atualizado com sucesso</h1>";
        echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
    } else {
        echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>
    <style>
        body {
            background-color: #F0F8FF;
            font-family: sans-serif;
            text-align: center;
            padding: 2em;
        }
        h1 {
            color: #380B61;
            margin-bottom: 1em;
        }
        .form-container {
            margin: 0 auto;
            width: 300px;
            padding: 1em;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            background-color: #ffffff;
            border-radius: 5px;
        }
        input[type="text"], input[type="date"], input[type="number"], textarea {
            width: 100%;
            padding: 0.5em;
            margin: 0.5em 0;
            border: 1px solid #59429d;
            border-radius: 5px;
        }
        input[type="submit"] {
            font-size: 1.2em;
            background: #59429d;
            border: 0;
            color: #ffffff;
            padding: 0.5em 1em;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 1em;
        }
        input[type="submit"]:hover {
            background: #CCBBFF;
        }
    </style>
</head>

<body>
    <h1>Editar Filme</h1>
    <div class="form-container">
        <form method="POST" action="editar_filme.php">
            <input type="hidden" name="id_film" value="<?php echo isset($filme['id_film']) ? $filme['id_film'] : ''; ?>">
            
            <label for="nome"><strong>Nome:</strong></label>
            <input type="text" id="nome" name="nome" value="<?php echo isset($filme['nome']) ? $filme['nome'] : ''; ?>" required>
            
            <label for="genero"><strong>Gênero:</strong></label>
            <input type="text" id="genero" name="genero" value="<?php echo isset($filme['genero']) ? $filme['genero'] : ''; ?>" required>
            
            <label for="diretor"><strong>Diretor:</strong></label>
            <input type="text" id="diretor" name="diretor" value="<?php echo isset($filme['diretor']) ? $filme['diretor'] : ''; ?>" required>
            
            <label for="data_visto"><strong>Data que viu o filme:</strong></label>
            <input type="date" id="data_visto" name="data_visto" value="<?php echo isset($filme['data_visto']) ? $filme['data_visto'] : ''; ?>" required>
            
            <label for="nota"><strong>Nota:</strong></label>
            <input type="number" id="nota" name="nota" value="<?php echo isset($filme['nota']) ? $filme['nota'] : ''; ?>" required min="0" max="10">
            
            <label for="resenha"><strong>Resenha:</strong></label>
            <textarea id="resenha" name="resenha" rows="4" required><?php echo isset($filme['resenha']) ? $filme['resenha'] : ''; ?></textarea>
            
            <input type="submit" value="Atualizar">
        </form>
    </div>
</body>

</html>
