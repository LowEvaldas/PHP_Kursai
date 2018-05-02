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

        <input type="text" name="marke" placeholder="Iveskite markę">
        <input type="text" name="modelis" placeholder="Iveskite modelį">
        <input type="text" name="data" placeholder="Iveskite datą">
        <input type="submit" placeholder="SUBMIT">

    </form>


    <?php
    /**
     * Created by PhpStorm.
     * User: Vartotojas
     * Date: 2018.04.30
     * Time: 19:00
     */

    include 'db.php';

    $marke = $_POST['marke'];
    $modelis = $_POST['modelis'];
    $data = $_POST['data'];
    $id = $_POST['id'];
    $offsetas = $_GET['offset'] ?? 0;
    $kryptis = $_GET['kryptis'];
    $howmuch = 8;

    if ($marke && $modelis && $data) {
        $qur = $connection->prepare('INSERT INTO automobilis(marke,modelis,data) VALUES(?,?,?)');
        $qur->bind_param("sss", $marke, $modelis, $data);
        $qur->execute();
    }

    if ($marke && $modelis && $id) {
        $qur = $connection->prepare('UPDATE automobilis SET marke=?, modelis=? WHERE id=?');
        $qur->bind_param("ssi", $marke, $modelis, $id);
        $qur->execute();
    }

    if ($kryptis) {
        if ($kryptis == 'next') {
            $offsetas += $howmuch;
        } else if ($kryptis == 'prev') {
            $offsetas -= $howmuch;
        }
    }

    $sql = "SELECT * FROM automobilis LIMIT $howmuch OFFSET $offsetas";
    $sql2 = "SELECT * FROM automobilis";

    if (!($result = $connection->query($sql))) {
        die ('Error :' . $connection->error);
    }

    if (!($result2 = $connection->query($sql2))) {
        die ('Error :' . $connection->error);
    }

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $date = new DateTime($row['data']);
            echo '<form action="index.php" method="POST">';

            echo '<input name="marke" value=' . $row['marke'] . '>' .
                ' <input name="modelis" value= ' . $row['modelis'] . '>' .
                '<input type="hidden" name="id" value= ' . $row['id'] . '>' .
                ' <input type="submit" value="Keisti">' . '<br>';

            echo '</form>';
        }

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

