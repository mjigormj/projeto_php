<?php

session_start();
if (!isset($_SESSION["logado"]) || !$_SESSION["logado"]){ header("Location: /login");
	header("Location: /");
	exit();
}


?>