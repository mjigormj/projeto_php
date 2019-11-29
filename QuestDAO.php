<?php

	require "config.php";

	class QuestDAO{

		public $questao;
		public $id;
		public $tipo;
		
		private $con;

	function __construct(){
		$this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }
    
    public function inserir(){
		$sql = "INSERT INTO questoesbd VALUES (0, '$this->questao')";
		$rs = $this->con->query($sql);
		if ($rs) 
			header("Location:/questoes");
		else 
			echo $this->con->error;

	}
	public function apagar($id){
		$sql = "DELETE FROM questoesbd WHERE id_questao=$id ";
		$rs = $this->con->query($sql);
		if ($rs) header ("Location:/questoes");
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

	public function editarquest($id,$questao){
		$sql = "UPDATE questoesbd SET questao='$questao' WHERE id_questao=$id";
		$rs = $this ->con -> query($sql);
		$listaDeUsuarios = array();
		if ($rs) header("Location:/questoes");
		else echo $this->con->error;
		}

	public function buscarPorId(){
		$sql = "SELECT * FROM questoes WHERE id_questao=$this->id";
		$rs = $this->con->query($sql);
		if ($linha = $rs->fetch_object()){
			$this->enunciado = $linha->enunciado;
			$this->tipo = $linha->tipo;
		}
	
	}
}

?>