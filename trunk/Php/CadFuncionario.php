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
                <form method="post" action="Insercao.php">
                    <input type="hidden" name="Inserir" value="FUNCIONARIO"/>
                    <label class="lb">Registro:</label>
                    <?php
                        require 'Conexao.php';
                        if($_SESSION['Conexao'] == 'Sim')
                        {
                            $stmt = oci_parse($conexao, "SELECT sq_funcionario.nextval FROM Dual");
                            oci_execute($stmt, OCI_DEFAULT);
                            while($row = oci_fetch_array($stmt))
                            {
                                $registro = $row[0];
                            }
                        }
                    ?>
                    <input type="text" name="txtregistro" class="txt" readonly="readonly" value='<?php echo $registro ?>' title="Digite o registro."/>
                    <label class="lb">Nome:</label>
                    <input type="text" name="txtnome" class="txt" title="Digite o nome."/>
                    <label class="lb">Ramal:</label>
                    <input type="text" name="txtramal" class="txt" title="Digite o ramal."/>
                    <label class="lb">Unidade:</label>
                    <input type="text" name="txtunidade" class="txt" title="Digite a unidade."/>
                    <label class="lb">Departamento:</label>
                    <input type="text" name="txtdepartamento" class="txt" title="Digite o departamento."/>
                    <label class="lb">Cargo:</label>
                    <input type="text" name="txtcargo" class="txt" title="Digite o cargo."/>
                    <input type="submit" value="Salvar" name="btsalvar" class="bt" title="Clique para salvar."/>
                </form>
            </div>
        </div>
    </body>
</html>
