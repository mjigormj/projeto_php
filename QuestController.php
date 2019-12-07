<?php 
include "QuestDAO.php";
$acao = $_GET["acao"];
switch ($acao) {
	
	case 'inserir':
		$questao = new QuestDAO();
		$questao->enunciado = $_POST["enunciado"];
		$questao->tipo = $_POST["tipo"];
		$questao->inserir();
		break;
		
	case 'apagar':
		$questao = new QuestDAO();
		$id = $_GET["id"];
		$questao->apagar($id);
		break;

	case 'editar':
		$questao = new QuestDAO();
		$questao->id = $_POST["id"];
		$questao->enunciado = $_POST["enunciado"];
		$questao->tipo = $_POST["tipo"];
		$questao->editarquest();
		break;

	default:
		echo "acao não reconhecida";
		break;
}
?>