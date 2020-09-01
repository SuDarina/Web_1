<?php

    function check($x, $y, $r)
    {
        if ((($x * $x + $y * $y <= $r * $r) && ($x >= 0) && ($y >= 0)) ||
            (($x <= 0) && ($y >= 0) && ($x >= -$r) && ($y <= $r / 2)) ||
            (($y >= -2 * $x - $r) && ($y <= 0) && ($x <= 0))) {

            return "yes";
        } else {

            return "no";
        }
    }
    session_start();
    date_default_timezone_set("Europe/Moscow");
    $time = date('d-m-Y H:i:s');
    $start = microtime(true);

    $x1 = (double) $_POST["x"];
    $x = str_replace(".", ",", $x1);

    $y1 = (double) $_POST["y"];
    $y = round($y1, 3);
    $y = str_replace(".", ",", $y);


    $r1 = (double) $_POST["r"];
    $r = str_replace(".", ",", $r1);

    $res = check($x1, $y1, $r1);
    $benchmark_res = microtime(true) - $start;
    $benchmark = (number_format($benchmark_res, 10, ".", "")*1000000)." • 10^6";
    $benchmark = str_replace(".",",", $benchmark);


    $res_arr = array($x, $y, $r, $res, $time, $benchmark);

    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = array();
    }

    array_push($_SESSION['history'], $res_arr);
    include "table.php";