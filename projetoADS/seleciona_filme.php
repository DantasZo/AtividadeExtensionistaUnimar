<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Filme para Editar</title>
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
        input[type="text"], select {
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
    <h1>Selecionar Filme para Editar</h1>
    <div class="form-container">
        <form method="POST" action="editar_filme.php">
            <label for="nome_filme"><strong>Nome do Filme:</strong></label>
            <input type="text" id="nome_filme" name="nome_filme" required>
            <input type="submit" value="Selecionar">
        </form>
    </div>
</body>

</html>
