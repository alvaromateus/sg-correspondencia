<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/Formatac.css"/>
        <title>.: Configurações :.</title>
    </head>
    <body>
        <div id ="principal">
            <?php
                require 'Logado.php';
                require 'Menu.php';
                require 'Conexao.php';
                if($_SESSION['Conexao'] == 'Sim')
                {
                ?>
                    <div class="topo">
                        Configurações pessoais
                    </div>
                    <div class ="conteudo">
                        <form method="post" action="Atualizacao.php">
                        <input type="hidden" name="Atualizar" value="PROPRIO"/>
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
                                    <label class="lb">Usuário:</label>
                                </td>
                                <td>
                                    <label class="lb">Senha:</label>
                                </td>
                            </tr>
                        <?php
                        //Seleciona todos os usuários cadastrados
                        $registro = $_SESSION['Registro'];
                        $stmt = oci_parse($conexao, "SELECT f.nm_funcionario, f.cd_ramal, u.nm_unidade, d.nm_departamento, c.nm_cargo, g.nm_usuario, g.nm_senha FROM Funcionario f, Usuario g, Unidade u, Departamento d, Cargo c WHERE f.cd_unidade = u.cd_unidade AND f.cd_departamento = d.cd_departamento AND f.cd_cargo = c.cd_cargo AND f.cd_registro = ".$registro);
                        oci_execute($stmt, OCI_DEFAULT);
                        while(Ocifetch($stmt))
                        {
                            ?>
                                <tr>
                                    <td>
                                        <input type="text" name="txtregistro" class="txt" readonly="readonly" value='<?php echo $registro ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtfuncionario" class="txt" value='<?php echo ociresult($stmt, "NM_FUNCIONARIO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtramal" class="txt" value='<?php echo ociresult($stmt, "CD_RAMAL") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtunidade" class="txt" value='<?php echo ociresult($stmt, "NM_UNIDADE") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtdepartamento" class="txt" value='<?php echo ociresult($stmt, "NM_DEPARTAMENTO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtcargo" class="txt" value='<?php echo ociresult($stmt, "NM_CARGO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="text" name="txtusuario" class="txt" value='<?php echo ociresult($stmt, "NM_USUARIO") ?>'/>
                                    </td>
                                    <td>
                                        <input type="password" name="txtsenha" class="txt" value='<?php echo ociresult($stmt, "NM_SENHA") ?>'/>
                                    </td>
                                </tr>
                                <tr>
                                <td colspan="8">
                                    <input type="submit" value="Atualizar" name="btsalvar" class="bt" title="Clique para salvar."/>
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
