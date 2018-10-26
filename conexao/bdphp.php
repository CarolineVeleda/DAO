



<?
echo "<h1> olá mundo</h1>";
	echo "<input>";
	$conn = pg_connect("port=5432 dbname=loja user=postgres password=postgres"); //lugar que eu quero salvar/mexer (banco de dados)
	$sql="select * from departamento";
	print_r($conn);
	echo "----<br>";
	$res=pg_query($conn,$sql);
	print_r ($res);
	
	echo "----<br>";
	while($departamento = pg_fetch_assoc($res)){ //percorre as linhas
		echo($cliente);
		echo "<br>. . .";
		print_r ($departamento);
		echo "<br>---<br>";
		
		echo "<option>".$departamento["nome"]."</option>";
	}

/*
echo "<h1>olá mundo</h1>";

	$scon = pg_connect("port=5432 dbname=loja user=postgres password=postgres"); 
	$conn=pg_connect($scon);

	print_r($conn);

	$sql="select * from departamento";
	

	echo "----<br>";
	
	/*($res=pg_query($conn,$sql);
	print_r ($res);

	//echo "----<br>";
	
*/


?>
