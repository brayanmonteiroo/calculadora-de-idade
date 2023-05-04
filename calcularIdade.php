<?php

function calcularIdade($dataNascimento)
{
    $dataAtual = new DateTime();
    $idade = $dataAtual->diff(new DateTime($dataNascimento));
    return array(
        "anos" => $idade->y,
        "meses" => $idade->m,
        "dias" => $idade->d,
        "diasTotais" => $idade->days,
        "horas" => $idade->days * 24,
        "minutos" => $idade->days * 24 * 60,
    );
}

if (isset($_POST["dataNascimento"])) {
    $dataNascimento = $_POST["dataNascimento"];
    $idade = calcularIdade($dataNascimento);

    $proxAniversario = new DateTime(date("Y") . "-" . date("m-d", strtotime($dataNascimento)));
    $diasParaAniversario = $proxAniversario < new DateTime()
        ? $proxAniversario->add(new DateInterval("P1Y"))->diff(new DateTime())->format("%a")
        : $proxAniversario->diff(new DateTime())->format("%a");

    $idadeAnos = $idade['anos'];
    $idadeMeses = $idade['meses'];
    $idadeDias = $idade['dias'];
    $diasTotais = $idade['diasTotais'];
    $horas = number_format($idade['horas'], 0, ".", ".");
    $minutos = number_format($idade['minutos'], 0, ".", ".");
    $diasParaAniversario = $diasParaAniversario;

    include "resultado.php";
}




