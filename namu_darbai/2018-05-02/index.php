<style>
    .mark, .mode, .date {
        font-size: 24px;
        font-family: Bahnschrift
    }

    .mark {
        color: cornflowerblue;
    }

    .mode {
        color: cornflowerblue;
    }

    .date {
        font-size: 20px;
        color: lightslategray
    }

    tr, td {
        border-color: darkblue
    }
</style>

<center>

    <form action="index.php" method="post">
        <input type="text" name="date" placeholder="Iveskite datą">
        <input type="text" name="number" placeholder="Iveskite numerį">
        <input type="text" name="distance" placeholder="Iveskite atstumą">
        <input type="text" name="time" placeholder="Iveskite laiką">
        <input type="submit" value="Pridėti">
    </form>

    <form id="delform" action="index.php" method="post">
        <input type="submit" value="Trinti Pažymėtus" name="delete">
    </form>

    <form action="index.php" method="get">
        <input type="text" name="filtras" placeholder="Iveskite metus filtravimui">
        <input type="submit" value="Filtruoti">
    </form>

    <form action="index.php" method="get">
        <input type="text" name="filtras2" placeholder="Iveskite menesi filtravimui">
        <input type="submit" value="Filtruoti">
    </form>


    <form action="index.php" method="get">
        <input type="submit" value="Automobiliai" name="veiksmas2">
    </form>


    <br>
    <?php
    /**
     * Created by PhpStorm.
     * User: Vartotojas
     * Date: 2018.04.30
     * Time: 19:00
     */

    include 'db.php';

    $filtras = $_GET['filtras'] ? $filtras = $_GET['filtras'] : $filtras = $_POST['filtras'];
    $filtras2 = $_GET['filtras2'] ? $filtras2 = $_GET['filtras2'] : $filtras2 = $_POST['filtras2'];
    $date = $_POST['date'];
    $distance = $_POST['distance'];
    $number = $_POST['raides'] . $_POST['skaiciai'];
    $time = $_POST['time'];
    $id = $_POST['id'];
    $offsetas = $_GET['offset'] ?? 0;
    $veiksmas = $_GET['veiksmas'] ? $veiksmas = $_GET['veiksmas'] : $veiksmas = $_POST['veiksmas'];
    $veiksmas2 = $_GET['veiksmas2'];
    $delete = $_POST['delete'];
    $kryptis = $_GET['kryptis'];
    $howmuch = 8;

    if ($date && $distance && $_POST['raides'] && $_POST['skaiciai'] && $time && !$id) {
        $qur = $connection->prepare('INSERT INTO radars(date,number,distance,time) VALUES(?,?,?,?)');
        $qur->bind_param("ssdd", $date, $number, $distance, $time);
        $qur->execute();
    }

    if ($date && $distance && $_POST['raides'] && $_POST['skaiciai'] && $time && $id && $veiksmas == 'Keisti') {

        $qur = $connection->prepare('UPDATE radars SET date=?, number=?, distance=?, time=? WHERE id=?');
        $qur->bind_param("ssddi", $date, $number, $distance, $time, $id);
        $qur->execute();
    } else if ($veiksmas == 'Trinti' && $id) {
        $qur = $connection->prepare('DELETE FROM radars WHERE id=?');
        $qur->bind_param("i", $id);
        $qur->execute();
    }

    if ($veiksmas2 == 'Automobiliai') {
        $sql = "SELECT number, COUNT(*) AS kiekis, MAX(distance/time*3.6) AS mgreitis, MIN(distance/time*3.6) AS migreitis, AVG (distance/time*3.6) AS agreitis FROM radars GROUP BY number LIMIT $howmuch OFFSET $offsetas";
        $sql2 = "SELECT number, COUNT(*) AS kiekis, MAX(distance/time*3.6) AS mgreitis, MIN(distance/time*3.6) AS migreitis, AVG (distance/time*3.6) AS agreitis FROM radars GROUP BY number  ";
    } else if ($filtras) {
        $sql = "SELECT id, date, SUBSTRING(number, 1, 3) AS raides, SUBSTRING(number,-3) AS skaiciai, distance, time, distance/time*3.6 as speed FROM radars WHERE YEAR(date)=$filtras LIMIT $howmuch OFFSET $offsetas";
        $sql2 = "SELECT * FROM radars  WHERE YEAR(date)=$filtras";
    } else if ($filtras2) {
        $sql = "SELECT id, date, SUBSTRING(number, 1, 3) AS raides, SUBSTRING(number,-3) AS skaiciai, distance, time, distance/time*3.6 as speed FROM radars WHERE MONTH(date)=$filtras2 LIMIT $howmuch OFFSET $offsetas";
        $sql2 = "SELECT * FROM radars  WHERE MONTH(date)=$filtras2";
    } else {
        $sql = "SELECT id, date, SUBSTRING(number, 1, 3) AS raides, SUBSTRING(number,-3) AS skaiciai, distance, time, distance/time*3.6 as speed FROM radars LIMIT $howmuch OFFSET $offsetas";
        $sql2 = "SELECT * FROM radars";
    }

    if ($delete) {

        for ($i = 0; $i < count($_POST['deleteItems']); $i++) {
            $item = (int)$_POST['deleteItems'][$i];
            $qur = $connection->prepare('DELETE FROM radars WHERE id=?');
            $qur->bind_param("i", $item);
            $qur->execute();
        }

    }

    if ($kryptis) {
        if ($kryptis == 'next') {
            $offsetas += $howmuch;
        } else if ($kryptis == 'prev') {
            $offsetas -= $howmuch;
        }
    }

    $sql3 = "SELECT COUNT(*) FROM radars";
    $kiekis = $connection->query($sql3);
    $sql4 = "SELECT MAX(distance/time*3.6) FROM radars";
    $sql5 = "SELECT MIN(distance/time*3.6) FROM radars";
    $maxas = $connection->query($sql4);
    $minas = $connection->query($sql5);

    if (!($result = $connection->query($sql))) {
        die ('Error :' . $connection->error);
    }

    if (!($result2 = $connection->query($sql2))) {
        die ('Error :' . $connection->error);
    }

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            if (!$veiksmas2) {
                $date = new DateTime($row['data']);
                echo '<input type="checkbox" form="delform" name="deleteItems[]" value=' . $row['id'] . '>';

                echo '<form action="index.php" method="POST">';

                echo
                    'id-' . $row['id'] . '  ' .
                    '<input name="date" value=' . $row['date'] . '>' .
                    '<input name="filtras" type="hidden" value=' . $filtras . '>' .
                    '<input name="filtras2" type="hidden" value=' . $filtras2 . '>' .
                    ' <input name="raides" value= ' . $row['raides'] . '>' .
                    ' <input name="skaiciai" value= ' . $row['skaiciai'] . '>' .
                    ' <input name="distance" value= ' . $row['distance'] . 'm.>' .
                    ' <input name="time" value= ' . $row['time'] . 's.>' .
                    ' <input name="speed" value= ' . round($row['speed'], 2) . 'km/h>' .
                    '<input type="hidden" name="id" value= ' . $row['id'] . '>' .
                    ' <input type="submit" name="veiksmas" value="Keisti">' .
                    ' <input type="submit" name="veiksmas" value="Trinti">' .
                    '<br>';

                echo '</form>';

            } else {
                echo "Numeris: " . $row['number'] . "<br>";
                echo "Kiekis: " . $row['kiekis'] . "<br>";
                echo "Didžiausias greitis: " . round($row['mgreitis'], 2) . "<br>";
                echo "Mažiausias greitis: " . round($row['migreitis'], 2) . "<br>";
                echo "Vidutinis greitis: " . round($row['mgreitis'], 2) . "<br>";
                echo "<br>";
            }
        }

        if (!$veiksmas2) {
            if ($offsetas < $result2->num_rows - $howmuch) {
                echo '<a href="?kryptis=next&offset=' . $offsetas . '&veiksmas=' . $veiksmas . '">Pirmyn</a><br>';
            }

            if ($offsetas != 0) {
                echo '<a href="?kryptis=prev&offset=' . $offsetas . '&veiksmas=' . $veiksmas . '">Atgal</a>';
            }


            if ($kiekis->num_rows > 0) {
                $kiek = $kiekis->fetch_row();
                echo '<br>';
                echo "Įrašų kiekis: " . $kiek[0];
            }

            if ($maxas->num_rows > 0) {
                $kiek = $maxas->fetch_row();
                echo '<br>';
                echo "Didžiausias greitis: " . $kiek[0];
            }

            if ($minas->num_rows > 0) {
                $kiek = $minas->fetch_row();
                echo '<br>';
                echo "Mažiausias greitis: " . $kiek[0];
            }
        } else {
            if ($offsetas < $result2->num_rows - $howmuch) {
                echo '<a href="?kryptis=next&offset=' . $offsetas . '&veiksmas2=' . $veiksmas2 . '">Pirmyn</a><br>';
            }

            if ($offsetas != 0) {
                echo '<a href="?kryptis=prev&offset=' . $offsetas . '&veiksmas2=' . $veiksmas2 . '">Atgal</a>';
            }
        }

    }

    $connection->close();

    ?>


</center>

