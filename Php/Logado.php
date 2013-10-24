<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/FormLogado.css"/>
        <title>.: Logado :.</title>
         <!--Mostra o nome do usuário no sistema e habilita a opção de mudar os dados cadastrais, usuário e senha.-->
    </head>
    <body>
        <div class="direita">
            <table border="0">
                <tr>
                    <td  colspan="2">
                        <p class="pessoal">
                            Olá, 
                            <?php
                                session_start();
                                echo $_SESSION['Nome'];
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#" class="menupessoal">Configurações</a>
                    </td>
                    <td>
                        <a href="ConexaoEncerrar.php" class="menupessoal">Sair</a>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>