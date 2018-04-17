<html>
<body>
<center>
<?php
/*
 * 1. Turime masyvą $a = [‘Jonas’, ‘Petras’, ‘Antanas’,‘Povilas’].
Atspausdinkite visas galimas skirtingas poras laikant, kad pvz
poros ‘Jonas’ - ‘Petras’ ir ‘Petras’ - ‘Jonas’ yra tokios pat.
 */

function porosNr1(array $poros)
{
    for ($i=0; $i<count($poros); $i++){
        for ($j=$i+1; $j<count($poros); $j++){
            if ($i != $j){
                echo $poros[$i] . ' su ' . $poros[$j] . '<br>';
            }
        }
    }
}

$a = ['Jonas', 'Petras', 'Antanas','Povilas'];

echo '<b>1. Turime masyvą $a = [‘Jonas’, ‘Petras’, ‘Antanas’,‘Povilas’].
Atspausdinkite visas galimas skirtingas poras laikant, kad pvz
poros ‘Jonas’ - ‘Petras’ ir ‘Petras’ - ‘Jonas’ yra tokios pat.<br><br></b>';

porosNr1($a);


/*
 * 2. Ta pati sąlyga tik pvz poros ‘Jonas’ - ‘Petras’ ir ‘Petras’ - ‘Jonas’
yra laikomos skirtingomis.
 */

function porosNr2(array $poros)
{
    for ($i=0; $i<count($poros); $i++){
        for ($j=0; $j<count($poros); $j++){
            if ($i != $j){
                echo $poros[$i] . ' su ' . $poros[$j] . '<br>';
            }
        }
    }
}

echo '<br>';

echo '<b>2. Ta pati sąlyga tik pvz poros ‘Jonas’ - ‘Petras’ ir ‘Petras’ - ‘Jonas’
yra laikomos skirtingomis.<br><br></b>';

porosNr2($a);


/*
 * 3. Turime daugiamatį masyvą, kuris aprašo kažką panašaus į
Excel lentelę arba matricą, t.y. pirmas indeksas žymi eilutę, o
antras stulpelį. Eilutės gali turėti skirtingą elementų (stulpelių)
skaičių. Suskaičiuokite stulpeliuose esančių skaičių sumas ir
išveskite didžiausią.
 */


/*
 * 1 3 4
 * 2 5
 *     3   8
 * 1 1     1
 */


function rastiMaxIndex(array $a)
{
    $maxIndex = 0;

    for ($i=0; $i<count($a); $i++){
        foreach ($a[$i] as $key => $elem){
            if ($key > $maxIndex){
                $maxIndex = $key;
            }
        }
    }

    return $maxIndex;
}

function sudeliotiMasyva(array $a)
{
    $maxIndex = rastiMaxIndex($a);

    foreach ($a as $key => $elem){
        for ($j=0; $j<=$maxIndex; $j++){
            if (!$a[$key][$j]){
                $a[$key][$j] = 0;
            }
        }
    }

    return $a;
}

function skaiciuotiSuma(array $a, array $sum)
{
    $maxIndex = rastiMaxIndex($a);

    for ($i=0; $i<=$maxIndex; $i++){
        $sum[$i] = 0;
        for($j=0; $j<=count($a); $j++){
            $sum[$i] += $a[$j][$i];
        }
        echo $i . '. stulpelio suma: ' . $sum[$i] . '<br>';
    }

    return $sum;
}

function rastiMax(array $sum)
{
    $maxi = $sum[0];
    for ($i=1; $i<count($sum); $i++){
        if ($sum[$i] > $maxi){
            $maxi = $sum[$i];
        }
    }

    echo 'Didžiausia iš jų: ' . $maxi;
}



$a = [
    [1, 3, 4],
    [2, 5],
    [2 => 3, 5 => 8],
    [1, 1, 5 => 1]
];

$sumos = [];


echo '<br>';

echo '<b> 3. Turime daugiamatį masyvą, kuris aprašo kažką panašaus į
Excel lentelę arba matricą, t.y. pirmas indeksas žymi eilutę, o
antras stulpelį. Eilutės gali turėti skirtingą elementų (stulpelių)
skaičių. Suskaičiuokite stulpeliuose esančių skaičių sumas ir
išveskite didžiausią.<br><br></b>';

$a = sudeliotiMasyva($a);
$sumos = skaiciuotiSuma($a, $sumos);
rastiMax($sumos);



?>
</center>
</body>
</html>
