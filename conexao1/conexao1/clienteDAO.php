<?php
class clienteDAO{
    
    public function criaConexao(){
    $scon="port=5432 dbname=lojaviews user=postgres password=postgres";
    return pg_connect($scon);
    }
    public function insereCliente ($cliente){ 
        $conn = $this->criaConexao();
        $sql2="INSERT INTO cliente(nome,cpf,email) VALUES ($1,$2,$3)";
        $vetor=array($cliente->getnome(),$cliente->getcpf(),$cliente->getemail());
        pg_query_params($conn,$sql2,$vetor);
        pg_close($conn);
    }
    public function deletaCliente($cliente){
        $conn = $this->criaConexao();
        $sql='DELETE FROM cliente WHERE cpf=$1';
        $res = pg_query_params($conn,$sql,array($cliente->getcpf()));
        pg_close($conn);
    }
    function listaCliente(){
        $conn = $this->criaConexao();
        $sql = 'select * from cliente';
        $res=pg_query($conn,$sql);
        //$listCli = array();
        $a=array();
        while ($cliente = pg_fetch_assoc($res)){
            //array_push($listCli,$cliente['nome']);
           $listCli = new Cliente($cliente['nome'],$cliente['cpf'],$cliente['email']);
           $listCli->setCod(intval($cliente['codcliente']));
           array_push($a,$listCli);
        }
        //return $listCli;
        return $a;
        pg_close($conn);
      
    }
    /*public function lista($limit, $offset){
        $conn = $this->criaConexao();
        $sql = 'SELECT * FROM cliente LIMIT $1 OFFSET $2';
        $res = pg_query_params($conn, $sql, array($limit, $offset));
        $listCli = array();
        while ($linha = pg_fetch_assoc($res)){
            $cli = new Cliente($linha['nome'], $linha['cpf'], $linha['email']);
            $cli->setCod(intval($linha['codcliente']));
            array_push($listCli, $cli);
        }
        pg_close($conn);
        return $listCli;
    }*/

    public function buscaCliente($codcliente){
        $conn = $this->criaConexao();
        $sql = 'select * FROM cliente where codcliente=$1';
        $v=array($codcliente);
        $res = pg_query_params($conn,$sql,$v);
        $Cli = array();
        while ($cliente = pg_fetch_assoc($res)){
            array_push($Cli,$cliente);
        }
        return $Cli;
        pg_close($conn);
    }
        
    function buscaXclientes($l,$o){
        $conn = $this->criaConexao();
        $sql = 'select * from cliente offset $1 limit $2';
        $v=array($l,$o);
        $res = pg_query_params($conn,$sql,$v);
        $Cli = array();
        while ($cliente = pg_fetch_assoc($res)){
            array_push($Cli,$cliente);
        }
        return $Cli;
        pg_close($conn);
    }

    function editar($cliente){
		$conn = conexao();
		$sql = "update cliente set nome = $2, cpf = $3,email=$4 where codcliente = $1";
		$vetor = array($cliente->getcod(),$cliente->getnome(),$cliente->getcpf(),$cliente->getemail());
		$res = pg_query_params($conn,$sql,$vetor);
		pg_close($conn);

}

}


?>