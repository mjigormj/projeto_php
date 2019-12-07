<?php $recurso = $_SERVER["PATH_INFO"]?>
<div class="container-fluid ">
    <div class="row">
      <div class="col-2">
      
        <ul class="nav bg-dark flex-column naw-pills vertical">
          <li class="nav-item">
            <a class="nav-link <?= ($recurso == '/usuarios')? 'active':''?>; " href="/usuarios">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($recurso == '/questoes')? 'active':''?>; " href="/questoes">Questoes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($recurso == '/ranking')? 'active':''?>; " href="/construcao">Ranking</a>
          </li>
        </ul>
      </div>