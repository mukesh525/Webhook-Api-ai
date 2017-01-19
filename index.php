<?php
header('Content-Type: application/json');
ob_start();

$APIAI_KEY = 'bebc60c81ace47e3a6a684c41d8b9bb4';
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
 
$id=$obj['id'].PHP_EOL;
$time=$obj['timestamp'].PHP_EOL;
$message=$obj['result']['resolvedQuery'].PHP_EOL;

$myFile = "testFile.txt";
$fh = fopen($myFile, 'a+') or die("can't open file");
fwrite($fh, $message);
fclose($fh);
ob_end_clean();

$data3 = array(
    "contextOut" =>array(array("name" => "$next-context",
    "parameters" => array("param1" => "$param1value", "param2" => "$param2value"))),
    "speech"=> "Please give us your number so that we can reach you",
    "source"=> "apiai-weather-webhook-sample",
    "displayText"=> "Please give us your number so that we can reach you"
  );
$json1 = json_encode($obj);
///fwrite($fh, $json1);
//fclose($fh);
//ob_end_clean();
echo json_encode($data3);
?>

