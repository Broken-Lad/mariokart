<?php
include_once("./functions/dbConnect.php");

$showDetails = isset($_GET["details"]);
$gridCount = isset($_GET["gridCount"]);
$sql = "SELECT * FROM `character-stats` LEFT JOIN weightclass ON `character-stats`.WeightClassId = weightclass.Id";
$result = $conn->query($sql);

$records = "";
$counter = 0;
$gridRecords = "";
$gridRequest = "";


while ($record = mysqli_fetch_assoc($result)) {

    $counter++;
    $characterImg = $record['characterImg'];
    $name = $record['Name'];
    $img = "./media/img/character-portraits/$characterImg";

    $gridRecords .= "<div class='grid-item'><img src='$img' alt='$name' width='130' data-bs-toggle='modal' data-bs-target='#characterModal' data-name='$name' data-img='$img'></div>";
}

if ($gridCount == TRUE) {
    $numberOfGrids = $_GET['gridCount'];

    while ($numberOfGrids > 0) {
        // from 20 onwards it is not stable
        $numberOfGrids--;
        $gridRequest .= "auto ";
    }
} else {
    $gridRequest = "auto auto auto auto auto auto auto auto";
}

$conn->close();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mario Kart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .grid-container {
            display: grid;
            grid-template-columns: <?= $gridRequest ?>;
            background-color: #2196F3;
            padding: 10px;
        }

        .grid-item {
            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Character List</h2>
    <div class="dropdown">
        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Amount of grids
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./index.php?gridCount=1">1</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=2">2</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=3">3</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=4">4</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=5">5</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=6">6</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=7">7</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=8">8</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=9">9</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=10">10</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=11">11</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=12">12</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=13">13</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=14">14</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=15">15</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=16">16</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=17">17</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=18">18</a></li>
            <li><a class="dropdown-item" href="./index.php?gridCount=19">19</a></li>
        </ul>

    </div>
    <!-- ?php
    $buttonText = $showDetails ? "No More Detail" : "Extra Detail";
    $toggleUrl = $showDetails ? "./index.php" : "./index.php?details=1";
    ?> -->

    <!-- <a href="?= $toggleUrl ?>"><button>?= $buttonText ?></button></a> -->

    <!-- <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Picture</th>
            ?= $extraDetailTr ?>
        </tr>
        ?= $records ?>
    </table> -->

    <div class="grid-container">
        <?= $gridRecords ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="characterModal" tabindex="-1" aria-labelledby="characterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="characterModalLabel">Character Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content will be dynamically loaded here -->
                </div>
            </div>
        </div>
    </div>
    
    <script src="./functions/functions.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>