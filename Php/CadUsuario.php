<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/FormatacaoUnidade.css">
        <title>.: SG Correspondência :.</title>
    </head>
    <body>
        <div id="Principal">
            <?php
                require 'Logado.php';
                require 'Menu.php';
            ?>
            <div class="topo">
                Cadastro de Novo Usuário
            </div>
            <form method="post" action="">
                <div class="logar">
                    <label class="lb">Registro:</label>
                    <input type="text" name="txtregistro" class="txt" title="Digite o registro."/>
                    <label class="lb">Usuário:</label>
                    <input type="text" name="txtusuario" class="txt" title="Digite o usuário."/>
                    <label class="lb">Senha:</label>
                    <input type="text" name="txtsenha" class="txt" title="Digite a senha."/>
                    <label class="lb">Acesso:</label>
                    <input type="text" name="txtacesso" class="txt" title="Digite o nível de acesso."/>
                    <input type="submit" value="Salvar" name="btsalvar" class="bt" title="Clique para salvar." onClick="Consultar.value='GERAR';"/>
                </div>
            </form>
        </div>
    </body>
</html>
