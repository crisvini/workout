<?php
session_start();
include("./navbar.php");
include("./header.php");
include("./mysql/conexao.php");
include("./verificaLogin.php");

// Seleciona as pontuações do usuário
$sql = "SELECT 
            pontuacao
        FROM 
            ranking
        WHERE 
            _id_usuario = '" . $_SESSION["idUsuario"] . "'
        AND
            _id_treino = " . $_SESSION["_id_treino"];
$pontuacao = mysqli_fetch_assoc(mysqli_query($mysqli, $sql))["pontuacao"];

// Seleciona as metas completas
$sql = "SELECT 
            metas_usuarios.completo as completo,
            metas.nome as nome,
            metas.descricao as descricao,
            metas.pontos as pontos,
            metas.quantidade as quantidade,
            metas_usuarios.quantidade_concluida as quantidadeConcluida
        FROM 
            metas_usuarios 
        JOIN 
                usuarios 
            on 
                usuarios.id_usuarios = metas_usuarios._id_usuarios 
        JOIN 
                metas 
            on 
                metas.id_metas = metas_usuarios._id_metas 
        WHERE 
            usuarios.cpf = '" . $_SESSION["cpf"] . "'
        AND
            metas_usuarios.completo = 'true'
        AND
            metas._id_treino = " . $_SESSION["_id_treino"];
$result = $mysqli->query($sql);
// Monta os cards das metas completas
$htmlMetasCompletas = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $htmlMetasCompletas .= ' <div class="row mt-3 bg-medium-gray p-4vw br-20" style="--bs-gutter-x: none;">
                                    <div class="col-12 br-20">
                                        <p class="color-white fs-medium fw-500 mb-0" style="line-height: 8vw;">' . $row["descricao"] . '</p>
                                    </div>
                                    <div class="col-12 bg-black br-20 mt-3 d-flex justify-content-between">
                                        <span class="color-pink ps-4 fs-small fw-700 mb-0" style="line-height: 8vw;">' . $row["pontos"] . ' pontos </span>
                                        <span class="color-pink pe-4 fs-small" style="align-self: center;"><i class="fa-solid fa-check"></i></span>
                                    </div>
                                </div>';
    }
} else {
    $htmlMetasCompletas .= ' <div class="row mt-3 bg-medium-gray p-3vw br-20" style="--bs-gutter-x: none;">
                                <div class="col-12 br-20">
                                    <p class="color-white fs-medium fw-500 mb-0" style="line-height: 8vw;">Nenhuma meta encontrada</p>
                                </div>
                            </div>';
}

// Consulta os dados das metas incompletas
$sql = "SELECT 
            metas_usuarios.completo as completo,
            metas.nome as nome,
            metas.descricao as descricao,
            metas.pontos as pontos,
            metas.quantidade as quantidade,
            metas_usuarios.quantidade_concluida as quantidadeConcluida
        FROM 
            metas_usuarios 
        JOIN 
                usuarios 
            on 
                usuarios.id_usuarios = metas_usuarios._id_usuarios 
        JOIN 
                metas 
            on 
                metas.id_metas = metas_usuarios._id_metas 
        WHERE 
            usuarios.cpf = '" . $_SESSION["cpf"] . "'
        AND
            metas_usuarios.completo = 'false'
        AND
            metas._id_treino = " . $_SESSION["_id_treino"];
$result = $mysqli->query($sql);
// Monta os cards das metas incompletas
$htmlMetasIncompletas = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $htmlMetasIncompletas .= ' <div class="row mt-3 bg-medium-gray p-4vw br-20" style="--bs-gutter-x: none;">
                                        <div class="col-12 br-20">
                                            <p class="color-white fs-medium fw-500 mb-0" style="line-height: 8vw;">' . $row["descricao"] . '</p>
                                        </div>
                                        <div class="col-12 progress br-20 mt-3" style="height: 7vw;">
                                             <div class="progress-bar bg-light-gray text-start" role="progressbar" style="width: ' . ($row["quantidadeConcluida"] * 100) / $row["quantidade"] . '%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                 <span class="color-medium-gray ms-4 fs-small fw-800" style="position: absolute;">' . $row["quantidadeConcluida"] . ' realizadas</span>
                                             </div>
                                         </div>
                                        <div class="col-12 bg-black br-20 mt-3 d-flex justify-content-between">
                                            <span class="color-pink ps-4 fs-small fw-700 mb-0" style="line-height: 8vw;">' . $row["pontos"] . ' pontos </span>
                                            <span class="color-pink pe-4 fs-small" style="align-self: center;"><i class="fa-solid fa-star"></i></span>
                                        </div>
                                    </div>';
    }
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen">
        <?= retornaHeader("home.php", "As metas e as pontuações são atualizadas semanalmente, para progredir em uma meta, realize e finalize um treino que possui exercícios que estão inclusos em metas. A pontuação das metas têm base na quantidadde de repetições necessárias para completá-la, ou seja, se uma meta exige 48 repetições, 48 pontos serão incrementados na sua pontuação semanal ao completar tal meta. "); ?>
        <div class="container mt-3vw bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large d-flex justify-content-between">
                    <span>Minhas metas</span>
                    <span><i class="fa-solid fa-list" style="align-self: center;"></i></span>
                </div>
            </div>
            <?php
            $metas = "";
            $htmlMetasIncompletas != "" ? $metas = $htmlMetasIncompletas : $metas = '<div class="row mt-3 bg-medium-gray p-4vw br-20" style="--bs-gutter-x: none;">
                                                                                        <div class="col-12 br-20">
                                                                                             <p class="color-white fs-medium fw-500 mb-0" style="line-height: 8vw;">Parabéns! Todas as metas foram concluídas!</p>
                                                                                         </div>
                                                                                     </div>';
            echo $metas;
            ?>
        </div>
        <div class="container mt-3vw bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large d-flex justify-content-between">
                    <span>Metas completas</span>
                    <span><i class="fa-solid fa-list-check" style="align-self: center;"></i></span>
                </div>
            </div>
            <?= $htmlMetasCompletas; ?>
        </div>
        <div class="container mt-3vw bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col-12 color-white fs-large d-flex justify-content-between">
                    <span>Minha pontuação</span>
                    <span style="align-self: center;"><i class="fa-solid fa-star" style="align-self: center;"></i></span>
                </div>
            </div>
            <div class="row mt-3 bg-medium-gray p-4vw br-20" style="--bs-gutter-x: none;">
                <div class="col-12 ps-4 bg-black br-20 fs-large color-pink">
                    <span><?= $pontuacao; ?> pontos</span>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <?= navbar($_SERVER['REQUEST_URI']); ?>
    </div>

</body>

</html>