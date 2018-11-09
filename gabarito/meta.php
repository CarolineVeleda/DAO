<?php

class Meta{
    private $id;
    private $nome;
    private $descricao;
    private $prioridade;
    private $dtPrevisao;
    private $usuario;

    public function __construct(string $nome, string $descricao, int $prioridade){
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->prioridade = $prioridade;
    }
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getPrioridade(){
        return $this->prioridade;
    }
    public function getDtPrevisao(){
        return $this->data;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function setDescricao(string $descricao){
        $this->descricao = $descricao;
    }
    public function setPrioridade(int $prioridade){
        if($prioridade>=1 && $prioridade<=5)
            $this->prioridade = $prioridade;
    }
    public function setNome(string $nome){
        $this->nome = $nome;
    }
    public function setUsuario(Usuario $usuario){
        $this->usuario = $usuario;
    }
    public function setId(int $id){
        $this->id = $id;
    }
    public function setData($data){
        $this->data = $data;
    }
}


class Usuario{


    private $nome;
    private $cpf;

    public function __construct(string $nome, string $cpf){
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCpfUsuario(){
        return $this->cpf;
    }

    public function setNome(string $nome){
        $this->nome = $nome;
    }

    public function setCpf(string $cpf){
        $this->cpf = $cpf;
    }

}



/*create table meta(
    id serial,
    nome varchar(100) NOT NULL,
    descricao varchar(1000) NOT NULL,
    prioridade int NOT NULL,
    dtPrevisao date,
    cpfUser varchar(14),
    CONSTRAINT metapk PRIMARY KEY (id),
    CONSTRAINT prioridadeCheck CHECK (prioridade between 1 and 5),
    CONSTRAINT metaUserFK FOREIGN KEY (cpfUser) REFERENCES usuario(cpf)
	ON DELETE SET NULL
	ON UPDATE CASCADE);



create table usuario(

	cpf varchar(14),
	nome varchar(100) NOT NULL,
	CONSTRAINT userPK PRIMARY KEY (cpf)

); */

?>