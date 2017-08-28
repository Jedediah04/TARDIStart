<?php

function get_json($JSONFile){
	$json = file_get_contents($JSONFile);
	$data = json_decode($json, true);
	return $data;
}

function set_json($data) {
	$item = json_encode($data);
	file_put_contents('../settings/service.json', $item);
}

$value = (isset($_POST['value'])) ? $_POST['value'] : ""; //value posted
$id = (isset($_POST['id'])) ? $_POST['id'] : ""; //id of the element
$id = explode("_",$id);

$data = get_json('../settings/service.json');

#Add or edit
$data[$id[0]]["id"] = $id[0];
$data[$id[0]][$id[1]] = $value;

set_json($data);

?>
