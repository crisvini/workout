<?php

function navbar($pagina = null)
{
    $html = '';
    if (str_contains($pagina, 'home.php')) {
        $html = '<div class="container mt-5 bg-gray fixed-bottom border-light-gray br-tp-20" style="padding: 3%; border-top: 7px solid; border-left: 7px solid; border-right: 7px solid;">
                    <div class="row">
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_inicio" onclick="load(' . "'home.php'" . ')">
                            <i class="fa-solid fa-house color-pink"></i><br>
                            <span class="fs-extra-small color-pink">Início</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_treino" onclick="load(' . "'fichas.php'" . ')">
                            <i class="fa-solid fa-dumbbell color-pink"></i><br>
                            <span class="fs-extra-small">Treino</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_metas" onclick="load(' . "'minhasMetas.php'" . ')">
                            <i class="fa-solid fa-list-check color-pink"></i><br>
                            <span class="fs-extra-small">Metas</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_ranking" onclick="load(' . "'ranking.php'" . ')">
                            <i class="fa-solid fa-ranking-star color-pink"></i><br>
                            <span class="fs-extra-small">Ranking</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" id="nav_perfil" onclick="load(' . "'perfil.php'" . ')">
                            <i class="fa-solid fa-circle-user color-pink"></i><br>
                            <span class="fs-extra-small">Perfil</span>
                        </div>
                    </div>
                </div>';
        return $html;
    } else  if (str_contains($pagina, 'fichas.php')) {
        $html = '<div class="container mt-5 bg-gray fixed-bottom border-light-gray br-tp-20" style="padding: 3%; border-top: 7px solid; border-left: 7px solid; border-right: 7px solid;">
                    <div class="row">
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_inicio" onclick="load(' . "'home.php'" . ')">
                            <i class="fa-solid fa-house color-pink"></i><br>
                            <span class="fs-extra-small">Início</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_treino" onclick="load(' . "'fichas.php'" . ')">
                            <i class="fa-solid fa-dumbbell color-pink"></i><br>
                            <span class="fs-extra-small color-pink">Treino</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_metas" onclick="load(' . "'minhasMetas.php'" . ')">
                            <i class="fa-solid fa-list-check color-pink"></i><br>
                            <span class="fs-extra-small">Metas</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_ranking" onclick="load(' . "'ranking.php'" . ')">
                            <i class="fa-solid fa-ranking-star color-pink"></i><br>
                            <span class="fs-extra-small">Ranking</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" id="nav_perfil" onclick="load(' . "'perfil.php'" . ')">
                            <i class="fa-solid fa-circle-user color-pink"></i><br>
                            <span class="fs-extra-small">Perfil</span>
                        </div>
                    </div>
                </div>';
        return $html;
    } else  if (str_contains($pagina, 'minhasMetas.php')) {
        $html = '<div class="container mt-5 bg-gray fixed-bottom border-light-gray br-tp-20" style="padding: 3%; border-top: 7px solid; border-left: 7px solid; border-right: 7px solid;">
                    <div class="row">
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_inicio" onclick="load(' . "'home.php'" . ')">
                            <i class="fa-solid fa-house color-pink"></i><br>
                            <span class="fs-extra-small">Início</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_treino" onclick="load(' . "'fichas.php'" . ')">
                            <i class="fa-solid fa-dumbbell color-pink"></i><br>
                            <span class="fs-extra-small">Treino</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_metas" onclick="load(' . "'minhasMetas.php'" . ')">
                            <i class="fa-solid fa-list-check color-pink"></i><br>
                            <span class="fs-extra-small color-pink">Metas</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_ranking" onclick="load(' . "'ranking.php'" . ')">
                            <i class="fa-solid fa-ranking-star color-pink"></i><br>
                            <span class="fs-extra-small">Ranking</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" id="nav_perfil" onclick="load(' . "'perfil.php'" . ')">
                            <i class="fa-solid fa-circle-user color-pink"></i><br>
                            <span class="fs-extra-small">Perfil</span>
                        </div>
                    </div>
                </div>';
        return $html;
    } else  if (str_contains($pagina, 'ranking.php')) {
        $html = '<div class="container mt-5 bg-gray fixed-bottom border-light-gray br-tp-20" style="padding: 3%; border-top: 7px solid; border-left: 7px solid; border-right: 7px solid;">
                    <div class="row">
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_inicio" onclick="load(' . "'home.php'" . ')">
                            <i class="fa-solid fa-house color-pink"></i><br>
                            <span class="fs-extra-small">Início</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_treino" onclick="load(' . "'fichas.php'" . ')">
                            <i class="fa-solid fa-dumbbell color-pink"></i><br>
                            <span class="fs-extra-small">Treino</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_metas" onclick="load(' . "'minhasMetas.php'" . ')">
                            <i class="fa-solid fa-list-check color-pink"></i><br>
                            <span class="fs-extra-small">Metas</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_ranking" onclick="load(' . "'ranking.php'" . ')">
                            <i class="fa-solid fa-ranking-star color-pink"></i><br>
                            <span class="fs-extra-small color-pink">Ranking</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" id="nav_perfil" onclick="load(' . "'perfil.php'" . ')">
                            <i class="fa-solid fa-circle-user color-pink"></i><br>
                            <span class="fs-extra-small">Perfil</span>
                        </div>
                    </div>
                </div>';
        return $html;
    } else  if (str_contains($pagina, 'perfil.php')) {
        $html = '<div class="container mt-5 bg-gray fixed-bottom border-light-gray br-tp-20" style="padding: 3%; border-top: 7px solid; border-left: 7px solid; border-right: 7px solid;">
                    <div class="row">
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_inicio" onclick="load(' . "'home.php'" . ')">
                            <i class="fa-solid fa-house color-pink"></i><br>
                            <span class="fs-extra-small">Início</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_treino" onclick="load(' . "'fichas.php'" . ')">
                            <i class="fa-solid fa-dumbbell color-pink"></i><br>
                            <span class="fs-extra-small">Treino</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_metas" onclick="load(' . "'minhasMetas.php'" . ')">
                            <i class="fa-solid fa-list-check color-pink"></i><br>
                            <span class="fs-extra-small">Metas</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_ranking" onclick="load(' . "'ranking.php'" . ')">
                            <i class="fa-solid fa-ranking-star color-pink"></i><br>
                            <span class="fs-extra-small">Ranking</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" id="nav_perfil" onclick="load(' . "'perfil.php'" . ')">
                            <i class="fa-solid fa-circle-user color-pink"></i><br>
                            <span class="fs-extra-small color-pink">Perfil</span>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-primary" onclick="load(' . "'objetivo.php?paginaAnterior=perfil'" . ')">Alterar
                                objetivo</button>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-primary" id="sair_btn">Sair</button>
                        </div>
                    </div>
                </div>';
        return $html;
    } else if ($pagina == null) {
        $html = '<div class="container mt-5 bg-gray fixed-bottom border-light-gray br-tp-20" style="padding: 3%; border-top: 7px solid; border-left: 7px solid; border-right: 7px solid;">
                    <div class="row">
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_inicio" onclick="load(' . "'home.php'" . ')">
                            <i class="fa-solid fa-house color-pink"></i><br>
                            <span class="fs-extra-small">Início</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_treino" onclick="load(' . "'fichas.php'" . ')">
                            <i class="fa-solid fa-dumbbell color-pink"></i><br>
                            <span class="fs-extra-small">Treino</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_metas" onclick="load(' . "'minhasMetas.php'" . ')">
                            <i class="fa-solid fa-list-check color-pink"></i><br>
                            <span class="fs-extra-small">Metas</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_ranking" onclick="load(' . "'ranking.php'" . ')">
                            <i class="fa-solid fa-ranking-star color-pink"></i><br>
                            <span class="fs-extra-small">Ranking</span>
                        </div>
                        <div class="col text-white m-0 text-center color-white fs-medium" id="nav_perfil" onclick="load(' . "'perfil.php'" . ')">
                            <i class="fa-solid fa-circle-user color-pink"></i><br>
                            <span class="fs-extra-small">Perfil</span>
                        </div>
                    </div>
                </div>';
        return $html;
    }
}
