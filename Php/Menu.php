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
                <li><a href="Home.php">Administrativo</a>
                <ul>
                    <li><a href="conFuncionario.php">Funcionário</a></li>
                    <?php
                        if($_SESSION['Nivel'] == 0)
                        {
                        ?>
                            <li><a href="ConUsuario.php">Usuário</a></li>
                        <?php
                        }
                    ?>
                </ul>
                <li><a href="Home.php">Empresa</a>
                <ul>
                    <li><a href="ConUnidade.php">Unidade</a></li>
                    <li><a href="ConDepartamento.php">Departamento</a></li>
                    <li><a href="ConCargo.php">Cargo</a></li>
                </ul>
                <li><a href="Home.php">Gerenciamento</a>
                <ul>
                    <li><a href="ConCorrespondencia.php">Correspondência</a></li>
                    <li><a href="ConMalote.php?Malote=0">Malote</a></li>
                    <li><a href="ConProtocolo.php">Protocolo</a></li>
                    <li><a href="ConServico.php">Serviço</a></li>
                </ul>
                <li><a href="Home.php">Sobre</a>
            </ul>
        </div>
    </body>
</html>
