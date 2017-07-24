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
  

  
if ($value == 'new') {
	$data=get_json('../settings/service.json');
	$last=end($data);
	$last_id=$last['id'];
	$data[] = array(
    'id'             => ++$last_id,
    'color'          => '',
    'titre'         => '',
    'lien'          => '',
    'icone'           => '');
    set_json($data);
}
else {
	if (isset($_POST['value']) AND isset($_POST['id'])) {
		$data = get_json('../settings/service.json');
		$data[$id[0]][$id[1]] = $value;
		set_json($data);		
	}
}

?>
