<?php

include_once('cliente.php');
include_once('clienteDAO.php');
include_once('listar.php');
 

$cliente = new Cliente($_POST['nome'],$_POST['cpf'],$_POST['email']);

$cdao=new clienteDAO($cliente);


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>



    <form method="POST" action="cliente.php">
        
        nome: <input type="text" name="nome"><br>
        CPF: <input type="text" name="cpf"> <br>
        email:<input type="text" name="email"><br>
        <button class="btn">Enviar</button>
        Enviar <input type="submit" value="submit">
    </form>


  
 <table>
        <tr>
            <th>oi</th>
            <th></th>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>

    

</body>
</html>







































