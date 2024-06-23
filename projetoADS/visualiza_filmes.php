<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Filmes</title>
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
        table {
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
        }
        table, th, td {
            border: 2px solid #59429d;
            padding: 0.5em 1em;
        }
        th {
            background-color: #59429d;
            color: #ffffff;
        }
        td {
            background-color: #ffffff;
            color: #59429d;
        }
        input[type="button"] {
            font-size: 1.2em;
            background: #59429d;
            border: 0;
            color: #ffffff;
            padding: 0.5em 1em;
            border-radius: 5px;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            cursor: pointer;
            margin: 1em;
        }
        input[type="button"]:hover {
            background: #CCBBFF;
            box-shadow: inset 2px 2px 2px rgba(0,0,0,0.2);
        }
    </style>
</head>

<body>
    <h1>Filmes Cadastrados</h1>

    <table>
        <tr>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Diretor</th>
            <th>Data Visto</th>
            <th>Nota</th>
            <th>Resenha</th>
        </tr>
        <?php
            require("conecta.php");

            $dados_select = mysqli_query($conn, "SELECT nome, genero, diretor, data_visto, nota, resenha FROM filme");

            while($dado = mysqli_fetch_array($dados_select)) {
                echo '<tr>';
                echo '<td>'.$dado['nome'].'</td>';
                echo '<td>'.$dado['genero'].'</td>';
                echo '<td>'.$dado['diretor'].'</td>';
                echo '<td>'.$dado['data_visto'].'</td>';
                echo '<td>'.$dado['nota'].'</td>';
                echo '<td>'.$dado['resenha'].'</td>';
                echo '</tr>';
            }
        ?>
    </table>
    <br />
    <a href="index.html"><input type="button" value="Voltar"></a>
</body>

</html>
