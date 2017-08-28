<?php

function get_json($JSONFile){
	$json = file_get_contents($JSONFile);
	$data = json_decode($json, true);
	return $data;
}

function set_json($data) {
	$item = json_encode($data);
	file_put_contents('../settings/shortcut.json', $item);
}

$value = (isset($_POST['value'])) ? $_POST['value'] : ""; //value posted
$id = (isset($_POST['id'])) ? $_POST['id'] : ""; //id of the element
$id = explode("_",$id);

$data = get_json('../settings/shortcut.json');


#Add or edit
$data[$id[0]]["id"] = $id[0];
$data[$id[0]][$id[1]] = $value;

#Delete
if ($value == NULL AND $id != NULL){
	$link = $data[$id[0]]["link"];
	$shortcut = $data[$id[0]]["shortcut"];
	
	if($link == NULL && $shortcut == NULL){
		unset($data[$id[0]]);
	}
}

set_json($data);

?>
