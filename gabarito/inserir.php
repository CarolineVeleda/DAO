<?php

include_once("meta.php");
include_once("metadao.php");


$m = new Meta($_POST['nome'],$_POST['descricao'],intval($_POST['prioridade']),$_POST['data']);
$u= new Usuario($_POST['user'],$_POST['cpf']);
//var_dump($m);
$mdao = new MetaDao();
$udao= new UsuarioDao();

$mdao->inserir($m);
$udao->inserir($u);

echo "meta \"".$m->getNome()."\" (".$m->getId().") inserida com sucesso!";
?>