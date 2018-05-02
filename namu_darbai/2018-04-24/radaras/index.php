<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.23
 * Time: 19:28
 */


include 'funkcijos.php';
include 'radar.php';

echo '<center>';

$data = $_POST['date'];
$number = $_POST['number'];
$distance = $_POST['distance'];
$time = $_POST['time'];
$filter = $_POST['filter'];

if (isset($_COOKIE['masinos'])){
    $masinos = unserialize($_COOKIE['masinos']);
}
else {
    $masinos = [];
}

if (($data && $number && $distance && $time) && !$filter) {

    $masinos[] = new Radar($data,$number,$distance,$time);
    setcookie('masinos', serialize($masinos));

    header('Location: index.php');

}

if ($filter){
    $filteredMasinos = [];

    foreach ($masinos as $masina) {
        if (preg_match('/(?i)' . $filter . '/', $masina->number)){
            $filteredMasinos[] = $masina;
        }
    }

    setcookie('filteredmasinos', serialize($filteredMasinos));

}

if (isset($_COOKIE['filteredmasinos'])){
    setcookie('filtered', '');

}


?>

    <form action="index.php" method="post">

        <input type="text" name="date" placeholder="Iveskite data">
        <input type="text" name="number" placeholder="Iveskite numeri">
        <input type="text" name="distance" placeholder="Iveskite atstuma metrais">
        <input type="text" name="time" placeholder="Iveskite laika sekundemis">
        <input type="submit" placeholder="SUBMIT">

    </form>

<form action="index.php" method="post">
    Filtravimas: <input type="text" name="filter">
    <button type="submit">Filtruoti</button>
</form>


<?php

    spausdinti($masinos);


echo '</center>';

?>