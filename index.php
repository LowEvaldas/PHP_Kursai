<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<center>
    <span class="big">




        <?php
        // Pagrindinis kodas
        $a = 53.49;
        $b = 50;

        $c = $a + $b;
        echo 'a ir b suma yra: ' . (int)$c . "<br>";

        echo "Arnold once said: I'll be back <br>";
        echo 'Arnold once said: "I\'ll be back" <br>';


        $array = [1,5,8,7,4];
        $max = 0;

        for ($i=0; $i < count($array); $i++)
        {
            if ($array[$i] > $max)
            {
                $max = $array[$i];
            }
        }

        echo $max . " didžiausias skaičius <br> <br> <br>";

        $a = [
                [
                        1,2,3
                ],
        ];



        $max = [0,0,0];
        $ar = [
            [
                5,4,80,6
            ],
            [
                8,4,3,15
            ],
            [
                18,85,36,45
            ],
        ];

        for ($i=0; $i<count($ar); $i++)
        {
            for ($j=0; $j<count($ar[$i]); $j++)
            {
                if ($max[$i] < $ar[$i][$j])
                {
                    $max[$i] = $ar[$i][$j];
                }
            }
        }

        for ($k = 0; $k < count($ar); $k++)
        {
            echo $k+1 . ' Didžiausias elementas yra: ' . $max[$k] . "<br>";
        }



        $a = [[3, 4, 6, 5],
              [5, 6, 2, 4],
              [5, 6, 2, 4],
              [1, 4, 7, 4]];

        $sum1 = 0;
        $sum2 = 0;


        for ($i=0; $i<count($a); $i++)
        {
            for ($j=0; $j < count($a); $j++)
            {
                if ( $i == $j)
                {
                    $sum1 += $a[$i][$j];
                }
               if (  ($j == (count($a)-$i-1))  )
               {
                   $sum2 += $a[$i][$j];
               }
            }
        }

        echo '1 Įstrižainė: ' . $sum1;
        echo ' <br> 2 Įstrižainė: ' . $sum2;





        // Pagrindinio kodo pabaiga
        ?>




    </span>

</center>
</body>
</html>