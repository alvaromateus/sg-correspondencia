<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/FormatacaoUnidade.css">
        <title>.: SG Correspondência :.</title>
    </head>
    <body>
        <div id="Principal">
            <?php
                require 'Logado.php';
                require 'Menu.php';
            ?>
            <div class="topo">
                Cadastrar Novo Protocolo
            </div>
            <form method="post" action="Insercao.php">
                <div class="logar">
                    <input type="hidden" name="Inserir" value="PROTOCOLO"/>
                    <label class="lb">Número:</label>
                    <?php
                        require 'Conexao.php';
                        if($_SESSION['Conexao'] == 'Sim')
                        {
                            $stmt = oci_parse($conexao, "SELECT sq_protocolo.nextval FROM Dual");
                            oci_execute($stmt, OCI_DEFAULT);
                            while($row = oci_fetch_array($stmt))
                            {
                                $registro = $row[0];
                            }
                        }
                    ?>
                    <input type="text" name="txtnumero" class="txt" readonly="readonly" value='<?php echo $registro ?>' title="Número do protocolo."/>
                    <label class="lb">Data:</label>
                    <input type="text" name="txtdata" class="txt" title="Digite a data de recebimento."/>
                    <input type="submit" value="Salvar" name="btsalvar" class="bt" title="Clique para salvar."/>
                </div>
            </form>
        </div>
    </body>
</html>