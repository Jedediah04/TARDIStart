<?php

function get_json($file){
	$json = file_get_contents('settings/'.$file);
	$data = json_decode($json, true);
	return $data;
}
function set_json($data, $file) {
	$item = json_encode($data);
	file_put_contents('settings/'.$file, $item);
}

  $value = (isset($_POST['value'])) ? $_POST['value'] : ""; //value posted
  $id = (isset($_POST['id'])) ? $_POST['id'] : ""; //id of the element
  $id = explode("_",$id);
  

//Save personnal link
  
if ($value == 'new') {
	$data=get_json("service.json");
	$last=end($data);
	$last_id=$last['id'];
	$data[] = array(
    'id'             => ++$last_id,
    'color'          => '',
    'titre'         => '',
    'lien'          => '',
    'icone'           => '');
    set_json($data, "service.json");
}
else {
	if (isset($_POST['value']) AND isset($_POST['id'])) {
		$data=get_json("service.json");
		$data[$id[0]][$id[1]]=$value;
		set_json($data, "service.json");		
	}
}

?>