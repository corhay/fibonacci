<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, origin");
header('Content-Type: text/plain');

include_once('./fibo.php');

//send fibonacci sequence as response
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $data = json_decode(file_get_contents('php://input'), true)["data"];

    $iterrations = $data["number"];
    $fibo = new fibonacci();
    $response = $fibo->sendSequence($iterrations);
} else{
    echo "You've found the php server hehe.";
    return;
}

echo json_encode($response);

?>