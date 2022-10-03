<?php
include("../mysql/conexao.php");

// Limpa a tabela metas_usuarios
$sql = "TRUNCATE metas_usuarios";
$mysqli->query($sql);

// Limpa a tabela metas
$sql = "DELETE FROM metas";
$mysqli->query($sql);

// Seleciona tudo da tabela ranking
$sql = "SELECT 
            _id_usuario
        FROM
            ranking";
$result = $mysqli->query($sql);
// Zera a pontuação de todos os usuários
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sql2 = "UPDATE
                    ranking  
                SET
                    pontuacao = 0
                WHERE
                    _id_usuario = " . $row["_id_usuario"];
        $mysqli->query($sql2);
    }
}

// Gera novas metas aleatóriamente
$sql = "SELECT
            id_treino 
        FROM 
            treinos";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idTreino = $row["id_treino"];
        // Seleciona as fichas do objetivo
        $sql2 = "SELECT 
                    id_ficha 
                FROM 
                    fichas 
                WHERE 
                    _id_treino = " . $row["id_treino"];
        $result2 = $mysqli->query($sql2);
        if ($result2->num_rows > 0) {
            $arrayFichas = [];
            while ($row2 = $result2->fetch_assoc()) {
                array_push($arrayFichas, $row2["id_ficha"]);
            }
            // Gera e executa o sql que traz 3 exercícios aleatórios
            $sql3 = "SELECT 
                        _id_ficha, 
                        id_exercicio, 
                        nome, 
                        repeticoes 
                    FROM 
                        exercicios 
                    WHERE 
                        _id_ficha = ";
            foreach ($arrayFichas as $key => $value) {
                if ($key == 0)
                    $sql3 .= $value;
                else {
                    $sql3 .= ' OR _id_ficha = ' . $value;
                }
            }
            $sql3 .= ' ORDER BY RAND() LIMIT 3';
            $result3 = $mysqli->query($sql3);
            if ($result3->num_rows > 0) {
                while ($row3 = $result3->fetch_assoc()) {
                    $repeticoes = (int) str_replace("x", "", explode(" ", $row3["repeticoes"])[0]) * (int) explode(" ", $row3["repeticoes"])[1];
                    $descricao = "Faça " . $repeticoes . " repetições de " . strtolower($row3["nome"]);
                    // Insere as metas
                    $sql4 = "INSERT INTO
                                metas (nome, descricao, pontos, _id_exercicio, quantidade, ativo, _id_treino)
                            VALUES
                                ('" . $row3["nome"] . "', '" .  $descricao . "', " . $repeticoes . ", " . $row3["id_exercicio"] . ", "
                        . $repeticoes . ", 'true', " . $idTreino . ")";
                    $mysqli->query($sql4);
                }
            }
        }
    }
}

// Insere as novas metas na tabela metas_usuarios
$sql = "SELECT
            cpf
        FROM
            usuarios
        WHERE
            _id_perfil = 1";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Seleciona o id do usuário
        $sql2 = "SELECT
                    id_usuarios,
                    _id_treino
                FROM 
                    usuarios
                WHERE
                    cpf = '" . $row['cpf'] . "'";
        $id_usuarios = mysqli_fetch_assoc(mysqli_query($mysqli, $sql2))["id_usuarios"];
        $id_treino = mysqli_fetch_assoc(mysqli_query($mysqli, $sql2))["_id_treino"];
        
        // Seleciona as metas
        $sql2 = "SELECT
                    *
                FROM 
                    metas
                WHERE
                    _id_treino = " . $id_treino;
        $result2 = $mysqli->query($sql2);
        // Insere as metas semanais na tabela de metas_usuarios no perfil do usuário
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $sql3 = "INSERT INTO 
                            metas_usuarios (_id_usuarios, _id_metas, completo, quantidade_concluida)
                        VALUES
                            (" .  $id_usuarios . "," .  $row2["id_metas"] . ", 'false', 0)";
                $mysqli->query($sql3);
            }
        }
    }
}

$mysqli->close();
