<html>
<body>
<table border="1">
    <tr><td>Vardas</td><td>Pavarde</td><td>Vidurkis</td></tr>

<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.19
 * Time: 17:34
 */

include 'duomenys.php';
include 'mokinys.php';
include 'funkcijos.php';

$mokinys1 = new Mokinys($dalykai1, 'Evaldas', 'Evaldauskas', new DateTime(1994-05-31));
$mokinys2 = new Mokinys($dalykai2, 'Evaldas', 'Kitauskas', new DateTime(2005-05-14));

$mokiniai = [$mokinys1, $mokinys2];

printTable($mokiniai);

?>

</table>
</body>
</html>
