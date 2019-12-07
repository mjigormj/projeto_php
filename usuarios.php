<?php

require("verificarLogin.php");

include "UsuarioDAO.php";

$usuarioDAO = new UsuarioDAO();
$lista = $usuarioDAO->buscar();

include "cabecalho.php";
include "menu.php";
include "alertas.php";

?>

<body background="https://www.publicidadenaweb.com/wp-content/uploads/2016/12/Pacman-Wallpaper.jpg">
  <div class="col-10">
    <?php mostrarAlerta("susses");
      mostrarAlerta("danger"); ?>
    <h3>Usuários</h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      <i class="fas fa-plus"></i> Novo Usuário
    </button>
    <table class="table table-dark">
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
      </tr>
      <?php foreach ($lista as $usuario) : ?>
        <tr>
          <td><?= $usuario->id_do_usuario ?></td>
          <td><?= $usuario->nome ?></td>
          <td><?= $usuario->email ?></td>
          <td>
            <a class="btn btn-danger" href="UsuariosController.php?acao=apagar&id=<?= $usuario->id_do_usuario ?>">
              <i class="fas fa-user-times"></i>
            </a>

            <button type="button" class="btn btn-warning editar" data-toggle="modal" data-target="
                #Editar" data-id="<?= $usuario->id_do_usuario ?>"> <i class="fas fa-user-edit"></i>
            </button>

            <button type="button" class="btn btn-primary alterar-senha" data-toggle="modal" data-target="
              #modalSenha" data-id="<?= $usuario->id_do_usuario ?>"> <i class="fas fa-user-lock"></i>
            </button>

          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
  </div>
  </div>


  <!-- Modal-inserir -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastro do usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="UsuariosController.php?acao=inserir" method="POST">
            <div class="form-group">
              <label for="nome">Nome de usuário</label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Endereço do email</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite seu email">
              <small id="email" class="form-text text-muted">Nós nunca compartilharemos seu email com ninguém.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Senha</label>
              <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
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

  <!-- Modal-Editar -->

  <div class="modal fade" id="Editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar informações do usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="UsuariosController.php?acao=editarusuario" method="POST">
            <input type="hidden" name="id" id="campo-id">
            <div class="form-group">
              <label for="nome">Nome de usuário</label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo">

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Endereço do email</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite seu email">
              <small id="email" class="form-text text-muted">Nós nunca compartilharemos seu email com ninguém.</small>
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
            <form action="UsuariosController.php?acao=trocarsenha" method="POST">
              <input type="hidden" name="id" id="idTrocarSenha">
              <div class="input-group ab-3">
              </div>


              <div class="input-group ab-3">

                <label for="exampleInputPassword1">Senha</label>
                <input type="password" id="novaSenha" name="senha" class="form-control" placeholder="Nova senha">
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

<!--<script type="text/javascript">
  var botao = document.querySelector(".alterar-senha");
  botao.addEventListener("click", function() {
    var campo = document.querySelector("#campo-id");
    campo.value = botao.getAttribute("data-id");
  });
  var botao = document.querySelector(".editar");
  botao.addEventListener("click", function() {
    var campo = document.querySelector("#campo-id");
    campo.value = botao.getAttribute("data-id");

  });
</script> -->

<script type="text/javascript">
	$('.alterar-senha').on('click', function (e) {
	  	var id = e.currentTarget.getAttribute("idTrocarSenha");
	  	document.querySelector("#novaSenha").value = id;
	});
	$('.btn-editar').on('click', function (e) {
	  	var id = e.currentTarget.getAttribute("data-id");
	  	var nome = e.currentTarget.getAttribute("data-nome");
	  	var email = e.currentTarget.getAttribute("data-email");
	  	document.querySelector("#campo-id-editar").value = id;
	  	document.querySelector("#novonome").value = nome;
	  	document.querySelector("#novoemail").value = email;
	});
</script>

</html>