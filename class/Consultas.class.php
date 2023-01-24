<?php

/*
* Essa classe possui todas as consultas feitas no banco de dados
*/

class Consultas{

	protected $db;

	function __construct($conexao){
		$this->db = $conexao;
	}

	function getResult($table, $where=''){
		$select = $this->db->prepare("SELECT * FROM $table $where");
		$select->execute();
		$row = $select->fetch();
		return $row;
	}

	function getResults($table, $where=''){
		$select = $this->db->prepare("SELECT * FROM $table $where");
		$select->execute();
		$row = $select->fetchAll();
		return $row;
	}

	

}

?>