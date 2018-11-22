<?php

abstract class Dao{
	protected function criaConexao(){
		$scon="port=5432 host=localhost dbname=dbmeta user=postgres password=postgres";
		return pg_connect($scon);
    }
    public abstract function list();


}

?>