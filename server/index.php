<?php
include_once('./fibo.php');

//send fibonacci sequence as response
if($_SERVER["REQUEST_METHOD"] == "POST"){

	//read max value sent from client
    $data = json_decode(file_get_contents('php://input'), true)["data"];

	//get appropriate sequence through an instance of the fibo class
    $iterrations = $data["number"];
    $fibo = new fibonacci();

    $response = $fibo->sendSequence($iterrations);

} else{
    //redirect to client url
    header("Location: ../../dist");
}
//parse response to json
echo json_encode($response);

?>