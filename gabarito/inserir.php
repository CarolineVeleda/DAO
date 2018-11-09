<?php

include_once("meta.php");
include_once("metadao.php");


$m = new Meta($_POST['nome'],$_POST['descricao'],intval($_POST['prioridade']));

/*$m=new Meta (linha['nome'],linha['descricao'],linha['prioridade']);
$d=new DateTime(linha['dtPrevisao']);
$m->setData($d);
$m->setId(linha['id']);*/

$u= new Usuario($_POST['user'],$_POST['cpf']);

$m->setUsuario($u);

var_dump($m);
$mdao = new MetaDao();
$udao= new UsuarioDao();

$mdao->inserir($m);
$udao->inserir($u);


//format




echo "meta \"".$m->getNome()."\" (".$m->getId().") inserida com sucesso!";
?>