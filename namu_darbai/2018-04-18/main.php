<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.19
 * Time: 17:34
 */

include 'duomenys.php';
include 'mokinys.php';

$mokinys1 = new Mokinys($dalykai1, 'Evaldas', 'Evaldauskas');

echo $mokinys1->sudeti();