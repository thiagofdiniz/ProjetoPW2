<?php $recurso = $_SERVER["PATH_INFO"]?>

<div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <ul class="nav flex-column nav-pills vertical">
                    <li class="nav-item">
                        <a class="nav-link <?= ($recurso=='/usuarios')?'active':''?>" href="#">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($recurso=='/questoes')?'active':''?>" href="questoes">Perguntas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link <?= ($recurso=='/alternativas')?'active':''?>" href="#">Alternativas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link <?= ($recurso=='/ranking')?'active':''?>" href="#">Ranking</a>
                    </li>
                </ul>
            </div>