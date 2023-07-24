<?php
include_once("./functions/dbConnect.php");

$sql = "SELECT * FROM `character-stats` LEFT JOIN weightclass ON `character-stats`.WeightClassId = weightclass.Id";
$result = $conn->query($sql);

$records = "";
$counter = 0;

while ($record = mysqli_fetch_assoc($result)) {

    $counter++;
    $characterImg = $record['characterImg'];
    $name = $record['Name'];
    $speed = $record['Speed'];
    $acceleration = $record['Acceleration'];
    $weight = $record['Weight'];
    $handling = $record['Handling'];
    $traction = $record['Traction/Grip'];
    $miniTurbo = $record['Mini-Turbo'];

    $img = "./media/img/character-portraits/$characterImg";

    $records .= "<tr>
                    <td>$counter</td>
                    <td>$name</td>
                    <td><img src='$img' alt='$name' width='100'></td>
                    <td>$speed</td>
                    <td>$acceleration</td>
                    <td>$weight</td>
                    <td>$handling</td>
                    <td>$traction</td>
                    <td>$miniTurbo</td>
                </tr>";
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
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Picture</th>
            <th>Speed</th>
            <th>Acceleration</th>
            <th>Weight</th>
            <th>Handling</th>
            <th>Traction/Grip</th>
            <th>Mini-Turbo</th>
        </tr>
        <?= $records ?>
    </table>
</body>

</html>