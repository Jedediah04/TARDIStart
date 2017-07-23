<?php

function get_json(){
	$json = file_get_contents('../settings/theme.json');
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
  

  
if ($value == 'new') {
	$data=get_json();
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
		$data = get_json();
		if($id[0] == "focusTheme"){
			$data[focusTheme] = $value;
		}
		else if($id[1] == "background"){
			$data[theme][$id[0]][background][$id[2]] = $value;
		}
		else{
			$data[theme][$id[0]][$id[1]] = $value;
		}
		set_json($data);	
	}
}

?>
