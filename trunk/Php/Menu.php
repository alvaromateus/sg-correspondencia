<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/FormMenu.css"/>
        <title>.: Menu :.</title>
    </head>
    <body>
        <div class="menu">
            <ul class="Menu">
                <li><a href="Home.php">Home</a>
                <li><a href="#">Administrativo</a>
                <ul>
                    <li><a href="CadFuncionario.php">Funcionário</a></li>
                    <?php
                        if($_SESSION['Nivel'] == 0)
                        {
                        ?>
                            <li><a href="CadUsuario.php">Usuário</a></li>
                        <?php
                        }
                    ?>
                </ul>
                <li><a href="#">Empresa</a>
                <ul>
                    <li><a href="CadUnidade.php">Unidade</a></li>
                    <li><a href="CadDepartamento.php">Departamento</a></li>
                    <li><a href="CadCargo.php">Cargo</a></li>
                </ul>
                <li><a href="#">Gerenciamento</a>
                <ul>
                    <li><a href="CadCorrespondencia.php">Correspondência</a></li>
                    <li><a href="CadMalote.php?Malote=0">Malote</a></li>
                    <li><a href="CadProtocolo.php">Protocolo</a></li>
                </ul>
                <li><a href="#">Sobre</a>
            </ul>
        </div>
    </body>
</html>