<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

header('Content-Type: application/json; charset=utf-8');

$host = "localhost";
$db = "csy9xheu8_lmh_hx3_hold1_dk";
$user = "csy9xheu8_lmh_hx3_hold1_dk";
$pass = "HAgW0nGAMkx";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    echo json_encode([
        "status" => "error",
        "message" => "Forbindelsen til databasen mislykkedes"
    ]);
    exit;
}
//Her henter jeg chat-id'et fra url'en fx. hvis javascript sender hent_beskeder.php?chat_id=1
//Så bliver chat_id = 1
$chat_id = $_GET['chat_id'] ?? null;

if (!$chat_id) {
    echo json_encode([
        "status" => "error",
        "message" => "Mangler chat_ID"
    ]);
    exit;
}

$sql ="SELECT
        VWV_Beskeder.id,
        VWV_Beskeder.besked,
        VWV_Beskeder.tidspunkt,
        VWV_Brugere.navn
    FROM VWV_Beskeder
    /*Her forbinder jeg de 2 tabeller ved at bruge brugerens ID 
    Så databasen kan hente beskedens tekst fra VWV_Beskeder og afsenderens navn fra VWV_Brugere*/
    JOIN VWV_Brugere
    ON VWV_Beskeder.afsender_id = VWV_Brugere.id
    WHERE VWV_Beskeder.chat_id = ?
    ORDER BY VWV_Beskeder.tidspunkt ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $chat_id);
$stmt->execute();
$resultat = $stmt->get_result();
$beskeder = [];
//Her henter jeg alle beskeder og hver besked der er tilføjes til arrayet $beskeder
while ($raekke = $resultat->fetch_assoc()) {
    $beskeder[] = $raekke;
}

//Resultaet omdannes til JSON sådan Javascript kan bruge det
echo json_encode([
    "status" => "success",
    "beskeder" => $beskeder
]);

$stmt->close();
$conn->close();

?>
