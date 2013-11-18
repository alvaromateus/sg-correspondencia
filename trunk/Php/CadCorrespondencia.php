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
                Nova Correspondência
            </div>
            <div id="conteudo">
                <form method="post" action="Insercao.php">
                <input type="hidden" name="Inserir" value="CORRESPONDENCIA"/>
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
                <table>
                    <tr>
                        <td>
                            <label class="lb">Correspondência:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtnumero" class="txt" value='<?php echo $registro ?>' title="Digite o número da correspôndencia."/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="lb">Tipo:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txttipo" class="txt" title="Digite o tipo."/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="lb">Tamanho:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txttamanho" class="txt" title="Digite o tamanho."/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="lb">Remetente:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtremetente" class="txt" title="Digite o remetente."/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="lb">Destinatário:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtdestinatario" class="txt" title="Digite o destinatário."/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="lb">Malote:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtmalote" class="txt" title="Digite o malote."/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="lb">Protocolo:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txtprotocolo" class="txt" title="Digite o protocolo."/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="txtusuario" value='<?php session_start(); echo $_SESSION['Registro'];?>'/>
                            <input type="submit" value="Salvar" name="btsalvar" class="bt" title="Clique para salvar."/>
                        </td>
                    </tr>
                </table> 
                </form>
            </div>
        </div>
    </body>
</html>
