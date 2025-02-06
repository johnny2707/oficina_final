<?php 

function publicHolidaysByYear($year) {

    // Easter Holidays Calc
    $a = $year % 19;
    $b = intval($year / 100);
    $c = $year % 100;
    $d = intval($b / 4);
    $e = $b % 4;
    $f = intval(($b + 8) / 25);
    $g = intval(($b - $f + 1) / 3);
    $h = (19 * $a + $b - $d - $g + 15) % 30;
    $i = intval($c / 4);
    $k = $c % 4;
    $l = (32 + 2 * $e + 2 * $i - $h - $k) % 7;
    $m = intval(($a + 11 * $h + 22 * $l) / 451);
    $easterMonth = intval(($h + $l - 7 * $m + 114) / 31);
    $easterDay = (($h + $l - 7 * $m + 114) % 31) + 1;

    // Calc easter date
    $easterDate = sprintf("%04d-%02d-%02d", $year, $easterMonth, $easterDay);

    // Calc friday easter date
    $fridayEasterDate = date('Y-m-d', strtotime($easterDate . ' -2 day'));

    // Calc corpus christi date
    $corpusChristiDate = date('Y-m-d', strtotime($easterDate . ' +60 day'));

    $holidays = array(
        "$year-01-01"       => "Ano Novo",
        "$year-01-20"       => "Fogaceiras",
        "$year-04-25"       => "Dia da Liberdade",
        "$year-05-01"       => "Dia do Trabalhador",
        "$year-06-10"       => "Dia de Portugal",
        "$year-08-15"       => "Dia da Assunção de Nossa Senhora",
        "$year-10-05"       => "Implantação da República",
        "$year-11-01"       => "Dia de Todos os Santos",
        "$year-12-01"       => "Restauração da Independência",
        "$year-12-08"       => "Dia da Imaculada Conceição",
        "$year-12-25"       => "Natal",
        $easterDate         => "Páscoa",
        $fridayEasterDate   => "Sexta-feira Santa",
        $corpusChristiDate  => "Corpo de Deus"
    );

    ksort($holidays);
    return $holidays;
}

?>