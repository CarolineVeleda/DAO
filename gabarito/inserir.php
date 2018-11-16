<?php

include_once("meta.php");
include_once("metadao.php");


$m = new Meta($_POST['nome'],$_POST['descricao'],intval($_POST['prioridade']));

//$m=new Meta (linha['nome'],linha['descricao'],linha['prioridade']);
$d=new DateTime($_POST['dtPrevisao']);
$m->setDtPrevisao($d);
var_dump($d->date());
//$m->setId(linha['id']);

$u= new Usuario($_POST['user'],$_POST['cpf']);

$m->setUsuario($u);
var_dump($m->getUsuario()->getCpfUsuario());

//var_dump($m);
$mdao = new MetaDao();
$udao= new UsuarioDao();

//$mdao->inserir($m);
$udao->inserir($u);


//format




echo "meta \"".$m->getNome()."\" (".$m->getId().") inserida com sucesso!";
?>