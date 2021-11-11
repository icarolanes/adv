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
    if($contar>0){
        return(true);
    }else{
        return(false);
    }
}

function chama_pessoa($cpf,$con){
   $query = "SELECT `pessoa_id` as id from tab_pessoas where pessoa_cpf = '{$cpf}'";
    $resultado = $con->prepare($query);
    $resultado->execute();

    $contar = $resultado->RowCount();
    if($contar>0){
        $res = $resultado->fetch();
        $id = $res['id'];
        return($id);
    }else{
        return(stop());
    }
}

function cad_usuario($cpf, $pessoa, $senha, $con)
{
    $senha_nova =  hash('sha512', $senha);
    $query = "INSERT INTO `tab_usuarios`
    (`usuario_pessoa`,
     `usuario_cpf`,
     `usuario_senha`)
     VALUES
     ('{$pessoa}','{$cpf}','{$senha_nova}')";
     $resultado = $con->prepare($query);
     $resultado->execute();

     $contar = $resultado->RowCount();
     if($contar>0){
         return(true);
     }else{
         return(false);
     }

}

function novo_usuario($cpf, $nome, $sobrenome, $email, $senha, $con)
{
    nova_pessoa($cpf, $nome, $sobrenome, $email, $con);
    $id_pessoa = chama_pessoa($cpf, $con);
   $ret_us = cad_usuario($cpf, $id_pessoa, $senha, $con);
    return($ret_us);
}



$cpf = $_POST['cpf'];
$nome =      $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email =     $_POST['email'];
$senha =     $_POST['senha'];

$no = novo_usuario($cpf, $nome, $sobrenome, $email, $senha, $con);

if($no == true){
$_SESSION['loginErro'] = ('<div class="alert alert-success" role="alert">
 <strong>  Usuario cadastrado com sucesso</strong><br>
</div>');
    header("location: logar");
}else{
$_SESSION['loginErro'] = ('<div class="alert alert-warning" role="alert">
 <strong>  Usuario não indentificado!</strong><br> Acesse com seu Usuario
</div>');
    header("location: novo_user");
}