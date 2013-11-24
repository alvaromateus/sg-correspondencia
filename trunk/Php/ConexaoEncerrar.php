<?php 	
	include 'Conexao.php';
        session_start();
	unset($_SESSION['Usuario']);
        unset($_SESSION['Senha']);
        unset($_SESSION['Nivel']);
        unset($_SESSION['Nome']);
        unset($_SESSION['Registro']);
        unset($_SESSION['Conexao']);
        session_unset($_SESSION['Usuario']);
        session_unset($_SESSION['Senha']);
        session_unset($_SESSION['Nivel']);
        session_unset($_SESSION['Nome']);
        session_unset($_SESSION['Registro']);
        session_unset($_SESSION['Conexao']);
        session_destroy();
        header('Location: Login.php'); 
?>
