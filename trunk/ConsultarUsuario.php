<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>.: Consultar Usuário :.</title>
</head>
<body>
    <?php
        require 'Conexao.php';
        if($_SESSION['Conexao'] == 'Sim')
        {
            if($_POST['Consultar'] == "GERAR")
            {
                $usuario = $_POST['txtusuario'];
                $acesso = $_POST['txtsenha'];
                $stmt = oci_parse($conexao, "SELECT u.nm_usuario, u.nm_senha, f.nm_funcionario FROM Usuario u, Funcionario f WHERE nm_senha = $acesso AND u.cd_registro = f.cd_registro");
                oci_execute($stmt, OCI_DEFAULT);
                while($row = oci_fetch_array($stmt))
                {
                    if($row[0] == $usuario && $row[1] == $acesso)
                    {
                        echo("<h3>Olá " . $row[2] . "</h3></br>");
                        exit;
                    }
                    else
                    {
                        echo "Login e / ou Senha inválidos.";
                    }
                }    
            }
        }
        else
        {
            echo "Não foi possível conectar ao banco de dados, tente novamente mais tarde.";
        }
    ?>
</body>
</html>
