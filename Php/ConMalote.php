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
                            $del = oci_parse($conexao, "DELETE Cargo WHERE cd_registro =".$confirmacao);
                            oci_execute($del, OCI_DEFAULT);
                            oci_commit($del);
                            oci_free_statement($del);
                            echo "<script>alert('Dados excluídos com sucesso.'); window.location='ConCargo.php'</script>";
                        ?>
                    <?php
                    }
                    //Atualização faz esse bloco.
                    else if(isset($_GET['Atualizar']))
                    {
                    ?>
                        <div class="topo">
                            Atualizar Cadastro de Malote
                        </div>
                        <div class="conteudo">
                            <form method="post" action="Atualizacao.php">
                                <input type="hidden" name="Atualizar" value="MALOTE"/>
                                 <table>
                                <tr>
                                    <td>
                                        <label class="lb">Número:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Origem:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Destino:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Data:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Serviço:</label>
                                    </td>
                                </tr>
                                <?php
                                $id = $_GET['I'];
                                $select = oci_parse($conexao, "SELECT m.nm_origem, m.nm_destino, m.dt_malote, s.nm_tipo FROM Malote m, Servico s WHERE m.cd_servico = s.cd_servico AND cd_malote = ".$id);
                                oci_execute($select, OCI_DEFAULT);
                                while(Ocifetch($select))
                                {
                                ?>
                                    <tr>                              
                                        <td>
                                            <input type="text" name="txtmalote" readonly="readonly" value='<?php echo $id ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtorigem" class="txt" value='<?php echo ociresult($select, "NM_ORIGEM") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtdestino" class="txt" value='<?php echo ociresult($select, "NM_DESTINO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtdata" class="txt" value='<?php echo ociresult($select, "DT_MALOTE") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txttipo" class="txt" value='<?php echo ociresult($select, "NM_TIPO") ?>'/>
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
                            Malotes cadastrados
                        </div>
                        <div class ="conteudo">
                            <form method="get" action="">
                            <table>
                                <tr>
                                    <td>
                                        <label class="lb">Número:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Origem:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Destino:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Data:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Serviço:</label>
                                    </td>
                                    <td colspan="2">
                                        <label class="lb">Configurações:</label>
                                    </td>
                                </tr>
                            <?php
                            //Seleciona todos os funcionários cadastrados
                            $stmt = oci_parse($conexao, "SELECT m.cd_malote, m.nm_origem, m.nm_destino, m.dt_malote, s.nm_tipo FROM Malote m, Servico s WHERE m.cd_servico = s.cd_servico");
                            oci_execute($stmt, OCI_DEFAULT);
                            while(Ocifetch($stmt))
                            {
                                $id = ociresult($stmt, "CD_MALOTE");
                                ?>
                                <tr>                              
                                    <td>
                                        <input type="text" name="txtcorrespondencia" class="txt" readonly="readonly" value='<?php echo $id ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtorigem" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_ORIGEM") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtdestino" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_DESTINO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtdata" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "DT_MALOTE") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txttipo" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_TIPO") ?>'/>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConMalote.php?Atualizar&I=$id' class='bt1'>Atualizar</a>"; ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConMalote.php?Excluir&I=$id' class='bt2'>Excluir</a>"; ?>
                                    </td>
                                 </tr>
                            <?php
                            }
                            ?>
                                <tr>
                                    <td colspan="8">
                                        <a href='CadMalote.php' class='bt1'>Novo Cadastro</a>
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


