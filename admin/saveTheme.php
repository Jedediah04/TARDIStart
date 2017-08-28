<?php

function get_json($JSONFile){
	$json = file_get_contents($JSONFile);
	$data = json_decode($json, true);
	return $data;
}

function set_json($data) {
	$item = json_encode($data);
	file_put_contents('../settings/theme.json', $item);
}

$value = (isset($_POST['value'])) ? $_POST['value'] : ""; //value posted
$id = (isset($_POST['id'])) ? $_POST['id'] : ""; //id of the element
$id = explode("_",$id);

$data = get_json('../settings/theme.json');


if($id[0] == "focusTheme"){
	$data[focusTheme] = $value;
}
else if($id[1] == "background"){
	#Add or editt
	$data[theme][$id[0]][background][$id[2]] = $value;

	#Delete
	if($value == NULL){
		unset($data[theme][$id[0]][background][$id[2]]);
	}
}
else{
	#Add or edit
	$data[theme][$id[0]]["id"] = $id[0];
	$data[theme][$id[0]][$id[1]] = $value;

	$name = $data[theme][$id[0]][name];
	$icon = $data[theme][$id[0]][icon];
	$title = $data[theme][$id[0]][title];
	$titleImage = $data[theme][$id[0]][titleImage];
	$background = $data[theme][$id[0]][background];

	#Delete
	if($name == NULL && $icon == NULL && $title == NULL && $titleImage == NULL && $background == NULL){
		unset($data[theme][$id[0]]);
	}
}

set_json($data);

?>
