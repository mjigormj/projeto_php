<?php

include "QuestDAO.php";
$acao = $_GET["acao"];

switch ($acao) {
	case 'inserir':
		$questoesbd = new QuestDAO();
		$questoesbd->questao = $_POST["questao"];
		$questoesbd->inserir();
        break;
        
	case 'apagar':
		$questoes = new QuestDAO();
		$id = $_GET["id"];
		$usuario->apagar($id);
		break;

    case 'editar':
		$questoes = new QuestDAO();
		$id = $_GET["id_quest"];
		$questao = $_POST["questao"];
		$usuario->editarquest($id, $nquest);
		break;

	default:
		# code...
		break;
}
