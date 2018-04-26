<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.18
 * Time: 15:55
 */

/**
 * Sąlyga 1. Turime žmonių masyvą, kurio kiekvienas elementas yra
masyvas su žmogaus vardu ir lytimi. Atspausdinkite visas galimas skirtingas poras vyras - moteris.
 */


/*
 * Suporuoja po du
 */
function porosvm (array $a)
{

    for ($i=0; $i<count($a); $i++){
       for ($j=$i+1; $j<count($a); $j++){
           if (($a[$i]['lytis'] != $a[$j]['lytis'])    )
           {
               echo "Pora: " . $a[$i]['vardas'] . ' ir ' .  $a[$j]['vardas'] . '<br>';
           }
       }
    }

}


/**
 *  Sąlyga 2. Tie patys duomenys tik sudarome 3 asmenų grupes taip kad nebūtų tų pačių lyčių.
 */

/*
 * Suporuoja visus po tris
 */
function porosthree(array $a)
{

 //Ilgesnis variantas 3 ciklai, bet veikia greičiau
    for ($i=0; $i<count($a); $i++){
        for ($j=$i+1; $j<count($a); $j++){
            for ($k=$j+1; $k<count($a); $k++){
                if (   (($a[$i]['lytis'] != $a[$j]['lytis'])  || ($a[$i]['lytis'] != $a[$k]['lytis']) || ($a[$j]['lytis'] != $a[$k]['lytis']))   )
                {
                    echo "Pora: " . $a[$i]['vardas'] . ' ir ' .  $a[$j]['vardas'] . ' ir '  . $a[$k]['vardas'] . '<br>';
                }
            }
        }
    }

       $i = 0;
       $j = 1;
       $k = 2;

       // Vienas ciklas bet veikia lėčiau
    /*
       while ($i+2 < count($a)){
           if ($k < count($a)-1) {
               $k++;
           }
           else if ($j < count($a)-1){
               $j++;
               $k = $j+1;
           }
           else if ($i < count($a)-1){
               $i++;
               $j = $i+1;
               $k = $j+1;
           }
           if (   (($a[$i]['lytis'] != $a[$j]['lytis'])  || ($a[$i]['lytis'] != $a[$k]['lytis']) || ($a[$j]['lytis'] != $a[$k]['lytis']))  && (($a[$i]['vardas'])   && ($a[$j]['vardas'])  && ($a[$k]['vardas']))     ) {
               echo "Pora: " . $a[$i]['vardas'] . ' ir ' . $a[$j]['vardas'] . ' ir ' . $a[$k]['vardas'] . '<br>';
           }


       }*/
}



/*
 * Sąlyga
 *Suskaičiuokite kuris geriausiai mokosi pagal visų dalykų pažymių
vidurkius. Dalyko pažymio nustatymui reikės panaudoti funkciją
round()
 *
 */

/*
 * Pagrindinė funkcija, kurie suranda vidurkius ir kreipiasi į papildomas funkcijas
 */
function geriausiasMokinys(array $mokiniai)
{

    $vidurkiai = [];
    $vidvidurkiai = [];

    foreach ($mokiniai as $mokinys) {
        foreach ($mokinys['pazymiai'] as $raktas => $pazymiai) {
            $suma= 0;

            foreach ($pazymiai as $pazymys) {
                $suma += $pazymys;
            }

            $vidurkis = $suma / count($pazymiai);
            $vidurkiai[] = round($vidurkis); // Su round gaunasi truputį kitoks atsakymas, sakyčiau nelogiškas, bet to prašė sąlyga
        }
        $vidvidurkiai[] = vidurkis($vidurkiai);
        unset ($vidurkiai);
    }

    dVidurkis($vidvidurkiai, $mokiniai);

}

/*
 * Suskaičiuoja vieno mokinio vidurkį
 */

function vidurkis (array $vid)
{
    $sum = $vid[0];
    for ($i=1; $i<count($vid); $i++){
       $sum += $vid[$i];
    }

    return $sum/count($vid);

}

/*
 Suskaičiuoja kurio mokinio vidurkis didžiausias
*/
function dVidurkis (array $vid, array $mok){
    $max = $vid[0];
    $index = 0;

    for ($i=1; $i<count($vid); $i++){
        if ($vid[$i] > $max){
            $max = $vid[$i];
            $index = $i;
        }
    }

    echo 'Didžiausias vidurkių vidurkis: ' . $max . ' jį turi: ' . $mok[$index]['vardas'];
}