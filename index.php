<?php
include_once("./functions/dbConnect.php");

$showDetails = isset($_GET["details"]);
$sql = "SELECT * FROM `character-stats` LEFT JOIN weightclass ON `character-stats`.WeightClassId = weightclass.Id";
$result = $conn->query($sql);

$records = "";
$counter = 0;

while ($record = mysqli_fetch_assoc($result)) {

    $counter++;
    $characterImg = $record['characterImg'];
    $name = $record['Name'];
    $img = "./media/img/character-portraits/$characterImg";

    if ($showDetails == TRUE) {
        $speed = $record['Speed'];
        $acceleration = $record['Acceleration'];
        $weight = $record['Weight'];
        $handling = $record['Handling'];
        $traction = $record['Traction/Grip'];
        $miniTurbo = $record['Mini-Turbo'];

        $extraDetailTr = "<th bgcolor='DodgerBlue'>Speed</th>
                            <th bgcolor='Gray'>Acceleration</th>
                            <th bgcolor='MediumSeaGreen'>Weight</th>
                            <th bgcolor='Orange'>Handling</th>
                            <th bgcolor='Tomato'>Traction/Grip</th>
                        <th bgcolor='SlateBlue'>Mini-Turbo</th>";

        $records .= "<tr>
                        <td>$counter</td>
                        <td>$name</td>
                        <td><img src='$img' alt='$name' width='130'></td>
                        <td bgcolor='DodgerBlue'>$speed</td>
                        <td bgcolor='Gray'>$acceleration</td>
                        <td bgcolor='MediumSeaGreen'>$weight</td>
                        <td bgcolor='Orange'>$handling</td>
                        <td bgcolor='Tomato'>$traction</td>
                        <td bgcolor='SlateBlue'>$miniTurbo</td>
                    </tr>";
    } else {
        $extraDetailTr = "";
        $records .= "<tr>
                    <td>$counter</td>
                    <td>$name</td>
                    <td><img src='$img' alt='$name' width='130'></td>
                </tr>";
    }
}

$conn->close();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Character List</title>
    <style>
        /* Add some basic styling for the table */
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Character List</h2>
    <?php
    $buttonText = $showDetails ? "No More Detail" : "Extra Detail";
    $toggleUrl = $showDetails ? "./index.php" : "./index.php?details=1";
    ?>

    <a href="<?= $toggleUrl ?>"><button><?= $buttonText ?></button></a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Picture</th>
            <?= $extraDetailTr ?>
        </tr>
        <?= $records ?>
    </table>
</body>

</html>