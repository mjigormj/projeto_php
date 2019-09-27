<?php

class UsuarioDAO{
	public $nome;
	public $email;
	public $senha;

	private $con;

	function __construct(){
		$this->con = mysqli_connect("localhost", "root", "etecia", "usuario");
	}
		
	public function apagar(){
		$sql = "DELETE FROM usuarios WHERE id_do_usuario = $id";
		$rs = $this->con->query($rs);
		if ($rs) header ("Location: usuarios.php");
		else echo $this->con->error;
	}
	public function inserir(){
		$sql = "INSERT INTO usuario VALUES (0, '$this->nome', '$this->email', 
			md5('$this->senha'))";
		$rs = $this->con->query($sql);
		if ($rs) 
			header("Location: usuarios.php");
		else 
			echo $this->con->error;

	}
	public function buscar(){
		$con = mysqli_connect("localhost", "root", "etecia", "usuario");
		$sql = "SELECT * FROM usuario";
		$rs = $con -> query($sql);
		$listaDeUsuarios = array();
		while ($linha = $rs -> fetch_object()){
			$listaDeUsuarios[] = $linha;
		}
		return $listaDeUsuarios;
	}

}






?>