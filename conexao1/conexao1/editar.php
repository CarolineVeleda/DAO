<!DOCTYPE html>
<html>
<head>
	<title>Alterar</title>
</head>
<body>
	<form action="registrar.php">
	<input type="text" name="codigo" value="<?php echo $_POST['codigo'] ?>" style="display: none">
	<p>NOME:</p>
	<br>
	<input type="text" name="nome" value= "<?php echo $_POST['nome'] ?>">
	<br>
	<p>CPF:</p>
	<br>
	<input type="text" name="cpf" value= "<?php echo $_POST['cpf'] ?>">
	<br>
	<p>EMAIL:</p>
	<br>
	<input type="text" name="email" value= "<?php echo $_POST['email'] ?>" >
	<br>
	<input type="submit" name="SALVAR">
</form>
</body>
</html>