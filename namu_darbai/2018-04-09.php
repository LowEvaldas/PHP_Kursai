<html>
<body>
<center>
    <?php
// Vidutinė reikšmė
$a = [5,4,6,6,6];
$suma = 0;

for ($i=0;$i<count($a);$i++){
    $suma += $a[$i];
}

echo 'Duotas masyvas a. Suskaičiuokite vidutinę masyvo
elementų reikšmę <br>';
echo 'Vidurkis: ' . $suma/count($a);
echo '<br>';


// Duotas masyvas a. Suskaičiuokite lyginių indeksų masyvo elementų sumą
$a = [5,4,6,6,6];
$suma = 0;

for ($i=0;$i<count($a);$i++){
    if ($i % 2 == 0) {
        $suma += $a[$i];
    }
}

echo 'Duotas masyvas a. Suskaičiuokite lyginių indeksų masyvo elementų sumą <br>';
echo 'Suma: ' . $suma;
echo '<br>';


//Duotas masyvas a. Atspausdinkite masyvo elementu didėjimo tvarka

$a = [5,4,6,8,6];
sort($a);

    echo 'Duotas masyvas a. Atspausdinkite masyvo elementu didėjimo tvarka <br>';
    var_dump($a);
    echo '<br>';


    // Duotas daugiamatis masyvas m elementų, kurių kiekvienas yra masyvas iš n
    //elementų. Įsivaizduokime tą masyvą kaip lentelę iš m eilučių, kurių kiekviena turi n
    //reikšmių arba n stulpelių. Suskaičiuokite visų stulpelių sumas ir atspausdinkite,
    //– pvz, jei m = 3 ir n = 4, tai masyvas gali būti toks:
    //[[3, 4, 6, 4],
    //[5, 6, 2, 1],
    //[1, 4, 7, 4]]
    //ir tada reikia paskaičiuoti ir atspausdinti sumas: pirmo stulpelio: 3+5+1, antro:
    //4+6+4 ir t.t.

$a = [[3, 4, 6, 4],
    [5, 6, 2, 1],
    [1, 4, 7, 4]];

$suma = 0;



    echo 'Duotas daugiamatis masyvas m elementų, kurių kiekvienas yra masyvas iš n
elementų. Įsivaizduokime tą masyvą kaip lentelę iš m eilučių, kurių kiekviena turi n
reikšmių arba n stulpelių. Suskaičiuokite visų stulpelių sumas ir atspausdinkite
 <br>';

$i = 0;
$suma = [];
$countas = count($a[$i]);

    while ($i<$countas) {
        $suma[$i] = 0;
        for ($j=0; $j<count($a); $j++) {
            $suma[$i] += $a[$j][$i];
        }
        echo 'Sumos ' . $suma[$i] . '. ';
        $i++;
    }
    echo '<br>';

   echo 'Didžiausia suma iš jų: ' . max($suma);
    echo '<br>';
    echo '<br>';



// Duotas daugiamatis masyvas a turintis n eilučių ir n stulpelių. Suskaičiuokite ir
    //atspausdinkite visų elementų esančių abiejose įstrižainėse sumas.

    $a = [[3, 4, 6, 5],
        [5, 6, 2, 4],
        [5, 6, 2, 4],
        [1, 4, 7, 4]];

    $sum1 = 0;
    $sum2 = 0;


    for ($i=0; $i<count($a); $i++) {
        for ($j=0; $j < count($a); $j++) {
            if ( $i == $j) {
                $sum1 += $a[$i][$j];
            }
            if (  ($j == (count($a)-$i-1))  ) {
                $sum2 += $a[$i][$j];
            }
        }
    }

    echo 'Duotas daugiamatis masyvas a turintis n eilučių ir n stulpelių. Suskaičiuokite ir
atspausdinkite visų elementų esančių abiejose įstrižainėse sumas. <br>';

    echo '1 Įstrižainė: ' . $sum1;
    echo ' <br> 2 Įstrižainė: ' . $sum2;




?>
</center>
</body>
</html>
