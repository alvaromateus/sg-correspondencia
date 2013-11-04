<?php
    require 'Conexao.php';
    if($_SESSION['Conexao'] == 'Sim')
    {
        if($_POST['Atualizar'] == "USUARIO")
        {
            $cregistro = $_POST['txtregistro'];
            $cusuario = $_POST['txtusuario'];
            $csenha = $_POST['txtsenha'];
            $cacesso = $_POST['txtacesso'];
            $sql = oci_parse($conexao, 'UPDATE Usuario SET nm_usuario = :usuario, nm_senha = :senha, nm_acesso = :acesso WHERE cd_registro = :registro');
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':usuario', $cusuario);
            oci_bind_by_name($sql, ':senha', $csenha);
            oci_bind_by_name($sql, ':acesso', $cacesso);
            oci_execute($sql);
            oci_free_statement($sql);
            header('Location: ConUsuario.php');
        }
    }
?>