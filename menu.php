<div class="container-fluid">
    <div class="row">
      <div class="col-2">

        <ul class="nav flex-column naw-pills vertical">
          <li class="nav-item">
            <a class="nav-link <?= ($recurso == '/usuario')? 'active':''?>; " href="usuarios.php">Usuario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($recurso == '/questoes')? 'active':''?>; " href="questoes.php">Questoes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($recurso == '/alternativas')? 'active':''?>; " href="alternativas">Alternativas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($recurso == '/ranking')? 'active':''?>; " href="ranking">Ranking</a>
          </li>
        </ul>
      </div>