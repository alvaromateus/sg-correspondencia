<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>.: Consultar Usuário :.</title>
    </head>
    <body>
        <?php
            //Inicia a conexão com o banco.
            require 'Conexao.php';
            //Se conexão bem sucedida executa esse if.
            if($_SESSION['Conexao'] == 'Sim')
            {
                //Seleciona todos os usuários cadastrados
                $stmt = oci_parse($conexao, "SELECT cd_registro, nm_usuario, nm_senha, nm_acesso FROM Usuario");
                oci_execute($stmt, OCI_DEFAULT);
                while(Ocifetch($stmt))
                {
                    echo "Registro: ".ociresult($stmt, "CD_REGISTRO");
                    echo "Usuário: ".ociresult($stmt, "NM_USUARIO");
                    echo "Senha: ".ociresult($stmt, "NM_SENHA");
                    echo "Nível Acesso: ".ociresult($stmt, "NM_ACESSO");
                    echo "</br>";
                }
                ocifreestatement($stmt);
            }
        ?>
    </body>
</html>
