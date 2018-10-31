
<?php
include_once('cliente.php');
include_once('clienteDAO.php');
include_once('cadastrar.php');

//$nome=$_POST['nome'];
//print_r($nome);


//include_once('listar.php');
 

$cliente = new Cliente($_POST['nome'],$_POST['cpf'],$_POST['email']);
var_dump($cliente);
$cdao=new clienteDAO();
//$cdao->insereCliente($cliente);


?>