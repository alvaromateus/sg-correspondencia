<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/Formatac.css"/>
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
                        //Qual id vai ser excluído.
                        $confirmacao = $_GET['I'];
                        $del = oci_parse($conexao, "DELETE FROM Usuario WHERE cd_registro =".$confirmacao);
                        oci_execute($del, OCI_COMMIT_ON_SUCCESS);
                        oci_free_statement($del);
                        echo "<script>alert('Dados apagado com sucesso.'); window.location='ConUsuario.php'</script>";
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
                                <input type="hidden" name="Atualizar" value="USUARIO"/>
                                <table>
                                    <tr>
                                        <td>
                                            <label class="lb">Registro:</label>
                                        </td>
                                        <td>
                                            <label class="lb">Usuário:</label>
                                        </td>
                                        <td>
                                            <label class="lb">Senha:</label>
                                        </td>
                                        <td>
                                            <label class="lb">Nível de Acesso:</label>
                                        </td>
                                        <td colspan="2">
                                            <label class="lb">Configurações:</label>
                                        </td>
                                    </tr>
                                <?php
                                $id = $_GET['I'];
                                $select = oci_parse($conexao, 'SELECT nm_usuario, nm_senha, nm_acesso FROM Usuario WHERE cd_registro ='.$id);
                                oci_execute($select, OCI_DEFAULT);
                                while(Ocifetch($select))
                                {
                                ?>
                                    <tr>
                                        <td>
                                            <input type="text" name="txtregistro" class="txt" readonly="readonly" value='<?php echo $id ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtusuario" class="txt" value='<?php echo ociresult($select, "NM_USUARIO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="password" name="txtsenha" class="txt" value='<?php echo ociresult($select, "NM_SENHA") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtacesso" class="txt" value='<?php echo ociresult($select, "NM_ACESSO") ?>'/>
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
                                            <label class="lb">Usuário:</label>
                                        </td>
                                        <td>
                                            <label class="lb">Senha:</label>
                                        </td>
                                        <td>
                                            <label class="lb">Nível de Acesso:</label>
                                        </td>
                                        <td colspan="2">
                                            <label class="lb">Configurações:</label>
                                        </td>
                                    </tr>
                            <?php
                            //Seleciona todos os usuários cadastrados
                            $stmt = oci_parse($conexao, "SELECT * FROM Usuario");
                            oci_execute($stmt, OCI_DEFAULT);
                            while(Ocifetch($stmt))
                            {
                                $id = ociresult($stmt, "CD_REGISTRO");
                                ?>
                                    <tr>
                                        <td>
                                            <input type="text" name="txtusuario" class="txt" readonly="readonly" value='<?php echo $id ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtusuario" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_USUARIO") ?>'/>
                                        </td>
                                        <td>
                                            <input type="password" name="txtsenha" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_SENHA") ?>'/>
                                        </td>
                                        <td>
                                            <input type="text" name="txtacesso" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_ACESSO") ?>'/>
                                        </td>
                                        <td>
                                            <?php echo "<a href='ConUsuario.php?Atualizar&I=$id' class='bt1'>Atualizar</a>"; ?>
                                        </td>
                                        <td>
                                            <?php echo "<a href='ConUsuario.php?Excluir&I=$id' class='bt2'>Excluir</a>"; ?>
                                        </td>
                                    </tr>
                                <?php
                            }
                            ?>
                                <tr>
                                    <td colspan="8">
                                        <a href='ConFuncionario.php' class='bt1'>Novo Cadastro - Verifique se funcionário é cadastrado</a>
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
