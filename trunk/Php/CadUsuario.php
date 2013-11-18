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
            ?>
            <div id="topo">
                Novo Usuário
            </div>
            <div id="conteudo">
                <form method="post" action="Insercao.php">
                    <table>
                        <tr>
                            <td>
                                <input type="hidden" name="Inserir" value="USUARIO"/>
                                <label class="lb">Registro:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtregistro" class="txt" readonly="readonly" value="<?php echo $_GET['I'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="lb">Usuário:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtusuario" class="txt" title="Digite o usuário."/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="lb">Senha:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtsenha" class="txt" title="Digite a senha."/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="lb">Acesso:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtacesso" class="txt" title="Digite o nível de acesso."/>
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
        </div>
    </body>
</html>

