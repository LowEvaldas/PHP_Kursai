<html>
<body>
<center>
    <?php


  /* Turime du masyvus $a = array(5, 6, 10, 15) ir $b =
array(8,5, 3, 25). Raskite kiekvieno masyvo skaičių vidurkį ir
atspausdinkite jų skirtumą. Masyvo vidurkio suradimui
parašykite funkciją. Rezultatas turi gautis: -1.25*/


  echo '<b>Turime du masyvus $a = array(5, 6, 10, 15) ir $b =
array(8,5, 3, 25). Raskite kiekvieno masyvo skaičių vidurkį ir
atspausdinkite jų skirtumą. Masyvo vidurkio suradimui
parašykite funkciją. Rezultatas turi gautis: -1.25 </b> <br>';

  $a = [5,6,10,15];
  $b = [8,5,3,25];


  function vidurkis(array $a)
  {
      $suma = 0;
      for ($i=0;$i<count($a); $i++){
          $suma+=$a[$i];
      }

      return $suma/count($a);
  }

  echo '<br>Vidurkių skirtumas: ' . (vidurkis($a)-vidurkis($b));
  echo '<br>  <br>';


  //Tobuluoju skaičiumi vadinamas natūralusis skaičius, lygus
    //visų savo daliklių, mažesnių už save patį, sumai. pvz 28 = 1
    //+ 2 + 4 + 7 + 14 Suraskite visus tokius skaičius iš intervalo
    //1...1000. Skaičiaus daliklių radimui ir tikrinimui ar skaičius
    //tobulas pasirašykite atskiras funkcijas.

    echo '<b>Tobuluoju skaičiumi vadinamas natūralusis skaičius, lygus
    //visų savo daliklių, mažesnių už save patį, sumai. pvz 28 = 1
    //+ 2 + 4 + 7 + 14 Suraskite visus tokius skaičius iš intervalo
    //1...1000. Skaičiaus daliklių radimui ir tikrinimui ar skaičius
    //tobulas pasirašykite atskiras funkcijas.</b><br><br>';

    // 28, 1, 2, ,
    function tobulieji()
    {
        for ($i=1; $i<1000;$i++){
            if (dalikliai($i) == $i) {
                echo "Tobulasis: " . $i . '<br>';
            }
        }
    }

    function dalikliai($sk){
        $dalsum = 0;
        for ($i=1; $i<$sk; $i++){
            if ($sk % $i == 0){
                 $dalsum += $i;
            }
        }
        return $dalsum;
    }


    tobulieji();



    ?>
</center>
</body>
</html>
