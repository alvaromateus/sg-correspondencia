<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/FormatacaoCad.css"/>
        <title>.: SG Correspondência :.</title>
    </head>
    <body>
        <div id="Principal">
            <?php
                require 'Logado.php';
                require 'Menu.php';
            ?>
            <div id="topo">
                Novo Cargo
            </div>
            <div id="conteudo">
                <form method="post" action="Insercao.php">
                <input type="hidden" name="Inserir" value="CARGO"/>
                    <?php
                    require 'Conexao.php';
                    if($_SESSION['Conexao'] == 'Sim')
                    {
                        $stmt = oci_parse($conexao, "SELECT sq_cargo.nextval FROM Dual");
                        oci_execute($stmt, OCI_DEFAULT);
                        while($row = oci_fetch_array($stmt))
                        {
                            $registro = $row[0];
                        }
                    }
                    ?>
                    <table>
                        <tr>
                            <td>
                                <input type="hidden" name="txtregistro" value='<?php echo $registro ?>'/>
                                <label class="lb">Cargo:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtcargo" class="txt" title="Digite o cargo."/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Salvar" name="btsalvar" class="bt" title="Clique para salvar." />
                            </td>
                        </tr>
                    </table>
              </form>    
            </div>
         </div>
    </body>
</html>

