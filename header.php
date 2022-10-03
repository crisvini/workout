<?php

function retornaHeader($pagina, $tip = null)
{
    $html = "";
    if ($tip == null) {
        $html = '
            <div class="container" style="max-width: 100% !important;">
                <div class="row pt-2 pb-2 bg-black">
                    <div class="col text-center">
                        <i class="fa-solid fa-angle-left back-button" onclick="load(' . "'" . $pagina . "'" . ');"></i>
                        <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 10vw; line-height: normal;">Workout
                            <i class="fa-solid fa-dumbbell"></i></span>
                    </div>
                </div>
            </div>';
    } else {
        $html = '
            <div class="container" style="max-width: 100% !important;">
                <div class="row pt-2 pb-2 bg-black">
                    <div class="col text-center">
                        <i class="fa-solid fa-angle-left back-button" onclick="load(' . "'" . $pagina . "'" . ');"></i>
                        <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 10vw; line-height: normal;">Workout
                            <i class="fa-solid fa-dumbbell"></i></span>
                        <i class="fa-solid fa-question tip-button" onclick="tipModal(' . "'" . $tip . "'" . ');"></i>
                    </div>
                </div>
            </div>';
    }
    return $html;
}
