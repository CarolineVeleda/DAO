
<?php
include_once('cliente.php');
include_once('clienteDAO.php');
//include_once('cadastrar.php');
//include_once('listar.php');

//$nome=$_POST['nome'];
//print_r($nome);


//include_once('listar.php');
 

$cliente = new Cliente($_POST['nome'],$_POST['cpf'],$_POST['email']);
//var_dump($cliente);
$cdao=new clienteDAO();
$cdao->insereCliente($cliente);

/*
if(isset($_GET['codigo'])){
    $cliente->setcod($_GET['codigo']);
}
$cdao = new clienteDAO();
if($cliente->getcod() == null){
    $cdao->insereCliente($cliente);
}
else{
    $cdao->editar($cliente);
}*/

header('Location: listar.php');
?>