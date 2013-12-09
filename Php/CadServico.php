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
                Cadastro de Novo Serviço
            </div>
            <div id="conteudo">
                <form method="post" action="Insercao.php">
                    <input type="hidden" name="Inserir" value="SERVICO"/>
                    <?php
                        require 'Conexao.php';
                        if($_SESSION['Conexao'] == 'Sim')
                        {
                            $stmt = oci_parse($conexao, "SELECT sq_servico.nextval FROM Dual");
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
                                <label class="lb">Código:</label>
                    
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtcodigo" class="txt" readonly="readonly" value='<?php echo $registro ?>' title="Código endereço."/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 <label class="lb">Serviço:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtservico" class="txt" title="Digite o tipo do serviço."/>
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
