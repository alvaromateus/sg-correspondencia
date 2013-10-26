<?php
    $user='correspondencia';
    $senha='sgc';
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
