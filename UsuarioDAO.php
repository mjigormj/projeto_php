<?php

class UsuarioDAO{
	public $nome;
	public $email;
	public $senha;

	private $con;

	function __construct(){
		$this->con = mysqli_connect("localhost:3306", "root", "etecia", "projeto");
	
	}	
	public function apagar($id){
		$sql = "DELETE FROM usuario WHERE id_do_usuario=$id";
		$rs = $this->con->query($sql);
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
		$sql = "SELECT * FROM usuario";
		$rs = $this->con->query($sql);
		$listaDeUsuarios = array();
		while ($linha = $rs -> fetch_object()){
			$listaDeUsuarios[] = $linha;
		}
		
		return $listaDeUsuarios;
	}
public function trocarsenha($id,$senha){
		$sql = "UPDATE usuario SET senha = md5('$senha') WHERE id_do_usuario=$id";
		$rs = $this ->con -> query($sql);
		$listaDeUsuarios = array();
		if ($rs) header("Location: usuarios.php");
		else echo $this->con->error;
		}
		
	

}






?>