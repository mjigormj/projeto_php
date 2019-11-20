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
		$questoes->apagar($id);
		break;

    case 'editar':
		$questoesbd = new QuestDAO();
		$id = $_POST["id"];
		$questao = $_POST["questao"];
		$questoesbd->editarquest($id,$questao);
		break;


	default:
		# code...
		break;
}
