<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>.: Consultar Usuário :.</title>
</head>
<body>
	<?php
        $user='fernando';
        $senha='123';
        $banco='XE'; 
        $conexao =  oci_connect($user, $senha, $banco);
        if (!$conexao)
        {
            echo "Erro na conexão com o Oracle.";
        }
        else
	{
            echo "Conexão bem sucedida.";
	}
	$stmt = oci_parse($conexao, "SELECT * FROM USUARIO") or die ("A conexão com o Banco de Dados não foi efeuada!");
	oci_execute($stmt, OCI_DEFAULT);
        while($row = oci_fetch_array($stmt))
        {
            echo("<h3>Olá " . $row[0] . "</h3></br>");
            echo("<h3>Seu registro é " . $row[1] . "</h3></br>");
            echo("<h3>Sua senha é " . $row[2] . "</h3></br>");
            echo("<h3>Nível de acesso " . $row[3] . "</h3>");
            exit;
        }
        ?>
</body>
</html>
