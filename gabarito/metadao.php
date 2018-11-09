<?php

class MetaDao{

	private function criaConexao(){
		$scon="port=5432 host=localhost dbname=dbmeta user=postgres password=postgres";
		return pg_connect($scon);
	}

	public function listar($limit, $offset){
		$conn = $this->criaConexao();
		$sql = "SELECT * FROM meta LIMIT $1 OFFSET $2";
		$res = pg_query_params($conn, $sql, array($limit, $offset));
		
		$listMetas = array();
		while($linha = pg_fetch_assoc($res)){
			$m = new Meta($linha['nome'],$linha['descricao'],intval($linha['prioridade']));
			$m->setId(intval($linha['id']));
			
			array_push($listMetas,$m);
		}
		pg_close($conn);
		return $listMetas;
	}

	public function buscar($cod){
		$conn = $this->criaConexao();
		$sql = "SELECT * FROM meta WHERE id = $1";
		$res = pg_query_params($conn, $sql, array($cod));
		$linha = pg_fetch_assoc($res);
        $m = new Meta($linha['nome'],$linha['descricao'],intval($linha['prioridade']));
        $m->setId(intval($linha['id']));
		
		pg_close($conn);
		return $m;
	} 

	public function inserir($meta){
		$conn = $this->criaConexao();
		$sql2 ="INSERT INTO meta (nome, descricao, prioridade) 
        VALUES ($1,$2,$3) RETURNING id"; 
		$vetor = array($meta->getNome(), $meta->getDescricao(), $meta->getPrioridade(),$meta->getData());
		
		$res = pg_query_params($conn, $sql2, $vetor);
        $linha = pg_fetch_assoc($res);
        $meta->setId(intval($linha['id']));
		pg_close($conn);
	}

	public function deletar($id){
		$conn = $this->criaConexao();
		$sql = "DELETE FROM meta WHERE id = $1";
		$res = pg_query_params($conn, $sql, array($id));
		pg_close($conn);
	}
	public function alterar($meta){
		$conn = $this->criaConexao();
		$sql="UPDATE meta SET nome = $1, descricao = $2, 
		  prioridade = $3 WHERE id = $4  ";
		$vet = array($meta->getNome(), 
					 $meta->getDescricao(), 
					 $meta->getPrioridade(), 
					 $meta->getId());
		$res = pg_query_params($conn, $sql, 
		$vet);
		
	}
}



class UsuarioDao{
	private function criaConexao(){
		$scon="port=5432 host=localhost dbname=bdmeta user=postgres password=postgres";
		return pg_connect($scon);
	}

	public function inserir($usuario){
		$conn = $this->criaConexao();
		$sql2 ="INSERT INTO usuario (nome, cpf) 
        VALUES ($1,$2) RETURNING cpf"; 
		$vetor = array($usuario->getNome(), $usuario->getCpf());
		
		$res = pg_query_params($conn, $sql2, $vetor);
        $linha = pg_fetch_assoc($res);
		pg_close($conn);
	}

	
	
}


?>