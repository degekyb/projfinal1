<?php
require_once('classes/Logcad.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$projeto = new projeto($db);

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];

    if ($projeto->cadastrar($nome, $email, $senha, $confSenha)) {
        echo '<div class="alerts">', "Cadastro realizado com sucesso", '</div>';
    } else {
        echo '<div class="alertss">', "Erro ao cadastrar", '</div>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastar</title>
    <style>
        body {
            background-image: linear-gradient(to right, #000000, #D21F1F, #FF2626);
            font-family: 'Indie Flower', cursive;
            font-size: 16px;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }



        .cadast {
            margin-top: 20px;
            margin-left: 270px;
            border-radius: 40px;
            width: 400px;
            height: 680px;
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
            top: 30px;
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

        .alerts {
            color: #ffabab;
            background-color: #fe7373;
            padding: 10px;
            border-style: solid;
            border-radius: 30px;
            position: absolute;
            top: 110px;
            left: 1100px;
            z-index: 2;
        }
    </style>
</head>

<body>
    <img src="img/img2.png" alt="" class="fotin" width="651">
    <div class="cadast" style="background-image: linear-gradient(to right, #FF2626, #D21F1F, #000000);">
        <form action="" method="POST">

            <img src="img/login.png" alt="" width="202">

            <label for="nome" style="color: #000000;">Usuario:</label>
            <input type="text" name="nome" placeholder="Coloque seu nome de usuario:" style="color: #000000;" required>

            <label for="email" style="color: #000000;">Email:</label>
            <input type="email" name="email" placeholder="Coloque seu email:" style="color: #000000;" required>

            <label for="senha" style="color: #000000;">Senha:</label>
            <input type="password" name="senha" placeholder="Coloque uma senha nova:" style="color: #000000;" required maxlength="8">

            <label for="confSenha" style="color: #000000;">Confirmação da Senha:</label>
            <input type="password" name="confSenha" placeholder="Confirme sua senha:" style="color: #000000;" required maxlength="8">

            <input type="submit" value="Cadastrar" name="cadastrar">



        </form>
        <a href="index.php"> Já tenho uma conta</a>



    </div>
</body>

</html>