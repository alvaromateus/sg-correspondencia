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
                //Armazena os valores do text que veio em método post.
                $usuario = $_POST['txtusuario'];
                $senha = md5($_POST['txtsenha']);
                //Verifica o usuário e a senha.
                $stmt = oci_parse($conexao, "SELECT u.nm_usuario, u.nm_senha, u.nm_acesso, f.nm_funcionario FROM Usuario u, Funcionario f WHERE u.nm_usuario = '$usuario' AND u.nm_senha = '$senha' AND u.cd_registro = f.cd_registro");
                oci_execute($stmt, OCI_DEFAULT);
                $row = oci_fetch_array($stmt);
                //Se usuario encontrado armazena o resultado na session para ser usado e chama a tela Home.
                if($row > 0)
                {
                    session_start();
                    $_SESSION['Usuario'] = $row[0];
                    $_SESSION['Senha'] = $row[1];
                    $_SESSION['Nivel'] = $row[2];
                    $_SESSION['Nome'] = $row[3];
                    header('Location: Home.php');
                    exit;
                }
                //Se usuário ou senha incorretos chama a tela Login novamente mostrando o erro.
                else
                {
                    header('Location: Login.php?ErroLogin');
                }
            }
            //Se não tiver sucesso na conexão ele chama a tela de Login novamente mostrando o erro.
            else
            {
                header('Location: Login.php?ErroBanco');
            }
        ?>
    </body>
</html>
