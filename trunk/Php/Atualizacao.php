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
        if($_POST['Atualizar'] == "FUNCIONARIO")
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
    }
?>