<?php
    require 'Conexao.php';
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
            $sql_ = oci_parse($conexao, "SELECT u.cd_unidade, d.cd_departamento, c.cd_cargo FROM Unidade u, Departamento d, Cargo c WHERE u.nm_unidade = '".$uni."' AND d.nm_departamento = '".$dep. "'AND c.nm_cargo = '".$car."'");
            oci_execute($sql_, OCI_DEFAULT);
            while(Ocifetch($sql_))
            {
                $cunidade = ociresult($sql_, "CD_UNIDADE");
                $cdepartamento = ociresult($sql_, "CD_DEPARTAMENTO");
                $ccargo = ociresult($sql_, "CD_CARGO");
            }
            oci_free_statement($sql_);
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
            $sql = oci_parse($conexao, 'UPDATE Unidade SET nm_unidade = :unidade, nm_cidade = :cidade, sg_estado = :estado, nm_endereco_completo = :endereco, cd_cep = :cep, cd_telefone = :telefone WHERE cd_unidade = :registro');
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
    }
?>