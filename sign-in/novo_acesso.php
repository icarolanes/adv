<?php
session_start();
require_once('../banco/conexao.php');
function nova_pessoa($cpf, $nome, $sobrenome, $email, $con)
{
    $query = "INSERT INTO `tab_pessoas`
    (`pessoa_nome`,
    `pessoa_sobrenome`,
    `pessoa_email`,
    `pessoa_cpf`)
    VALUES
    ('{$nome}',
    '{$sobrenome}',
    '{$email}',
    '{$cpf}')";

    $resultado = $con->prepare($query);
    $resultado->execute();

    $contar = $resultado->RowCount();
    if ($contar>0) {
        return(true);
    } else {
        return(false);
    }
}

function chama_pessoa($cpf, $con)
{
    $query = "SELECT `pessoa_id` as id from tab_pessoas where pessoa_cpf = '{$cpf}'";
    $resultado = $con->prepare($query);
    $resultado->execute();

    $contar = $resultado->RowCount();
    if ($contar>0) {
        $res = $resultado->fetch();
        $id = $res['id'];
        return($id);
    } else {
        return(false);
    }
}

function cad_usuario($cpf, $pessoa, $senha, $con)
{
    $senha_nova =  password_hash($senha, PASSWORD_ARGON2I);
    $query = "INSERT INTO `tab_usuarios`
    (`usuario_pessoa`,
     `usuario_cpf`,
     `usuario_senha`)
     VALUES
     ('{$pessoa}','{$cpf}','{$senha_nova}')";
    $resultado = $con->prepare($query);
    $resultado->execute();

    $contar = $resultado->RowCount();
    if ($contar>0) {
        return(true);
    } else {
        return(false);
    }
}

function chama_usuario($cpf, $con)
{
    $query = "SELECT * FROM tab_usuarios where usuario_cpf = '{$cpf}'";

    $resultado = $con->prepare($query);
    $resultado->execute();

    $contar = $resultado->RowCount();
    if ($contar>0) {
        return(true);
    } elseif ($contar==0) {
        return(false);
    }
}

function novo_usuario($cpf, $nome, $sobrenome, $email, $senha, $con)
{
    $verifica = chama_usuario($cpf, $con);

    if ($verifica == true) {
        $_SESSION['loginErro'] = ('<div class="alert alert-success" role="alert">
        <strong>Usuario Já cadastrado</strong><br>
       </div>');
        header("location: logar");
    } elseif ($verifica == false) {
        $id_pessoa = chama_pessoa($cpf, $con);
        if ($id_pessoa > 0) {
            $ret_us = cad_usuario($cpf, $id_pessoa, $senha, $con);
            return($ret_us);
        } elseif ($id_pessoa == false) {
            nova_pessoa($cpf, $nome, $sobrenome, $email, $con);
            $id_pessoa = chama_pessoa($cpf, $con);
            $ret_us = cad_usuario($cpf, $id_pessoa, $senha, $con);
            return($ret_us);
        }
    }
}

$cpf = $_POST['cpf'];
$nome =      $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email =     $_POST['email'];
$senha =     $_POST['senha'];

$no = novo_usuario($cpf, $nome, $sobrenome, $email, $senha, $con);

if ($no == true) {
    $_SESSION['loginErro'] = ('<div class="alert alert-success" role="alert">
 <strong>  Usuario cadastrado com sucesso</strong><br>
</div>');
    header("location: logar");
} elseif($no == false) {
    $_SESSION['loginErro'] = ("<div class='alert alert-warning' role='alert'>
 <strong>  Usuario não indentificado!</strong><br> Acesse com seu Usuario
</div>");
    header("location: novo_user");
}
