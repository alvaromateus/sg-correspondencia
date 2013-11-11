<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/FormLogin.css"/>
         <script language ="javascript">
            function CampoBranco()
            {
                    // Verica os campos em branco e coloca o foco no campo em branco.
                    if(document.login.txtusuario.value == "")
                    {
                            alert ('O campo USUÁRIO é obrigatório.');
                            document.login.txtusuario.focus();	
                            return false;
                    }
                    if(document.login.txtsenha.value == "")
                    {
                            alert ('O campo SENHA é obrigatório.');
                            document.login.txtsenha.focus();	
                            return false;
                    }
            }
        </script>
        <title>.: SG Correspondência :.</title>
    </head>
    <body>
        <div class="topo">
            Sistema de Gerenciamento de Correspondência
            <br/>
            SGC
        </div>
        <form name="login" method="post" action="VerificarLogin.php">
            <div class="logar">
                <label class="lb">Usuário:</label>
                <input type="text" name="txtusuario" class="txt" title="Digite o nome de usuário."/>
                <label class="lb">Senha:</label>
                <input type="password" name="txtsenha" class="txt" title="Digite a senha."/>
                <input type="submit" value="Entrar" name="btentrar" class="bt" title="Clique para entrar." onClick="return CampoBranco();"/>
            </div>
        </form>
        <?php
            //Se usuário ou senha inválidos, mostra a mensagem.
            if(isset($_GET['ErroLogin']))
            {
            ?>
                <div class="mensagem">
                    <p>
                        <?php
                            echo 'Usuário e / ou senha errado. Tente novamente.';
                        ?>
                    </p>
                </div>
            <?php
            }
            //Não tendo conexão com o banco mostar a mensagem.
            if(isset($_GET['ErroBanco']))
            {
            ?>
                <div class="mensagem">
                    <p>
                        <?php
                            echo 'Não foi possível conectar ao banco de dados. Tente novamente.';
                        ?>
                    </p>
                </div>
            <?php
            }
        ?>
    </body>
</html>