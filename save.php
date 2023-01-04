<?php


print_r($_POST);


$contactArr = [];
$fileName = 'contact_list.json';
if(file_exists($fileName)){
    $contactArr = json_decode(file_get_contents($fileName),true);
}
$data = $_POST;
$data['id'] = rand(1,999);

array_push($contactArr,$data);

$json = json_encode($contactArr);

$stream = fopen($fileName,"w");
fwrite($stream,$json);
fclose($stream);







