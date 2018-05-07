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

    tr, td, th {
        border-color: dodgerblue ;
        text-align: center;
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

    <form id="table" action="index.php" method="POST">

    </form>

    <?php
    /**
     * Created by PhpStorm.
     * User: Vartotojas
     * Date: 2018.04.30
     * Time: 19:00
     */

    include 'db.php';

    $date = $_POST['date'];
    $distance = $_POST['distance'];
    $number = $_POST['number'];
    $time = $_POST['time'];
    $id = $_POST['id'];
    $offsetas = $_GET['offset'] ?? 0;
    $veiksmas = $_POST['veiksmas'];
    $delete = $_POST['delete'];
    $kryptis = $_GET['kryptis'];
    $howmuch = 8;


    $trintivisus = $_GET['trin'];


    var_dump($_POST);

    function delItems($id)
    {

    }


    if ($date && $distance && $number && $time ) {
        $qur = $connection->prepare('INSERT INTO radars(date,number,distance,time) VALUES(?,?,?,?)');
        $qur->bind_param("ssdd", $date, $number, $distance, $time);
        $qur->execute();
    }

    if ($date && $distance && $number && $time && $id && $veiksmas == 'Keisti') {

        $qur = $connection->prepare('UPDATE radars SET date=?, number=?, distance=?, time=? WHERE id=?');
        $qur->bind_param("ssddi", $date, $number, $distance, $time , $id);
        $qur->execute();
    }

    if ($veiksmas == 'Trinti' && $id){
        $qur = $connection->prepare('DELETE FROM radars WHERE id=?');
        $qur->bind_param("i",  $id);
        $qur->execute();
    }


    if ( $delete){

        for ($i=0; $i < count($_POST['deleteItems']); $i++){
            $item = (int)$_POST['deleteItems'][$i];
            $qur = $connection->prepare('DELETE FROM radars WHERE id=?');
            $qur->bind_param("i",  $item);
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

    $sql = "SELECT id, date, number, distance, time, distance/time*3.6 as speed FROM radars LIMIT $howmuch OFFSET $offsetas";
    $sql2 = "SELECT * FROM radars";

    if (!($result = $connection->query($sql))) {
        die ('Error :' . $connection->error);
    }

    if (!($result2 = $connection->query($sql2))) {
        die ('Error :' . $connection->error);
    }

    if ($result->num_rows > 0) {

        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Id</th><th>Check</th><th>Date</th><th>Number</th><th>Distance(m)</th><th>Time(s)</th><th>Speed(km/h)</th> <th colspan="2">Actions</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {

            $date = new DateTime($row['data']);

            echo
                '<tr><td>' . $row['id'] . '</td> ' .
                '<td><input type="checkbox" form="delform" name="deleteItems[]" value=' . $row['id']   . '></td>' .
                '<td><input form="table" name="date" value=' . $row['date'] . '></td>' .
                ' <td><input form="table" name="number" value= ' . $row['number'] . '></td>' .
                ' <td><input form="table" name="distance" value= ' . $row['distance'] . '></td>' .
                ' <td><input form="table" name="time" value= ' . $row['time'] . '></td>' .
                ' <td><input form="table" name="speed" value= ' . round($row['speed'],2) . '></td>' .
                '<input form="table" type="hidden" name="id" value= ' . $row['id'] . '>' .
                ' <td><input type="submit" form="table" name="veiksmas" value="Keisti"></td>' .
                ' <td> <input type="submit" form="table" name="veiksmas" value="Trinti"></td></tr>';

        }

        echo '</table>';


        if ($offsetas < $result2->num_rows - $howmuch) {
            echo '<a href="index.php?kryptis=next&offset=' . $offsetas . '">Pirmyn</a><br>';
        }

        if ($offsetas != 0) {
            echo '<a href="index.php?kryptis=prev&offset=' . $offsetas . '">Atgal</a>';
        }

    }

    $connection->close();

    ?>


</center>

