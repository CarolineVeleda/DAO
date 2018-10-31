

<?php
//cod
//listar
//hidden
include_once('cliente.php');
include_once('clienteDAO.php');
include_once('registrar.php');

$cdao1=new clienteDAO();

$cdao1->listaCliente();


?>
