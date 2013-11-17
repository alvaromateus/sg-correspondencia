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
                Cadastro de Novo Serviço
            </div>
            <form method="post" action="Insercao.php">
                <div class="logar">
                    <input type="hidden" name="Inserir" value="SERVICO"/>
                    <label class="lb">Código:</label>
                    <?php
                        require 'Conexao.php';
                        if($_SESSION['Conexao'] == 'Sim')
                        {
                            $stmt = oci_parse($conexao, "SELECT sq_servico.nextval FROM Dual");
                            oci_execute($stmt, OCI_DEFAULT);
                            while($row = oci_fetch_array($stmt))
                            {
                                $registro = $row[0];
                            }
                        }
                    ?>
                    <input type="text" name="txtcodigo" class="txt" readonly="readonly" value='<?php echo $registro ?>' title="Código endereço."/>
                    <label class="lb">Serviço:</label>
                    <input type="text" name="txtservico" class="txt" title="Digite o tipo do serviço."/>
                    <input type="submit" value="Salvar" name="btsalvar" class="bt" title="Clique para salvar."/>
                </div>
            </form>
        </div>
    </body>
</html>
