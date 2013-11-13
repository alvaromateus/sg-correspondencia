<?php
    require 'Conexao.php';
    if($_SESSION['Conexao'] == 'Sim')
    {
        if($_POST['Inserir'] == "MALOTE")
        {
            $sql = oci_parse($conexao, 'INSERT INTO Malote (cd_malote, nm_origem, nm_destino, qt_correspondencia) VALUES (:malote, :origem, :destino, :quantidade)');
            $malote = $_POST['txtnumero'];
            $origem = $_POST['txtorigem'];
            $destino = $_POST['txtdestino'];
            $quantidade = $_POST['txtquantidade'];
            oci_bind_by_name($sql, ':malote', $malote);
            oci_bind_by_name($sql, ':origem', $origem);
            oci_bind_by_name($sql, ':destino', $destino);
            oci_bind_by_name($sql, ':quantidade', $quantidade);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados cadastrado com sucesso.'); window.location='ConFu.php'</script>";
        }
        if($_POST['Inserir'] == "FUNCIONARIO")
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
            $sql = oci_parse($conexao, 'INSERT INTO Funcionario (cd_registro, nm_funcionario, cd_ramal, cd_unidade, cd_departamento, cd_cargo) VALUES (:registro, :funcionario, :ramal, :unidade, :departamento, :cargo)');
            $cregistro = $_POST['txtregistro'];
            $cfuncionario = $_POST['txtnome'];
            $cramal = $_POST['txtramal'];
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':funcionario', $cfuncionario);
            oci_bind_by_name($sql, ':ramal', $cramal);
            oci_bind_by_name($sql, ':unidade', $cunidade);
            oci_bind_by_name($sql, ':departamento', $cdepartamento);
            oci_bind_by_name($sql, ':cargo', $ccargo);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados cadastrado com sucesso.'); window.location='ConFuncionario.php'</script>";
        }
        if($_POST['Inserir'] == "USUARIO")
        {
            $sql = oci_parse($conexao, 'INSERT INTO Usuario (cd_registro, nm_usuario, nm_senha, nm_acesso) VALUES (:registro, :usuario, :senha, :acesso)');
            $cregistro = $_POST['txtregistro'];
            $cusuario = $_POST['txtusuario'];
            $csenha = md5($_POST['txtsenha']);
            $cacesso = $_POST['txtacesso'];
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':usuario', $cusuario);
            oci_bind_by_name($sql, ':senha', $csenha);
            oci_bind_by_name($sql, ':acesso', $cacesso);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados cadastrado com sucesso.'); window.location='ConUsuario.php'</script>";
        }
        if($_POST['Inserir'] == "UNIDADE")
        {
            $sql = oci_parse($conexao, 'INSERT INTO Unidade (cd_unidade, nm_unidade, nm_cidade, sg_estado, nm_endereco_completo, cd_cep, cd_telefone) VALUES (:registro, :unidade, :cidade, :estado, :endereco, :cep, :telefone)');
            $cregistro = $_POST['txtregistro'];
            $cunidade = $_POST['txtunidade'];
            $ccidade = $_POST['txtcidade'];
            $cestado = $_POST['txtestado'];
            $cendereco = $_POST['txtendereco'];
            $ccep = $_POST['txtcep'];
            $ctelefone = $_POST['txttelefone'];
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':unidade', $cunidade);
            oci_bind_by_name($sql, ':cidade', $ccidade);
            oci_bind_by_name($sql, ':estado', $cestado);
            oci_bind_by_name($sql, ':endereco', $cendereco);
            oci_bind_by_name($sql, ':cep', $ccep);
            oci_bind_by_name($sql, ':telefone', $ctelefone);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados cadastrado com sucesso.'); window.location='ConUnidade.php'</script>";
        }
         if($_POST['Inserir'] == "DEPARTAMENTO")
        {
            $sql = oci_parse($conexao, 'INSERT INTO Departamento (cd_departamento, nm_departamento) VALUES (:registro, :departamento)');
            $cregistro = $_POST['txtregistro'];
            $cunidade = $_POST['txtdepartamento'];
            oci_bind_by_name($sql, ':registro', $cregistro);
            oci_bind_by_name($sql, ':departamento', $cunidade);
            oci_execute($sql);
            oci_free_statement($sql);
            echo "<script>alert('Dados cadastrado com sucesso.'); window.location='ConDepartamento.php'</script>";
        }
    }
?>
