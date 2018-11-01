<?php
//cod
include_once('cliente.php');
include_once('clienteDAO.php');
//include_once('registrar.php');
//include_once('editar.php');

$cdao1=new clienteDAO();

//var_dump($cdao1->listaCliente());


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<table> 
    <tr> 
        <th>Nome</th> 
        <th>CPF</th> 
        <th>Email</th>
        <th>Comandos</th> 
    </tr> 
    

    <?php foreach ($cdao1->listaCliente() as $cliente){?>

    <tr> 
        <td> <?php echo $cliente->getnome(); ?> </td> 
        <td> <?php echo $cliente->getcpf(); ?> </td> 
        <td> <?php echo $cliente->getemail(); ?> </td> 
        <td>
  			<form method="post" action="excluir.php">
  				<input type="text" name="excluir" value=<?php echo $cliente->getcod()?> style="display: none;">
  				<button>Excluir</button>
  			</form>
  			
              <form method="post" action="editar.php">
  					<input type="text" name="codigo" value=<?php echo $cliente->getcod()?> style="display: none;">
  					<button>Altera</button>
  					<input type="text" name="nome" value=<?php echo $cliente->getnome()?> style="display: none;">	
  					<input type="text" name="cpf" value=<?php echo $cliente->getcpf()?> style="display: none;">
  					<input type="text" name="email" value=<?php echo $cliente->getemail()?> style="display: none;">
  			</form>
		</td>
    </tr> 

        

    <?php } ?> 
</table>

<form method="post" action="cadastrar.php">
        <button>Salvar Dados</button>
</form>

    
</body>
</html>

