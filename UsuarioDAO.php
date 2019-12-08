<?php

require "config.php";

class UsuarioDAO{
	public $id;
	public $nome;
	public $email;
	public $senha;

	private $con;

	function __construct(){
		$this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	}

	public function apagar($id){
		$sql = "DELETE FROM usuarios WHERE idUsuario=$id";
		$rs = $this->con->query($sql);
		session_start();
		if ($rs){
			$_SESSION["susses"] = "usuário apagado com sucesso";
		}
		else{
			$_SESSION["danger"] = "erro ao apagar o usuário";
		}
		header("Location: /usuarios");
	}

	public function inserir(){
		$sql = "INSERT INTO usuarios VALUES (0, '$this->nome', '$this->email', md5('$this->senha'))";
		$rs = $this->con->query($sql);
		if ($rs)
			header("Location: /usuarios");
		else
			echo $this->con->error;
	}
	public function buscar(){
		$sql = "SELECT * FROM usuarios";
		$rs = $this->con->query($sql);
		$listaDeUsuarios = array();
		while ($linha = $rs->fetch_object()) {
			$listaDeUsuarios[] = $linha;
		}

		return $listaDeUsuarios;
	}
	
	public function trocarsenha($id, $senha){
		$sql = "UPDATE usuarios SET senha = md5('$senha') WHERE idUsuario=$id";
		$rs = $this->con->query($sql);
		if ($rs) header("Location: /usuarios");
		else echo $this->con->error;
	}

	public function editarusuario($id, $nome, $email)
	{
		$sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE idUsuario='$id'";
		$rs = $this->con->query($sql);
		session_start(); 
		echo $sql;
		if ($rs) header("Location:/usuario");
		else echo $this->con->error;
	}



	public function login()
	{
		$sql = "SELECT * FROM usuarios WHERE email='$this->email' AND senha = md5('$this->senha') ";
		$rs = $this->con->query($sql);

		if ($rs->num_rows > 0) {
			session_start();
			$_SESSION["logado"] = true;
			header("Location: /usuarios");
		}else {
			header("Location: /?erro=1");
		}
	}

	public function sair(){
		session_start();
		session_destroy();
		header("Location:/");
	}

	
}
