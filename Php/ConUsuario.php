<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/FormatacaoUnidade.css">
        <title>.: Consultar Usuário :.</title>
    </head>
    <body>
          <?php
          //Inicia a conexão com o banco.
            require 'Conexao.php';
            //Se conexão bem sucedida executa esse if.
            if($_SESSION['Conexao'] == 'Sim')
            {
            //Exclusão faz esse bloco.
            if(isset($_GET['Excluir']))
            {
            ?>
                <div class="mensagem">
                    <p>
                        <?php
                            //Qual id vai ser excluído.
                            $confirmacao = $_GET['I'];
                            echo "Você vai excluir o número $confirmacao";
                        ?>
                    </p>
                </div>
            <?php
            }
            //Atualização faz esse bloco.
            else if(isset($_GET['Atualizar']))
            {
            ?>
                <div class="topo">
                    Atualizar Cadastro de Usuário
                </div>
                <form method="post" action="Atualizacao.php">
                    <input type="hidden" name="Atulizar" value="USUARIO"/>
                    <div class="logar">
                    <?php
                        $id = $_GET['I'];
                        $select = oci_parse($conexao, 'SELECT nm_usuario, nm_senha, nm_acesso FROM Usuario WHERE cd_registro ='.$id);
                        oci_execute($select, OCI_DEFAULT);
                        while(Ocifetch($select))
                        {
                            ?>
                            <label class="lb">Registro:</label>
                            <input type="text" name="txtregistro" class="txt" readonly="readonly" value='<?php echo $id ?>'/>
                            <label class="lb">Usuário:</label>
                            <input type="text" name="txtusuario" class="txt" value='<?php echo ociresult($select, "NM_USUARIO") ?>'/>
                            <label class="lb">Senha:</label>
                            <input type="password" name="txtsenha" class="txt" value='<?php echo ociresult($select, "NM_SENHA") ?>'/>
                            <label class="lb">Nível de Acesso:</label>
                            <input type="text" name="txtacesso" class="txt" value='<?php echo ociresult($select, "NM_ACESSO") ?>'/>
                            <input type="submit" value="Atualizar" name="btatualizar" class="bt" title="Clique para atualizar." />
                    </div>
                </form>
                    <?php
                        }
               }else{
            ?>
        <form method="get" action="">
        <?php
                //Seleciona todos os usuários cadastrados
                $stmt = oci_parse($conexao, "SELECT * FROM Usuario");
                oci_execute($stmt, OCI_DEFAULT);
                while(Ocifetch($stmt))
                {
                    $id = ociresult($stmt, "CD_REGISTRO");
                    ?>
                    <label class="lb">Usuário:</label>
                    <input type="text" name="txtusuario" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_USUARIO") ?>'/>
                    <label class="lb">Senha:</label>
                    <input type="password" name="txtsenha" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_SENHA") ?>'/>
                    <label class="lb">Nível de Acesso:</label>
                    <input type="text" name="txtacesso" class="txt" readonly="readonly" value='<?php echo ociresult($stmt, "NM_ACESSO") ?>'/>
                    <?php
                    echo "<a href='ConUsuario.php?Atualizar&I=$id'>Atualizar</a>";
                    echo "<a href='ConUsuario.php?Excluir&I=$id'>Excluir</a>";
                }
                oci_free_statement($stmt);
            }
               }
            ?>
            </form>
    </body>
</html>
