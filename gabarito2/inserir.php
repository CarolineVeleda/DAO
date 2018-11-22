<?php

include_once("meta.php");
include_once("metadao.php");


$m = new Meta($_POST['nome'],$_POST['descricao'],intval($_POST['prioridade']));

//$m=new Meta (linha['nome'],linha['descricao'],linha['prioridade']);
//var_dump($d->date);
//$m->setId(linha['id']);

$d=new DateTime($_POST['dtPrevisao']);
$m->setDtPrevisao($d);


$u= new Usuario($_POST['user'],$_POST['cpf']);

$m->setUsuario($u);


//var_dump($m);
$mdao = new MetaDao();
$udao= new UsuarioDao();


$udao->inserir($u);
$mdao->inserir($m);



$cod = $m->getId();
$mbuscada = $mdao->buscar($cod);
print_r($mbuscada);

echo "meta \"".$m->getNome()."\" (".$m->getId().") inserida com sucesso!";
?>