<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/FormatacaoHome.css">
        <title>.: SG - Correspondência :.</title>
    </head>
    <body>
        <div id="Principal">
            <?php
                require 'Logado.php';
                require 'Menu.php';
                require 'Conexao.php';
                if (isset($_SESSION['Usuario']))
                {
            ?>
            <div id="Conteudo">
                <h1>Sistema de Gerenciamento de Correspondência</h1>
                <h1>SGC</h1>
            </div>
            <?php
            }
            else
            {
                header('Location: Login.php?ErroLogar');
            }
            ?>
        </div>
    </body>
</html>
