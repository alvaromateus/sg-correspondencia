<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>.: Consultar Usuário :.</title>
</head>
<body>
	<?php
	$conn = mysql_connect("localhost","root","") or die ("Você não está logado no MYSQL!!");
	mysql_select_db("sem4",$conn) or die ("A conexão com o Banco de Dados não foi efeuada!");
	if($_POST['Consultar'] == "GERAR")
	{
		$login = $_POST['txtusuario'];
		$senha = $_POST['txtsenha'];
		$SQL = "SELECT * FROM tb_usuario WHERE login = '$login'";
		$connect = mysql_query($SQL,$conn);
		while($consulta = mysql_fetch_array($connect))
		{
			if($consulta['login'] == $login && $consulta['senha'] == $senha)
			{
			   	printf("<h3>Olá " . $consulta['nome'] . "</h3></br>");
				printf("<h3>Seu usuário é " . $consulta['login'] . "</h3></br>");
				printf("<h3>Sua senha é " . $consulta['senha'] . "</h3>");
				exit;
			}
			else
			{
				echo "Login e / ou Senha inválidos.";
			}
		}    
	}
?>
</body>
</html>
