<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/FormatacaoCon.css" />
        <title>.: Consultar Usuário :.</title>
    </head>
    <body>
        <div id ="principal">
            <?php
                require 'Logado.php';
                require 'Menu.php';
                require 'Conexao.php';
                if (isset($_SESSION['Usuario']))
                {
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
                        <div id="topo">
                            Atualizar Cadastro Funcionário
                        </div>
                        <div id="conteudo">
                            <form method="post" action="Atualizacao.php">
                                <input type="hidden" name="Atualizar" value="FUNCIONARIO"/>
                                 <table>
                                <tr>
                                    <td>
                                        <label class="lb2">Registro:</label>
                                    </td>
                                    <td>
                                        <label class="lb3">Funcionário:</label>
                                    </td>
                                    <td>
                                        <label class="lb2">Ramal:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Unidade:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Departamento:</label>
                                    </td>
                                    <td>
                                        <label class="lb1">Cargo:</label>
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
                                            <input type="text" name="txtregistro" class="txt2" readonly="readonly" value='<?php echo $id ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtfuncionario" class="txt3" value='<?php echo ociresult($select, "NM_FUNCIONARIO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtramal" class="txt2" value='<?php echo ociresult($select, "CD_RAMAL") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtunidade" class="txt" value='<?php echo ociresult($select, "NM_UNIDADE") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtdepartamento" class="txt" value='<?php echo ociresult($select, "NM_DEPARTAMENTO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtcargo" class="txt1" value='<?php echo ociresult($select, "NM_CARGO") ?>'/>
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
                        <div id="topo">
                            Funcionários Cadastrados
                        </div>
                        <div id="conteudo">
                            <form method="get" action="">
                            <table>
                                <tr>
                                    <td>
                                        <label class="lb2">Registro:</label>
                                    </td>
                                    <td>
                                        <label class="lb3">Funcionário:</label>
                                    </td>
                                    <td>
                                        <label class="lb2">Ramal:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Unidade:</label>
                                    </td>
                                    <td>
                                        <label class="lb">Departamento:</label>
                                    </td>
                                    <td>
                                        <label class="lb1">Cargo:</label>
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
                                        <input type="text" name="txtregistro" class="txt2" readonly="readonly" value='<?php echo $id ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtfuncionario" class="txt3" readonly="readonly" value='<?php echo ociresult($stmt, "NM_FUNCIONARIO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtramal" class="txt2" readonly="readonly" value='<?php echo ociresult($stmt, "CD_RAMAL") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtunidade" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_UNIDADE") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtdepartamento" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_DEPARTAMENTO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtcargo" class="txt1" readonly="readonly" value='<?php echo ociresult($stmt, "NM_CARGO") ?>'/>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConFuncionario.php?Atualizar&I=$id' class='bt'>Atualizar</a>"; ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href='ConFuncionario.php?Excluir&I=$id' class='bt'>Excluir</a>"; ?>
                                    </td>
                                        <td>
                                        <?php
                                            if($_SESSION['Nivel'] == 0)
                                            {
                                                $stmt = oci_parse($conexao, "SELECT cd_registro FROM Usuario WHERE cd_registro = ".$id);
                                                oci_execute($stmt, OCI_DEFAULT);
                                                $row = oci_fetch_array($stmt);
                                                if($row > 0)
                                                {
                                                    echo "<a href='ConUsuario.php?Atualizar&I=$id' class='bt'>Alt. Usuário</a>";
                                                }
                                                else
                                                {
                                                    echo "<a href='CadUsuario.php?I=$id' class='bt'>Cad. Usuário</a>";
                                                }
                                            }
                                        ?>
                                        </td>
                                    </tr>
                            <?php
                            }
                            if($_SESSION['Nivel'] == 0)
                            {
                            ?>
                                <tr>
                                    <td colspan="8">
                                        <a href='CadFuncionario.php' class='bt'>Novo Cadastro</a>
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                        <?php
                        oci_free_statement($stmt);
                     }
                    }
                    }
                }
                else
                {
                    header('Location: Login.php?ErroLogar');
                }
                ?>
        </div>
    </body>
</html>