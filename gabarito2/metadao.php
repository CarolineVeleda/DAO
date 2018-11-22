<?php
include_once("dao.php");

class MetaDao extends Dao{


	public function listar(int $limit, int $offset){
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

	public function buscar(int $cod){
		$conn = $this->criaConexao();
		$sql = "SELECT id, m.nome as nome_met, decricao,prioridade, cpf, 	u.nome AS nome_usu, dtPrevisao
			FROM meta m INNER JOIN usuario u
			ON m.cpfUser = u.cpf
			WHERE m.id=$1";
		
		
		$res = pg_query_params($conn, $sql, array($cod));
		$linha = pg_fetch_assoc($res);
        $m = new Meta($linha['nome'],$linha['descricao'],intval($linha['prioridade']));
		$m->setId(intval($linha['id']));
		$time = new DateTime($linha['dtPrevisao']);
		$m->setDtPrevisao($time);
		$u=new Usuario($linha['nome'],$linha['cpf']);
		$m->setUsuario($u);
		
		pg_close($conn);
		return $m;
	} 
	public function list(){
		echo "em implementação!";
	}
	public function inserir($meta){
		$conn = $this->criaConexao();
		$sql2 ="INSERT INTO meta (nome, descricao, prioridade,dtPrevisao,cpfuser) 
        VALUES ($1,$2,$3,to_date($4,'YYYY-MM-DD'),$5) RETURNING id"; 
		$vetor = array(
			$meta->getNome(), 
			$meta->getDescricao(), 
			$meta->getPrioridade(),
			$meta->getDtPrevisao()->format('Y-m-d'),
			$meta->getUsuario()->getCpfUsuario()
		);
		
		$res = pg_query_params($conn, $sql2, $vetor);
        $linha = pg_fetch_assoc($res);
        //$meta->setId(intval($linha['id']));
		pg_close($conn);
	}

	public function deletar(int $id){
		$conn = $this->criaConexao();
		$sql = "DELETE FROM meta WHERE id = $1";
		$res = pg_query_params($conn, $sql, array($id));
		pg_close($conn);
	}
	public function alterar(Meta $meta){
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


//pegar do datetime o date
class UsuarioDao{
	private function criaConexao(){
		$scon="port=5432 host=localhost dbname=dbmeta user=postgres password=postgres";
		return pg_connect($scon);
	}

	public function inserir(Usuario $usuario){
		$conn = $this->criaConexao();
		$sql2 ="INSERT INTO usuario (nome, cpf) 
        VALUES ($1,$2) RETURNING cpf"; 
		$vetor = array($usuario->getNome(), $usuario->getCpfUsuario());
		
		$res = pg_query_params($conn, $sql2, $vetor);
        $linha = pg_fetch_assoc($res);
		pg_close($conn);
	}

	
	
}

$m = new MetaDao();


?>