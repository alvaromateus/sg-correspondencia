<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Css/Formatacao.css">
        <title>.: SG Correspondência :.</title>
    </head>
    <body>
        <div class="topo">
            .: Bem vindo ao sistema Gen-U :.
        </div>
        <form method="post" action="">
        <input type="hidden" name="Consultar" value="">
        <div class="logar">
            <label class="lb">Usuário:</label>
            <input type="text" name="txtusuario" class="txt" title="Digite o nome de usuário."/>
            <label class="lb">Senha:</label>
            <input type="password" name="txtsenha" class="txt" title="Digite a senha."/>
            <input type="submit" value="Entrar" name="btentrar" onClick="Consultar.value='GERAR';" class="bt">
        </div>
        </form>
    </body>
</html>
