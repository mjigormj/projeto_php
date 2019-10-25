<?php

class QuestDAO{
	public $questao;

	private $con;

	function __construct(){
		$this->con = mysqli_connect("localhost:3306", "root", "", "projeto");
    }
    
    public function inserir(){
		$sql = "INSERT INTO usuario VALUES (0, '$this->questao')";
		$rs = $this->con->query($sql);
		if ($rs) 
			header("Location: questoes.php");
		else 
			echo $this->con->error;

	}
	public function apagar($id){
		$sql = "DELETE FROM questoesbd WHERE questoesbd=$id ";
		$rs = $this->con->query($sql);
		if ($rs) header ("Location: questoesbd.php");
		else echo $this->con->error;
	}

	public function buscar(){
		$sql = "SELECT * FROM questoesbd";
		$rs = $this->con-> query($sql);
		$listaDeQuestoes = array();
		while ($linha = $rs -> fetch_object()){

			$listaDeQuestoes[] = $linha;
		}
		
		return $listaDeQuestoes;
	}
public function editarquest($questao){
		$sql = "UPDATE questoesbd SET senha = md5($senha) WHERE questoesbd=$id";
		$rs = $this ->con -> query($sql);
		$listaDeUsuarios = array();
		if ($rs) header("Location: questoesbd.php");
		else echo $this->con->error;
		}
		
	

}






?>