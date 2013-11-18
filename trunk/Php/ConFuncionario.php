<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/.css" />
        <title>.: Consultar Usuário :.</title>
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
                            $del = oci_parse($conexao, "DELETE FROM Funcionario WHERE cd_registro =".$confirmacao);
                            oci_execute($del, OCI_COMMIT_ON_SUCCESS);
                            oci_free_statement($del);
                            echo "<script>alert('Dados excluídos com sucesso.'); window.location='ConFuncionario.php'</script>";
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
                                <input type="hidden" name="Atualizar" value="FUNCIONARIO"/>
                                 <table>
                                <tr>
                                    <td>
                                        <label class="lb">Registro:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Funcionário:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Ramal:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Unidade:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Departamento:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Cargo:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Configuração:</label>
                                    </td>
                                </tr>
                                <?php
                                $id = $_GET['I'];
                                $select = oci_parse($conexao, "SELECT f.nm_funcionario, f.cd_ramal, u.nm_unidade, d.nm_departamento, c.nm_cargo FROM Funcionario f, Unidade u, Departamento d, Cargo c WHERE f.cd_unidade = u.cd_unidade AND f.cd_departamento = d.cd_departamento AND f.cd_cargo = c.cd_cargo AND f.cd_registro = ".$id);
                                oci_execute($select, OCI_DEFAULT);
                                while(Ocifetch($select))
                                {
                                ?>
                                    <tr>
                                        <td>
                                            <input type="text" name="txtregistro" class="txt" readonly="readonly" value='<?php echo $id ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtfuncionario" class="txt" value='<?php echo ociresult($select, "NM_FUNCIONARIO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtramal" class="txt" value='<?php echo ociresult($select, "CD_RAMAL") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtunidade" class="txt" value='<?php echo ociresult($select, "NM_UNIDADE") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtdepartamento" class="txt" value='<?php echo ociresult($select, "NM_DEPARTAMENTO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtcargo" class="txt" value='<?php echo ociresult($select, "NM_CARGO") ?>'/>
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
                            Usuários cadastrados
                        </div>
                        <div class ="conteudo">
                            <form method="get" action="">
                            <table>
                                <tr>
                                    <td>
                                        <label class="lb">Registro:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Funcionário:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Ramal:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Unidade:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Departamento:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Cargo:</label>
                                    </td>
                                    <td colspan="3">
                                        <label class="lb">Configurações:</label>
                                    </td>
                                </tr>
                            <?php
                            //Seleciona todos os funcionários cadastrados
                            $stmt = oci_parse($conexao, "SELECT f.cd_registro, f.nm_funcionario, f.cd_ramal, u.nm_unidade, d.nm_departamento, c.nm_cargo FROM Funcionario f, Unidade u, Departamento d, Cargo c WHERE f.cd_unidade = u.cd_unidade AND f.cd_departamento = d.cd_departamento AND f.cd_cargo = c.cd_cargo");
                            oci_execute($stmt, OCI_DEFAULT);
                            while(Ocifetch($stmt))
                            {
                                $id = ociresult($stmt, "CD_REGISTRO");
                                ?>
                                <tr>                              
                                    <td>
                                        <input type="text" name="txtregistro" class="txt" readonly="readonly" value='<?php echo $id ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtfuncionario" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_FUNCIONARIO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtramal" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "CD_RAMAL") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtunidade" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_UNIDADE") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtdepartamento" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_DEPARTAMENTO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtcargo" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_CARGO") ?>'/>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConFuncionario.php?Atualizar&I=$id' class='bt1'>Atualizar</a>"; ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConFuncionario.php?Excluir&I=$id' class='bt2'>Excluir</a>"; ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href='CadUsuario.php?I=$id' class='bt2'>Cad. Usuário</a>"; ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                                <tr>
                                    <td colspan="8">
                                        <a href='CadFuncionario.php' class='bt1'>Novo Cadastro</a>
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