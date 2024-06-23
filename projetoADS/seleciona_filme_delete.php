<?php
require("conecta.php");

$msg_erro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome_filme'])) {
    $nome_filme = $_POST['nome_filme'];

    $sql = "SELECT * FROM filme WHERE nome = '$nome_filme'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $filme = $result->fetch_assoc();
    } else {
        $msg_erro = "Filme não encontrado com o nome '$nome_filme'.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar_exclusao'])) {
    $id_film = $_POST['id_film'];

    $sql_delete = "DELETE FROM filme WHERE id_film = '$id_film'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<script>alert('Filme excluído com sucesso.'); window.location.replace('index.html');</script>";
        exit();
    } else {
        $msg_erro = "Erro ao excluir o filme: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Filme para Deletar</title>
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
        input[type="text"] {
            width: calc(100% - 40px); /* Ajuste conforme o tamanho do botão */
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
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            border-radius: 5px;
            text-align: center;
        }
        .modal-content h2 {
            color: #380B61;
            margin-bottom: 10px;
        }
        .modal-content p {
            margin-bottom: 20px;
        }
        .modal-content .btn-container {
            text-align: center;
        }
        .modal-content button {
            background-color: #59429d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
        }
        .modal-content button:hover {
            background-color: #CCBBFF;
        }
    </style>
</head>

<body>
    <h1>Selecionar Filme para Deletar</h1>
    <div class="form-container">
        <form method="POST" action="">
            <label for="nome_filme"><strong>Digite o nome do filme:</strong></label>
            <input type="text" id="nome_filme" name="nome_filme" required>
            <br>
            <input type="submit" value="Buscar">
        </form>
        <?php if (!empty($msg_erro)) : ?>
            <p style="color: red;"><?php echo $msg_erro; ?></p>
        <?php endif; ?>
    </div>

    <?php if (isset($filme)) : ?>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <h2>Confirmação de Exclusão</h2>
                <p>Tem certeza que deseja excluir o filme "<?php echo $filme['nome']; ?>"?</p>
                <div class="btn-container">
                    <form method="POST" action="">
                        <input type="hidden" name="id_film" value="<?php echo $filme['id_film']; ?>">
                        <button type="submit" name="confirmar_exclusao">Confirmar</button>
                        <button type="button" onclick="fecharModal()">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
        window.onload = function() {
            var modal = document.getElementById('myModal');
            if (modal) {
                modal.style.display = "block";
            }
        };

        function fecharModal() {
            var modal = document.getElementById('myModal');
            if (modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
