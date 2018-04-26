<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.23
 * Time: 19:22
 */

function spausdinti(array $ar)
{

    if (isset($_COOKIE['filteredmasinos'])){
        $ar = unserialize($_COOKIE['filteredmasinos']);
    }


    usort($ar, function ($p1, $p2) {
        if ($p1->greitis() == $p2->greitis()) {
            return 0;
        } elseif ($p1->greitis() > $p2->greitis()) {
            return -1;
        }

        return 1;
    });




    foreach ($ar as $elem) {
        echo 'Data ir laikas: ' . $elem->date->format('Y-m-d H:i:s') . '<br>';
        echo 'Automobilio numeris: ' . $elem->number . '<br>';
        echo 'Nuvaziuotas atstumas metrais: ' . $elem->distance . '<br>';
        echo 'Sugaistas laikas sekundemis: ' . $elem->time . '<br>';
        echo '<b>Greitis: ' . $elem->greitis() . ' km/h  </b><br>';
        echo '<br><br>';
    }

}



