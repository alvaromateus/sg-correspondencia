<?php
    $user='fernando';
    $senha='123';
    $banco='XE';
    $conexao = oci_connect($user, $senha, $banco);
    if (!$conexao)
    {
        $_SESSION['Conexao'] = 'Nao';
    }
    else
    {
        $_SESSION['Conexao'] = 'Sim';
    }
?>
