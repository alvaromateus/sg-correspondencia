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
                            $del = oci_parse($conexao, "DELETE Correspondencia WHERE cd_registro =".$confirmacao);
                            oci_execute($del, OCI_DEFAULT);
                            oci_commit($del);
                            oci_free_statement($del);
                            echo "<script>alert('Dados excluídos com sucesso.'); window.location='ConCorrespondencia.php'</script>";
                        ?>
                    <?php
                    }
                    //Atualização faz esse bloco.
                    else if(isset($_GET['Atualizar']))
                    {
                    ?>
                        <div class="topo">
                            Atualizar Correspondência
                        </div>
                        <div class="conteudo">
                            <form method="post" action="Atualizacao.php">
                                <input type="hidden" name="Atualizar" value="CORRESPONDENCIA"/>
                                 <table>
                                    <tr>
                                    <td>
                                        <label class="lb">Correspondência:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Tipo:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Tamanho:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Remetente:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Destinatário:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Malote:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Protocolo:</label>
                                    </td>
                                </tr>
                                <?php
                                $id = $_GET['I'];
                                $select = oci_parse($conexao, "SELECT nm_tipo, nm_tamanho, nm_remetente, nm_destinatario, cd_malote, cd_protocolo FROM Correspondencia WHERE cd_correspondencia = ".$id);
                                oci_execute($select, OCI_DEFAULT);
                                while(Ocifetch($select))
                                {
                                ?>
                                    <tr>                              
                                        <td>
                                            <input type="text" name="txtregistro" value='<?php echo $id ?>'/>
                                        </td>     
                                        <td>
                                            <input type="text" name="txttipo" class="txt" value='<?php echo ociresult($select, "NM_TIPO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txttamanho" class="txt" value='<?php echo ociresult($select, "NM_TAMANHO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtremetente" class="txt" value='<?php echo ociresult($select, "NM_REMETENTE") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtdestinatario" class="txt" value='<?php echo ociresult($select, "NM_DESTINATARIO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtmalote" class="txt" value='<?php echo ociresult($select, "CD_MALOTE") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtprotocolo" class="txt" value='<?php echo ociresult($select, "CD_PROTOCOLO") ?>'/>
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
                            Correspondencias cadastradas
                        </div>
                        <div class ="conteudo">
                            <form method="get" action="">
                            <table>
                                <tr>
                                    <td>
                                        <label class="lb">Correspondência:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Tipo:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Tamanho:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Remetente:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Destinatário:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Malote:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Protocolo:</label>
                                    </td>
                                    <td colspan="2">
                                        <label class="lb">Configurações:</label>
                                    </td>
                                </tr>
                            <?php
                            //Seleciona todos os funcionários cadastrados
                            $stmt = oci_parse($conexao, "SELECT * FROM Correspondencia");
                            oci_execute($stmt, OCI_DEFAULT);
                            while(Ocifetch($stmt))
                            {
                                $id = ociresult($stmt, "CD_CORRESPONDENCIA");
                                ?>
                                <tr>                              
                                    <td>
                                        <input type="text" name="txtcorrespondencia" readonly="readonly" class="txt" value='<?php echo $id ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txttipo" readonly="readonly" class="txt" value='<?php echo ociresult($stmt, "NM_TIPO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txttamanho" readonly="readonly" class="txt" value='<?php echo ociresult($stmt, "NM_TAMANHO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtremetente" readonly="readonly" class="txt" value='<?php echo ociresult($stmt, "NM_REMETENTE") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtdestinatario" readonly="readonly" class="txt" value='<?php echo ociresult($stmt, "NM_DESTINATARIO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtmalote" readonly="readonly" class="txt" value='<?php echo ociresult($stmt, "CD_MALOTE") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtprotocolo" readonly="readonly" class="txt" value='<?php echo ociresult($stmt, "CD_PROTOCOLO") ?>'/>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConCorrespondencia.php?Atualizar&I=$id' class='bt1'>Atualizar</a>"; ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConCorrespondencia.php?Excluir&I=$id' class='bt2'>Excluir</a>"; ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                                <tr>
                                    <td colspan="9">
                                        <a href='CadCorrespondencia.php' class='bt1'>Novo Cadastro</a>
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



