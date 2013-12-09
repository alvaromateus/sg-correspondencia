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
                require 'Conexao.php';
                if (isset($_SESSION['Usuario']))
                {
            ?>
            <div id="topo">
                Nova Unidade
            </div>
            <div id="conteudo">
                <form method="post" action="Insercao.php">
                    <input type="hidden" name="Inserir" value="UNIDADE"/>
                    <?php
                        require 'Conexao.php';
                        if($_SESSION['Conexao'] == 'Sim')
                        {
                            $stmt = oci_parse($conexao, "SELECT sq_unidade.nextval FROM Dual");
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
                                <label class="lb">Unidade:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtunidade" class="txt" title="Digite o nome da Unidade."/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="lb">Endereço:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtendereco" class="txt" title="Digite o endereço."/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="lb">CEP:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtcep" class="txt" title="Digite o C.E.P."/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="lb">Cidade:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtcidade" class="txt" title="Digite o cidade."/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="lb">Estado:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtestado" class="txt" title="Digite o estado."/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="lb">Telefone:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="tel" name="txttelefone" class="txt" title="Digite o telefone."/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Salvar" name="btsalvar" class="bt" title="Clique para salvar."/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
            }
            else
            {
                header('Location: Login.php?ErroLogar');
            }
            ?>
        </div>
    </body>
</html>