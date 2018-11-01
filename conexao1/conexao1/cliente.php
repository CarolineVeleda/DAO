
<?php

class Cliente {

    public $nome;
    public $cpf;
    public $email;
    public $cod;
    public function cliente($nome,$cpf,$email){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        
    }
    public function getnome(){
        return $this-> nome;
    }
    public function getcpf(){
        return $this-> cpf;
    }
    public function getemail(){
        return $this-> email;
    }
    public function getcod(){
        return $this-> cod;
    }
    public function setnome($nome){
        return $this->nome = $nome;
    }
    public function setcpf($cpf){
        return $this->cpf = $cpf;
    }
    
    public function setemail($email){
        return $this->email = $email;
    }
    public function setcod($cod){
        return $this->cod = $cod;
    }


}


//$cliente1 = new Cliente("joao","3332244","joao@gmail.com");

//echo $cliente1->getnome();

//if($cod!==null0) $dao->deleta($cod)

?>