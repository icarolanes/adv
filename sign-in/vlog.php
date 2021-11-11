<?php
session_start();
$usuariot = filter_var($_POST['usuario']);
$senha = filter_var($_POST['senha']);


include('../banco/conexao.php');
$query = "SELECT
 p.pessoa_nome as nome, p.pessoa_cpf as cpf, u.usuario_senha, u.usuario_nivel as nivel from  tab_usuarios u join tab_pessoas p on p.pessoa_cpf = u.usuario_cpf 
 where u.usuario_cpf = '{$usuariot}'";
$prep = $con->prepare($query);
$prep->execute();


$Dusuario=$prep->fetch();

if (empty($Dusuario)) {
    //erro
    
    $_SESSION['loginErro'] = ("<div class='alert alert-danger alert-dismissible fade show' role='alert'>
		Usuario Inexistente clique <strong> <a href='novo_user'>Aqui</a> </strong> Para solicitar acesso
		</div>");
    header("Location: .");
} else {
    if (password_verify($senha, $Dusuario['usuario_senha'])) {
              //definir atributos de usuario
              $_SESSION['usuarioNome']		= $Dusuario['nome'];
              $_SESSION['usuarioLogin'] 		= $Dusuario['cpf'];
              $_SESSION['usuarioNivel']     = $Dusuario['nivel'];
              echo	$_SESSION['loginErro'] = ("<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Login de <strong>".$_SESSION['usuarioNome'].$_SESSION['usuarioLogin'].$_SESSION['usuarioNivel']."</strong> realizado com sucesso!
            </div>");
              header("Location: ../");


    } else {
      $_SESSION['loginErro'] = ("<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Senha Inválida</strong>
      </div>");
      header("Location: .");

    }
}
