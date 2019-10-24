<?php

class QuestDAO{
	public $questao;

	private $con;

	function __construct(){
		$this->con = mysqli_connect("localhost", "root", "", "projeto-bd");
    }
    
    public function inserir(){
		$sql = "INSERT INTO questoesbd VALUES (0, '$this->questao')";
		$rs = $this->con->query($sql);
		if ($rs) 
			header("Location: questoes.php");
		else 
			echo $this->con->error;

	}
	public function apagar($id){
		$sql = "DELETE FROM usuarios WHERE usuario-$id ";
		$rs = $this->con->query($sql);
		if ($rs) header ("Location: usuarios.php");
		else echo $this->con->error;
	}

	public function buscar(){
		$con = mysqli_connect("localhost", "root", "vertrigo", "projeto-bd");
		$sql = "SELECT * FROM questoesbd";
		$rs = $this->con-> query($sql);
		$listaDeQuestoes = array();
		while ($linha = $rs -> fetch_object()){

			$listaDeQuestoes[] = $linha;
		}
		
		return $listaDeQuestoes;
	}
public function editarquest($questao){
		$sql = "UPDATE projeto-bd SET senha = md5($senha) WHERE usuario-$id";
		$rs = $this ->con -> query($sql);
		$listaDeUsuarios = array();
		if ($rs) header("Location: usuarios.php");
		else echo $this->con->error;
		}
		
	

}






?>