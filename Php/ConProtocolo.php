<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/.css" />
        <title>.: SG Correspondência :.</title>
    </head>
    <body>
        <div id ="principal">
            <?php
                require 'Logado.php';
                require 'Menu.php';
                require 'Conexao.php';
                if($_SESSION['Conexao'] == 'Sim')
                {
                    //Exclusão faz esse bloco.
                    if(isset($_GET['Excluir']))
                    {
                    ?>
                        <?php
                            //Qual id vai ser excluído.
                            $confirmacao = $_GET['I'];
                            $del = oci_parse($conexao, "DELETE Protocolo WHERE cd_registro =".$confirmacao);
                            oci_execute($del, OCI_DEFAULT);
                            oci_commit($del);
                            oci_free_statement($del);
                            echo "<script>alert('Dados excluídos com sucesso.'); window.location='ConProtocolo.php'</script>";
                        ?>
                    <?php
                    }
                    //Atualização faz esse bloco.
                    else if(isset($_GET['Atualizar']))
                    {
                    ?>
                        <div class="topo">
                            Atualizar Protocolo
                        </div>
                        <div class="conteudo">
                            <form method="post" action="Atualizacao.php">
                                <input type="hidden" name="Atualizar" value="PROTOCOLO"/>
                                 <table>
                                <tr>
                                    <td>
                                        <label class="lb">Número:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Data Recebimento:</label>
                                    </td>
                                </tr>
                                <?php
                                $id = $_GET['I'];
                                $select = oci_parse($conexao, "SELECT dt_recebimento FROM Protocolo WHERE cd_protocolo = ".$id);
                                oci_execute($select, OCI_DEFAULT);
                                while(Ocifetch($select))
                                {
                                ?>
                                    <tr>                              
                                        <td>
                                            <input type="text" name="txtprotocolo" readonly="readonly" value='<?php echo $id ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtdata" class="txt" value='<?php echo ociresult($select, "DT_RECEBIMENTO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="submit" value="Atualizar" name="btatualizar" class="bt" title="Clique para atualizar." />
                                        </td>
                                    </tr>
                                  </table>
                                <?php
                                }
                                oci_free_statement($select);
                                ?>
                            </form>
                        </div>
                    <?php
                    }
                    else
                    {
                    ?>
                        <div class="topo">
                            Protocolos cadastrados
                        </div>
                        <div class ="conteudo">
                            <form method="get" action="">
                            <table>
                                <tr>
                                    <td>
                                        <label class="lb">Número:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Data Recebimento:</label>
                                    </td>
                                    <td colspan="2">
                                        <label class="lb">Configurações:</label>
                                    </td>
                                </tr>
                            <?php
                            //Seleciona todos os funcionários cadastrados
                            $stmt = oci_parse($conexao, "SELECT * FROM Protocolo");
                            oci_execute($stmt, OCI_DEFAULT);
                            while(Ocifetch($stmt))
                            {
                                $id = ociresult($stmt, "CD_PROTOCOLO");
                                ?>
                                <tr>                              
                                    <td>
                                        <input type="text" name="txtprotocolo" class="txt" readonly="readonly" value='<?php echo $id ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtrecebimento" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "DT_RECEBIMENTO") ?>'/>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConProtocolo.php?Atualizar&I=$id' class='bt1'>Atualizar</a>"; ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConProtocolo.php?Excluir&I=$id' class='bt2'>Excluir</a>"; ?>
                                    </td>
                                 </tr>
                            <?php
                            }
                            ?>
                                <tr>
                                    <td colspan="8">
                                        <a href='CadProtocolo.php' class='bt1'>Novo Cadastro</a>
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                        <?php
                        oci_free_statement($stmt);
                     }
                 }
                ?>
        </div>
    </body>
</html>



