<html>
<body>
<center>
    <?php


  /*  Duoti trys skaičiai: a, b, c. Nustatykite ar šie skaičiai gali būti
trikampio kraštinių ilgiai ir jei gali tai kokio trikampio: lygiakraščio,
lygiašonio ar įvairiakraščio. Atspausdinkite atsakymą. Kaip
pradinius duomenis panaudokite tokius skaičius: */


  echo 'Duoti trys skaičiai: a, b, c. Nustatykite ar šie skaičiai gali būti
trikampio kraštinių ilgiai ir jei gali tai kokio trikampio: lygiakraščio,
lygiašonio ar įvairiakraščio. Atspausdinkite atsakymą. Kaip
pradinius duomenis panaudokite tokius skaičius. Apskaičiuokite ir atspausdinkite šių trikampių plotus: <br><br>';

  $trik = [
      [3, 4, 5],
      [2, 10, 8],
      [5, 6, 5],
      [5, 5, 5]];


  for ($i=0;$i<count($trik); $i++){
     $a = $trik[$i][0];
     $b = $trik[$i][1];
     $c = $trik[$i][2];
     echo $i . '. ';

          if (($a < $b + $c) && ($b < $a + $c) && ($c < $a + $b)) {
              $pp = (($a+$b+$c) / 2);
              $plotas = sqrt($pp*($pp-$a)*($pp-$b)*($pp-$c));
              if ($a == $b && $b == $c && $a == $c) {
                  echo "trikampis lygiakraštis";
              }
              else if ($a == $b || $a == $c || $b == $c) {
                  echo "trikampis lygiašonis";

              }
              else {
                  echo "trikampis ivariakrastis";
              }
              echo '<br>';
              echo "Trikampio plotas: " . $plotas;
          }
          else {
              echo "trikampio sudaryti negalima";
          }
          echo '<br><br>';
  }


  /* Duotas masyvas array(-10, 0, 2, 9, -5). Atspausdinkite masyvo elementus
mažėjimo tvarka.
– Funkcija išmetanti elementą iš masyvo ir grąžinanti naują masyvą:
array_splice(),
– pvz:
– $a = array(2, 4, 8, 16);
– array_splice($a, $i, 1);
– jei $i = 2 tai $a masyvas pasidarys toks (2, 4, 16)
– Spausdinimui naudokite: echo $x; */

  echo 'Masyvas mazejimo tvarka: <br>';

  $array = [-10, 0, 2, 9, -5];
  $countas = count($array); // Prisiskyriau , nes dedant iškart į ciklą jis nesupranta normaliai, ne tokį countą duoda.
  $mazcountas = count($array);
  $min = PHP_INT_MAX ;
  $mindex = 0;
  $kiek = 0;

  while ($kiek < $countas) {
      for ($i=0;$i<$mazcountas; $i++) {
            if ($array[$i] < $min) {
                $min = $array[$i];
                $mindex = $i;
            }
      }

      array_splice($array, $mindex, 1);
      echo $min . '<br>';
      $kiek++;
      $mazcountas--;
      $min = PHP_INT_MAX ;
  }



    ?>
</center>
</body>
</html>
