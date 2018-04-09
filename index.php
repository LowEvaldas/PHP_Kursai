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

        class Printer {
            function welcome (string $message)
            {
                echo "<br>";
                echo 'Welcome ' . $message;
            }
        }

        $world = new Printer();
        $world->welcome('Evaldas');
        $world->welcome('Mik');


        // Pagrindinio kodo pabaiga
        ?>




    </span>

</center>
</body>
</html>