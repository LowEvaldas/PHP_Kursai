<html>
<body>
<center>

    <?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.18
 * Time: 15:55
 */


include 'duomenys.php';
include 'funkcijos.php';

echo '<b>1. Turime žmonių masyvą, kurio kiekvienas elementas yra
masyvas su žmogaus vardu ir lytimi. Atspausdinkite visas galimas skirtingas poras vyras - moteris. </b><br><br>';

porosvm($zmones);

echo '<br>';

echo '<b>2. Tie patys duomenys tik sudarome 3 asmenų grupes taip kad nebūtų tų pačių lyčių.</b> <br><br>';

porosthree($zmones);

echo '<b>3. Turime mokinių sąrašą su dalykais ir gautais pažymiais už tuos dalykus Suskaičiuokite kuris geriausiai mokosi pagal visų dalykų pažymių
vidurkius. Dalyko pažymio nustatymui reikės panaudoti funkciją
round()</b><br><br>';


geriausiasMokinys($mokiniai);

$vidurkiai[] = vidurkis

?>




</center>
</body>
</html>

