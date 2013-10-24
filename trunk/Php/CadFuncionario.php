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
                Cadastro de Novo Funcionário
            </div>
            <div class="logar">
                <form method="post" action="">
                    <label class="lb">Registro:</label>
                    <input type="text" name="txtregistro" class="txt" title="Digite o registro."/>
                    <label class="lb">Nome:</label>
                    <input type="text" name="txnome" class="txt" title="Digite o nome."/>
                    <label class="lb">Telefone:</label>
                    <input type="text" name="txttelefone" class="txt" title="Digite o telefone."/>
                    <label class="lb">Ramal:</label>
                    <input type="text" name="txtramal" class="txt" title="Digite o ramal."/>
                    <label class="lb">Cargo:</label>
                    <input type="text" name="txtcargo" class="txt" title="Digite o cargo."/>
                    <label class="lb">Depart.:</label>
                    <input type="text" name="txtdepartamento" class="txt" title="Digite o departamento."/>
                    <input type="submit" value="Salvar" name="btsalvar" class="bt" title="Clique para salvar." onClick="Consultar.value='GERAR';"/>
                </form>
            </div>
        </div>
    </body>
</html>
