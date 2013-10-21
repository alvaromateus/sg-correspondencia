<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../Formatação/FormatacaoUnidade.css">
        <title>.: SG Correspondência :.</title>
    </head>
    <body>
        <div id="Principal">
            <div id="Login">
                <?php
                    require 'Logado.php';
                ?>
            </div>
            <div id="Menu">
                <?php
                    require 'Menu.php';
                ?>
            </div>
            <div class="topo">
                Cadastro de Nova Correspondência
            </div>
            <form method="post" action="">
                <div class="logar">
                    <label class="lb">Número:</label>
                    <input type="text" name="txtnumero" class="txt" title="Digite o número da correspôndencia."/>
                    <label class="lb">Tipo:</label>
                    <input type="text" name="txtipo" class="txt" title="Digite o tipo."/>
                    <label class="lb">Tamanho:</label>
                    <input type="text" name="txttamanho" class="txt" title="Digite o tamanho."/>
                    <label class="lb">Rem.:</label>
                    <input type="text" name="txtremetente" class="txt" title="Digite o remetente."/>
                    <label class="lb">Dest.:</label>
                    <input type="text" name="txtdestinatario" class="txt" title="Digite o destinatário."/>
                    <label class="lb">Malote:</label>
                    <input type="text" name="txtmalote" class="txt" title="Digite o malote."/>
                    <label class="lb">Protocolo:</label>
                    <input type="text" name="txtprotocolo" class="txt" title="Digite o protocolo."/>
                    <label class="lb">Serviço:</label>
                    <input type="text" name="txtservico" class="txt" title="Digite o serviço."/>
                    <input type="submit" value="Salvar" name="btsalvar" class="bt" title="Clique para salvar." onClick="Consultar.value='GERAR';"/>
                </div>
            </form>
        </div>
    </body>
</html>
