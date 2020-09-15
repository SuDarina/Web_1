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
    function checkArea($x, $y, $r){
        return !in_array($x, array(-2, -1.5, -1, -0.5, 0, 0.5, 1, 1.5, 2))
            || !is_numeric($y) || $y <= -3 || $y >= 3 ||
            !in_array($r, array(1, 1.5, 2, 2.5, 3));
    }
    session_start();
    date_default_timezone_set("Europe/Moscow");
    $time = date('d-m-Y H:i:s');
    $start = microtime(true);

    $x1 = (double) $_POST["x"];
    $x = str_replace(".", ",", $x1);

    $y1 = (double) $_POST["y"];

    function customRound($i) {
        $i *= 1000;
        $i = floor($i);
        return $i / 1000;
    }

    $y = customRound($y1);
    $y = str_replace(".", ",", $y);


    $r1 = (double) $_POST["r"];
    $r = str_replace(".", ",", $r1);

    $res = check($x1, $y1, $r1);
    $benchmark_res = microtime(true) - $start;
    $benchmark = (number_format($benchmark_res, 10, ".", "")*1000000)." • 10";
    $benchmark = str_replace(".",",", $benchmark);

    if (checkArea($x, $y1, $r)) {
        include "table.php";
        return;
    }

    $res_arr = array($x, $y, $r, $res, $time, $benchmark);

    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = array();
    }

        array_push($_SESSION['history'], $res_arr);
        include "table.php";
