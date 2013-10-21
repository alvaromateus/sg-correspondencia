<?php
    require 'Conexao.php';
    if($_SESSION['Conexao'] == 'Sim')
    {
        if($_POST['Inserir'] == "MALOTE")
        {
            $sql = oci_parse($conexao, 'INSERT INTO Malote (cd_malote, nm_origem, nm_destino, qt_correspondencia) VALUES (:malote, :origem, :destino, :quantidade)');
            $malote = $_POST['txtnumero'];
            $origem = $_POST['txtorigem'];
            $destino = $_POST['txtdestino'];
            $quantidade = $_POST['txtquantidade'];
            oci_bind_by_name($sql, ':malote', $malote);
            oci_bind_by_name($sql, ':origem', $origem);
            oci_bind_by_name($sql, ':destino', $destino);
            oci_bind_by_name($sql, ':quantidade', $quantidade);
            oci_execute($sql);
            oci_free_statement($sql);
            header('Location: /SGC/trunk/Php/CadMalote.php?Malote=1');
        }
    }
?>
