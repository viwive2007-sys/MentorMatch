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

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['besked']) && isset($data['chat_id'])) {

    $besked = $data['besked'];
    $chatId = $data['chat_id'];

    $afsenderId = 2;

    $sql = "INSERT INTO VWV_Beskeder (chat_id, afsender_id, besked, tidspunkt)
            VALUES (?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        //iis betyder de første to er int og sidste er string
        $stmt->bind_param("iis", $chatId, $afsenderId, $besked);

        if ($stmt->execute()) {
            echo json_encode([
                "status" => "success",
                "message" => "Besked gemt!"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Kunne ikke gemme beskeden"
            ]);
        }

        $stmt->close();

    } else {
        echo json_encode([
            "status" => "error",
            "message" => "SQL-forespørgslen kunne ikke oprettes"
        ]);
    }

} else {
    echo json_encode([
        "status" => "error",
        "message" => "Manglende besked eller chat-ID"
    ]);
}

$conn->close();
?>