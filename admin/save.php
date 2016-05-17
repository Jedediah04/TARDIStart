<?php

function get_json(){
	$json = file_get_contents('./service.json');
	$data = json_decode($json, true);
	return $data;
}
function set_json($data) {
	$item = json_encode($data,JSON_PRETTY_PRINT);
	file_put_contents('./service.json', $item);
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
        if ($id[0] == 'liens'){
            $data=get_json();
            $data[dashboard][$id[1]][menus][$id[2]][$id[3]]=$value;
            set_json($data);
        }
        else if($id[0] == 'menu'){
            $data=get_json();
            $data[dashboard][$id[1]][nom]=$value;
            set_json($data);
        }
            
	}
}

?>
