<?php include_once('./statsServ.php'); 

function rep_json($data) {
    header('Content-Type: application/json');
	echo json_encode($data);
}

$data[] = array(
    'cpu'             => getCpuLoad(),
    'ram'          => getRamUsage(),
    'hdd'         => getHDDUsage());

rep_json($data);