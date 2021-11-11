<?php
session_start();
$usuariot = filter_var($_POST['usuario']);
$senhat = filter_var($_POST['senha']);
include('../banco/conexao.php');
$query = "SELECT
 nome, usuario from 
 sys.sql_logins sys 
 join tab_usuarios u on u.usu_id = sys.name  
 where sys.name = 'c{$usuariot}' and PWDCOMPARE('{$senhat}', sys.password_hash) = 1";
$prep = $con->prepare($query);
$prep->execute();
$Dusuario=$prep->fetch();
//$resultado = mysql_fetch_assoc($result);
//echo"Usuario: " .$resultado['nome'];
if (empty($Dusuario)) {
    //erro
    $randon = rand(1, 2);
    switch ($randon) {
        case '1':
        $cor = "alert-danger";
        $message = "Usuário incorreto!";
        break;
        case '2':
        $cor = "alert-danger";
        $message = "Usuário incorreto!";
        break;
    }
    $_SESSION['loginErro'] = ("<div class='alert {$cor} alert-dismissible fade show' role='alert'>
		<strong>".$message."</strong>
		</div>");
    //retorna ao login
    header("Location: index.php");
} else {
    //definir atributos de usuario
    $_SESSION['usuarioNome']		= $Dusuario['nome'];
    $_SESSION['usuarioLogin'] 		= $Dusuario['usuario'];
    echo	$_SESSION['loginErro'] = ("<div class='alert alert-success alert-dismissible fade show' role='alert'>
		Login de <strong>".$_SESSION['usuarioNome']."</strong> realizado com sucesso!
		</div>");
    header("Location: ../");
}