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
                            $del = oci_parse($conexao, "DELETE Funcionario WHERE cd_registro =".$confirmacao);
                            oci_execute($del, OCI_DEFAULT);
                            oci_commit($del);
                            oci_free_statement($del);
                            echo "<script>alert('Dados excluídos com sucesso.'); window.location='ConUnidade.php'</script>";
                        ?>
                    <?php
                    }
                    //Atualização faz esse bloco.
                    else if(isset($_GET['Atualizar']))
                    {
                    ?>
                        <div class="topo">
                            Atualizar Cadastro de Usuário
                        </div>
                        <div class="conteudo">
                            <form method="post" action="Atualizacao.php">
                                <input type="hidden" name="Atualizar" value="UNIDADE"/>
                                 <table>
                                <tr>
                                    <td>
                                        <label class="lb">Unidade:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Endereço:</label>
                                    </td>
                                    <td>
                                        <label class="lb">CEP:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Cidade:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Estado:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Telefone:</label>
                                    </td>
                                    <td colspan="2">
                                        <label class="lb">Configurações:</label>
                                    </td>
                                </tr>
                                <?php
                                $id = $_GET['I'];
                                $select = oci_parse($conexao, "SELECT nm_unidade, nm_endereco_completo, cd_cep, nm_cidade, sg_estado, cd_telefone FROM Unidade WHERE cd_unidade = ".$id);
                                oci_execute($select, OCI_DEFAULT);
                                while(Ocifetch($select))
                                {
                                ?>
                                    <tr>                              
                                        <td>
                                            <input type="hidden" name="txtregistro" value='<?php echo $id ?>'/>
                                            <input type="text" name="txtunidade" class="txt" value='<?php echo ociresult($select, "NM_UNIDADE") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtendereco" class="txt" value='<?php echo ociresult($select, "NM_ENDERECO_COMPLETO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtcep" class="txt" value='<?php echo ociresult($select, "CD_CEP") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtcidade" class="txt" value='<?php echo ociresult($select, "NM_CIDADE") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtestado" class="txt" value='<?php echo ociresult($select, "SG_ESTADO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txttelefone" class="txt" value='<?php echo ociresult($select, "CD_TELEFONE") ?>'/>
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
                            Unidades cadastradas
                        </div>
                        <div class ="conteudo">
                            <form method="get" action="">
                            <table>
                                <tr>
                                    <td>
                                        <label class="lb">Unidade:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Endereço:</label>
                                    </td>
                                    <td>
                                        <label class="lb">CEP:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Cidade:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Estado:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Telefone:</label>
                                    </td>
                                    <td colspan="2">
                                        <label class="lb">Configurações:</label>
                                    </td>
                                </tr>
                            <?php
                            //Seleciona todos os funcionários cadastrados
                            $stmt = oci_parse($conexao, "SELECT * FROM Unidade");
                            oci_execute($stmt, OCI_DEFAULT);
                            while(Ocifetch($stmt))
                            {
                                $id = ociresult($stmt, "CD_UNIDADE");
                                ?>
                                <tr>                              
                                    <td>
                                        <input type="text" name="txtunidade" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_UNIDADE") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtendereco" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_ENDERECO_COMPLETO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtcep" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "CD_CEP") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtcidade" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_CIDADE") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtestado" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "SG_ESTADO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txttelefone" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "CD_TELEFONE") ?>'/>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConUnidade.php?Atualizar&I=$id' class='bt1'>Atualizar</a>"; ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConUnidade.php?Excluir&I=$id' class='bt2'>Excluir</a>"; ?>
                                    </td>
                                 </tr>
                            <?php
                            }
                            ?>
                                <tr>
                                    <td colspan="8">
                                        <a href='CadUnidade.php' class='bt1'>Novo Cadastro</a>
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
