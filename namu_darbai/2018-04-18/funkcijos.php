<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.19
 * Time: 18:39
 */

function printTable(array $mokiniai)
{
    usort($mokiniai, function ($p1, $p2) {
        if ($p1->vidurkis() == $p2->vidurkis()) {
            return 0;
        } elseif ($p1->vidurkis() > $p2->vidurkis()) {
            return -1;
        }

        return 1;
    });

    foreach ($mokiniai as $mokinys) {
        if ($mokinys->metai() >= 18){
            echo '<tr>';
            echo '<td>' . $mokinys->vardas . '</td>';
            echo '<td>' . $mokinys->pavarde . '</td>';
            echo '<td>' . $mokinys->vidurkis() . '</td>';
            echo '</tr>';
        }
    }
}

