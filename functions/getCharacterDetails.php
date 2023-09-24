<?php
include_once('./dbConnect.php');

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    // Query the database to get additional details based on the character name
    // $sql = "SELECT * FROM `character-stats` WHERE Name = '$name'";
    $sql = "SELECT * FROM `character-stats` LEFT JOIN weightclass ON `character-stats`.WeightClassId = weightclass.Id WHERE Name = '$name'";
    $result = $conn->query($sql);

    $details = "";
    if ($result->num_rows > 0) {
        $record = mysqli_fetch_assoc($result);

        $weightclassname = $record['weightClassName'];
        $speed = $record['Speed'];
        $acceleration = $record['Acceleration'];
        $weight = $record['Weight'];
        $handling = $record['Handling'];
        $traction = $record['Traction/Grip'];
        $miniTurbo = $record['Mini-Turbo'];

        $characterImg = $record['characterImg'];
        $img = "./media/img/character-portraits/$characterImg";

        $details .= "   <p>Weight class: $weightclassname<p>
                        <img src='$img' alt='$name' width='130'>
                        <p>Speed: $speed</p>
                        <p>Acceleration: $acceleration</p>                
                        <p>Weight: $weight</p>                
                        <p>Handling: $handling</p>                
                        <p>Traction/Grip: $traction</p>                
                        <p>Mini Turbo: $miniTurbo</p>  
        ";
        echo $details;
    } else {
        echo "Character not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
