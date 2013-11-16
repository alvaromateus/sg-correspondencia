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
                Cadastro de Nova Correspondência
            </div>
            <form method="post" action="Insercao.php">
                <input type="hidden" name="Inserir" value="CORRESPONDENCIA"/>
                <div class="logar">
                    <label class="lb">Correspondência:</label>
                    <?php
                    require 'Conexao.php';
                    if($_SESSION['Conexao'] == 'Sim')
                    {
                        $stmt = oci_parse($conexao, "SELECT sq_correspondecia.nextval FROM Dual");
                        oci_execute($stmt, OCI_DEFAULT);
                        while($row = oci_fetch_array($stmt))
                        {
                            $registro = $row[0];
                        }
                    }
                    oci_free_statement($stmt);
                    ?>
                    <input type="text" name="txtnumero" class="txt" value='<?php echo $registro ?>' title="Digite o número da correspôndencia."/>
                    <label class="lb">Tipo:</label>
                    <input type="text" name="txttipo" class="txt" title="Digite o tipo."/>
                    <label class="lb">Tamanho:</label>
                    <input type="text" name="txttamanho" class="txt" title="Digite o tamanho."/>
                    <label class="lb">Remetente:</label>
                    <input type="text" name="txtremetente" class="txt" title="Digite o remetente."/>
                    <label class="lb">Destinatário:</label>
                    <input type="text" name="txtdestinatario" class="txt" title="Digite o destinatário."/>
                    <label class="lb">Malote:</label>
                    <input type="text" name="txtmalote" class="txt" title="Digite o malote."/>
                    <label class="lb">Protocolo:</label>
                    <input type="text" name="txtprotocolo" class="txt" title="Digite o protocolo."/>
                    <input type="hidden" name="txtusuario" value='<?php session_start(); echo $_SESSION['Registro'];?>'/>
                    <input type="submit" value="Salvar" name="btsalvar" class="bt" title="Clique para salvar."/>
                </div>
            </form>
        </div>
    </body>
</html>
