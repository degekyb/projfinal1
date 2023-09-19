<?php
session_start();

require_once('classes/Logcad.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$projeto = new projeto($db);

if (isset($_POST['logar'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if ($projeto->logar($nome, $senha)) {
        $_SESSION['nome'] = $nome;

        header("Location: dashboard.php");
        exit();
    } else {
        print "<script>alert('Credenciais invalidas')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Tela de Login</title>
    <style>
        body {
            background-image: linear-gradient(to right, #000000, #D21F1F, #FF2626);
            font-family: 'Indie Flower', cursive;
            font-size: 16px;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logar {
            margin-top: 70px;
            margin-left: 270px;
            border-radius: 40px;
            width: 400px;
            height: 500px;
            font-size: 16px;
            text-align: center;
            align-items: center;
            font-family: 'Indie Flower', cursive;
        }

        label {
            position: relative;
            display: flex;
            margin-bottom: 5px;
            color: #000000;
            left: 26px;
            font-size: 20px;
            font-family: 'Indie Flower', cursive;
        }

        input {
            position: relative;
            width: 350px;
            height: 48px;
            border: 1px solid #ccc;
            border-radius: 40px;
            text-align: center;
            margin-bottom: 12px;
            background-color: #FF3636;
            color: black;
            font-size: 16px;
            font-family: 'Indie Flower', cursive;
        }

        input[type="submit"] {
            position: relative;
            background-color: #FF3636;
            color: #000000;
            width: 350px;
            height: 44px;
            top: 10px;
            cursor: pointer;
            border-radius: 40px;
            font-size: 16px;
            font-family: 'Indie Flower', cursive;
        }

        input[type="submit"]:hover {
            background-color: #ffabab;
        }

        a {
            color: #ccc;
            position: relative;
            top: 0px;
            text-decoration: none;
            font-size: 14px;
            font-family: 'Indie Flower', cursive;
        }

        .esqueci {
            color: #ccc;
            position: relative;
            top: 0px;
            left: 100px;
            text-decoration: none;
            font-size: 14px;
            font-family: 'Indie Flower', cursive;
        }

        a:hover {
            color: #fe7373;
            text-decoration: underline;
        }

        a:visited {
            color: #ffabab;
        }
    </style>
</head>

<body>

    <img src="img/img2.png" alt="" class="fotin" width="651">

    <div class="logar" style="background-image: linear-gradient(to right, #FF2626, #D21F1F, #000000);">

        <form action="" method="POST">

            <img src="img/login.png" alt="" width="202">

            <label for="nome" style="color: #000000;">Usuario:</label>
            <input type="text" name="nome" placeholder="Coloque seu nome de usuario:">

            <label for="senha" style="color: #000000;">Senha:</label>
            <input type="password" name="senha" placeholder="Coloque sua senha:">

            <a href="trocarsenha.php" class="esqueci">Esqueci minha senha</a>

            <input type="submit" value="Logar" name="logar">

            <p><a href="cadastrar.php">Ainda não tenho conta</a></p>

        </form>

    </div>
</body>

</html>