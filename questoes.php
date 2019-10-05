<?php
include "QuestDAO.php";

$questDAO = new QuestDAO();
$lista = $questDAO->buscar();

?>
<!Doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="width=device=width, initial-scale=1.0">
  <title> </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="
  sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/all.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="usuarios.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
         <h5><a class="nav-link" href="questoes.php">Questões</a></h5>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="QuestController.php">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-2">

        <ul class="nav flex-column naw-pills vertical">
          <li class="nav-item">
            <a class="nav-link active" href="usuarios.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
      </div>
      <div class="col-10">
        <h3>Questões</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Nova questão
        </button>
        </button>
        <table class="table">
          <tr>
            <th>Número da questão</th>
            <th>Questão</th>
            <th>Ações</th>
          </tr>
          <?php foreach ($lista as $questoesbd) : ?>
            <tr>
              <td><?= $questoesbd->id_quest?></td>
              <td><?= $questoesbd->questao ?></td>
              <td>
                <a class="btn btn-danger" href="QuestController.php?acao=apagar&id=<?= $questoesbd->id_quest ?>">
                    Exluir
                </a>
                <button type="button" class="btn btn-primary alterar-senha" data-toggle="modal" data-target="
              #modalSenha" data-id="<?= $questoesbd->id_quest ?>">
              Editar
                </button>

              </td>
            </tr>
          <?php endforeach ?>
        </table>
      </div>
    </div>
  </div>


  <!-- Modal-inserir-quest -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastro de questões</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="QuestController.php?acao=inserir" method="POST">
            <div class="form-group">
              <label for="nome">Nova questão</label>
              <input type="text" name="questao" class="form-control" id="questao" placeholder="Escreva">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Trocar Senha -->
  <div class="modal fade" id="modalSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alterar Senha</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="class">
            <span aria-hidden="true"> &times;</span>
          </button>
          <div class="modal-body">
            <form action="QuestController.php?acao=trocarsenha" method="POST">
              <div class="input-group ab-3">
              </div>

              <input type="hidden" name="campo-id" id="campo-id">
              <div class="input-group ab-3">

                <label for="exampleInputPassword1">Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="senha" aria-label="nome" aria-describe="basic-addans">
              </div>
          </div class="modal-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">
  var botao = document.querySelector(".alterar-senha");
  botao.addEventListener("click", function() {
    var campo = document.querySelector("#campo-id");
    campo.value = botao.getAttibute("data-id");

  });
</script>

</html>