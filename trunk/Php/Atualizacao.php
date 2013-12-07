<?php
    require 'Conexao.php';
    require 'Logado.php';
    require 'Menu.php';
    if($_SESSION['Conexao'] == 'Sim')
    {
        if($_POST['Atualizar'] == "USUARIO")
        {
            $cregistro = $_POST['txtregistro'];
            $cusuario = $_POST['txtusuario'];
            $csenha = $_POST['txtsenha'];
            $cacesso = $_POST['txtacesso'];
            $select = oci_parse($conexao, 'SELECT nm_senha FROM Usuario WHERE cd_registro ='.$cregistro);
            oci_execute($select, OCI_DEFAULT);
            $row = oci_fetch_array($select);
            if($row[0] != $csenha)
            {
                $csenha = md5($csenha);
            }
            $sql = oci_parse($conexao, 'UPDATE Usuario SET nm_usuario = :usuario, nm_senha = :senha, nm_acesso = :acesso WHERE cd_registro = :registro');
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':usuario', $cusuario);
            oci_bind_by_name($sql, ':senha', $csenha);
            oci_bind_by_name($sql, ':acesso', $cacesso);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados atualizado com sucesso.'); window.location='ConUsuario.php'</script>";
        }
        else if($_POST['Atualizar'] == "FUNCIONARIO")
        {
            $dep = $_POST['txtdepartamento'];
            $uni = $_POST['txtunidade'];
            $car = $_POST['txtcargo'];
            $sqlu = oci_parse($conexao, "SELECT cd_unidade FROM Unidade WHERE nm_unidade = '".$uni."'");
            oci_execute($sqlu, OCI_DEFAULT);
            $row = oci_fetch_array($sqlu);
            $cunidade = $row[0];
            oci_free_statement($sqlu);
            $sqld = oci_parse($conexao, "SELECT cd_departamento FROM Departamento WHERE nm_departamento = '".$dep."'");
            oci_execute($sqld, OCI_DEFAULT);
            $row = oci_fetch_array($sqld);
            $cdepartamento = $row[0];
            oci_free_statement($sqld);
            $sqlc = oci_parse($conexao, "SELECT cd_cargo FROM Cargo WHERE nm_cargo = '".$car."'");
            oci_execute($sqlc, OCI_DEFAULT);
            $row = oci_fetch_array($sqlc);
            $ccargo = $row[0];
            oci_free_statement($sqlc);
            $cregistro = $_POST['txtregistro'];
            $cfuncionario = $_POST['txtfuncionario'];
            $cramal = $_POST['txtramal'];
            $sql = oci_parse($conexao, 'UPDATE Funcionario SET nm_funcionario = :funcionario, cd_ramal = :ramal, cd_unidade = :unidade, cd_departamento = :departamento, cd_cargo = :cargo WHERE cd_registro = :registro');
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':funcionario', $cfuncionario);
            oci_bind_by_name($sql, ':ramal', $cramal);
            oci_bind_by_name($sql, ':unidade', $cunidade);
            oci_bind_by_name($sql, ':departamento', $cdepartamento);
            oci_bind_by_name($sql, ':cargo', $ccargo);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados atualizado com sucesso.'); window.location='ConFuncionario.php'</script>";
        }
        if($_POST['Atualizar'] == "UNIDADE")
        {
            $cregistro = $_POST['txtregistro'];
            $cunidade = $_POST['txtunidade'];
            $cendereco = $_POST['txtendereco'];
            $ccep = $_POST['txtcep'];
            $ccidade = $_POST['txtcidade'];
            $cestado = $_POST['txtestado'];
            $ctelefone = $_POST['txttelefone'];
            $sql = oci_parse($conexao, "UPDATE Unidade SET nm_unidade = :unidade, nm_cidade = addslashes(:cidade), sg_estado = :estado, nm_endereco_completo = :endereco, cd_cep = :cep, cd_telefone = :telefone WHERE cd_unidade = :registro");
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':unidade', $cunidade);
            oci_bind_by_name($sql, ':endereco', $cendereco);
            oci_bind_by_name($sql, ':cep', $ccep);
            oci_bind_by_name($sql, ':cidade', $ccidade);
            oci_bind_by_name($sql, ':estado', $cestado);
            oci_bind_by_name($sql, ':telefone', $ctelefone);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados atualizado com sucesso.'); window.location='ConUnidade.php'</script>";
        }
        if ($_POST['Atualizar'] == "DEPARTAMENTO")
        {
            $cregistro = $_POST['txtregistro'];
            $cdepartamento = $_POST['txtdepartamento'];
            $sql = oci_parse($conexao, 'UPDATE Departamento SET nm_departamento = :departamento WHERE cd_departamento = :registro');
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':departamento', $cdepartamento);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados atualizado com sucesso.'); window.location='ConDepartamento.php'</script>";
        }
        if ($_POST['Atualizar'] == "CARGO")
        {
            $cregistro = $_POST['txtregistro'];
            $ccargo = $_POST['txtcargo'];
            $sql = oci_parse($conexao, 'UPDATE Cargo SET nm_cargo = :cargo WHERE cd_cargo = :registro');
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':cargo', $ccargo);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados atualizado com sucesso.'); window.location='ConCargo.php'</script>";
        }
        if ($_POST['Atualizar'] == "CORRESPONDENCIA")
        {
            $cregistro = $_POST['txtregistro'];
            $ctipo = $_POST['txttipo'];
            $ctamanho = $_POST['txttamanho'];
            $cremetente = $_POST['txtremetente'];
            $cdestinatario = $_POST['txtdestinatario'];
            $cmalote = $_POST['txtmalote'];
            $cprotocolo = $_POST['txtprotocolo'];
            $sql = oci_parse($conexao, 'UPDATE Correspondencia SET nm_tipo = :tipo, nm_tamanho = :tamanho, nm_remetente = :remetente, nm_destinatario = :destinatario, cd_malote = :malote, cd_protocolo = :protocolo WHERE cd_correspondencia = :registro');
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':tipo', $ctipo);
            oci_bind_by_name($sql, ':tamanho', $ctamanho);
            oci_bind_by_name($sql, ':remetente', $cremetente);
            oci_bind_by_name($sql, ':destinatario', $cdestinatario);
            oci_bind_by_name($sql, ':malote', $cmalote);
            oci_bind_by_name($sql, ':protocolo', $cprotocolo);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados atualizado com sucesso.'); window.location='ConCorrespondencia.php'</script>";
        }
        if ($_POST['Atualizar'] == "MALOTE")
        {
            $cmalote = $_POST['txtmalote'];
            $corigem = $_POST['txtorigem'];
            $cdestino = $_POST['txtdestino'];
            $cdata = $_POST['txtdata'];
            $cctipo = $_POST['txttipo'];
            $select = oci_parse($conexao, "SELECT cd_servico FROM Servico WHERE nm_tipo = '".$cctipo."'");
            oci_execute($select, OCI_DEFAULT);
            $row = oci_fetch_array($select);
            $cservico = $row[0];
            $sql = oci_parse($conexao, "UPDATE Malote SET nm_origem = :origem, nm_destino = :destino, dt_malote = :data, cd_servico = :servico WHERE cd_malote = :malote");
            oci_bind_by_name($sql, ':malote', $cmalote);
            oci_bind_by_name($sql, ':origem', $corigem);
            oci_bind_by_name($sql, ':destino', $cdestino);
            oci_bind_by_name($sql, ':data', $cdata);
            oci_bind_by_name($sql, ':servico', $cservico);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados atualizado com sucesso.'); window.location='ConMalote.php'</script>";
        }
        if ($_POST['Atualizar'] == "PROTOCOLO")
        {
            $cprotocolo = $_POST['txtprotocolo'];
            $cdata = $_POST['txtdata'];
            $sql = oci_parse($conexao, 'UPDATE Protocolo SET dt_recebimento = :data WHERE cd_protocolo = :protocolo');
            oci_bind_by_name($sql, ':protocolo', $cprotocolo);
            oci_bind_by_name($sql, ':data', $cdata);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados atualizado com sucesso.'); window.location='ConProtocolo.php'</script>";
        }
        if ($_POST['Atualizar'] == "SERVICO")
        {
            $cservico = $_POST['txtservico'];
            $ctipo = $_POST['txttipo'];
            $sql = oci_parse($conexao, 'UPDATE Servico SET nm_tipo = :tipo WHERE cd_servico = :servico');
            oci_bind_by_name($sql, ':servico', $cservico);
            oci_bind_by_name($sql, ':tipo', $ctipo);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados atualizado com sucesso.'); window.location='ConServico.php'</script>";
        }
        if($_POST['Atualizar'] == "PROPRIO")
        {
            $cregistro = $_POST['txtregistro'];
            $cfuncionario = $_POST['txtfuncionario'];
            $cramal = $_POST['txtramal'];
            $dep = $_POST['txtdepartamento'];
            $uni = $_POST['txtunidade'];
            $car = $_POST['txtcargo'];
            $cusuario = $_POST['txtusuario'];
            $csenha = $_POST['txtsenha'];
            $select = oci_parse($conexao, 'SELECT nm_senha FROM Usuario WHERE cd_registro ='.$cregistro);
            oci_execute($select, OCI_DEFAULT);
            $row = oci_fetch_array($select);
            if($row[0] != $csenha)
            {
                $csenha = md5($csenha);
            }
            oci_free_statement($select);
            $sqlu = oci_parse($conexao, "SELECT cd_unidade FROM Unidade WHERE nm_unidade = '".$uni."'");
            oci_execute($sqlu, OCI_DEFAULT);
            $row = oci_fetch_array($sqlu);
            $cunidade = $row[0];
            oci_free_statement($sqlu);
            $sqld = oci_parse($conexao, "SELECT cd_departamento FROM Departamento WHERE nm_departamento = '".$dep."'");
            oci_execute($sqld, OCI_DEFAULT);
            $row = oci_fetch_array($sqld);
            $cdepartamento = $row[0];
            oci_free_statement($sqld);
            $sqlc = oci_parse($conexao, "SELECT cd_cargo FROM Cargo WHERE nm_cargo = '".$car."'");
            oci_execute($sqlc, OCI_DEFAULT);
            $row = oci_fetch_array($sqlc);
            $ccargo = $row[0];
            oci_free_statement($sqlc);
            $sql = oci_parse($conexao, 'UPDATE Usuario SET nm_usuario = :usuario, nm_senha = :senha WHERE cd_registro = :registro');
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':usuario', $cusuario);
            oci_bind_by_name($sql, ':senha', $csenha);
            oci_execute($sql);
            oci_free_statement($sql);
            $sql = oci_parse($conexao, 'UPDATE Funcionario SET nm_funcionario = :funcionario, cd_ramal = :ramal, cd_unidade = :unidade, cd_departamento = :departamento, cd_cargo = :cargo WHERE cd_registro = :registro');
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':funcionario', $cfuncionario);
            oci_bind_by_name($sql, ':ramal', $cramal);
            oci_bind_by_name($sql, ':unidade', $cunidade);
            oci_bind_by_name($sql, ':departamento', $cdepartamento);
            oci_bind_by_name($sql, ':cargo', $ccargo);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados atualizado com sucesso.'); window.location='Home.php'</script>";
        }
    }
?>