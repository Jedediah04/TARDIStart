<?php

function getUpTime() {
    // UPTIME
    exec("uptime", $system); // get the uptime stats
    $string = $system[0]; // this might not be necessary
    $uptime = explode(" ", $string); // break up the stats into an array
    $up_days = $uptime[3]; // grab the days from the array
    $hours = explode(":", $uptime[6]); // split up the hour:min in the stats
    $up_hours = $hours[0]; // grab the hours
    $mins = $hours[1]; // get the mins
    $up_mins = str_replace(",", "", $mins); // strip the comma from the mins
    return [$up_days, $up_hours, $up_mins];
}

function getCpuLoad() {
    // CPU USAGE
    $loads = sys_getloadavg();
    $core_nums = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
    $load = round($loads[0]/($core_nums + 1)*100, 0);
    return $load;
}

function getRamUsage() {
    $free    = shell_exec('grep MemFree /proc/meminfo | awk \'{print $2}\'');
    $buffers = shell_exec('grep Buffers /proc/meminfo | awk \'{print $2}\'');
    $cached  = shell_exec('grep Cached /proc/meminfo | awk \'{print $2}\'');
    $free = (int)$free + (int)$buffers + (int)$cached;
	$total = shell_exec('grep MemTotal /proc/meminfo | awk \'{print $2}\'');
	$used = $total - $free;
    $percent_used = 100 - (round($free / $total * 100));
    return [$percent_used, round($percent_used,0)];
}

function getHDDUsage() { 
    $ddfree = disk_free_space("/home"); 
    $ddtotal = disk_total_space("/home"); 
    $freeHDD = $ddtotal - $ddfree; 
    $percentHDD = ($freeHDD/$ddtotal)*100; 
    return round($percentHDD,0);
}

function getLatency() {
	$ipAddress = $_SERVER["REMOTE_ADDR"];
	$timeStart =  microtime(true);
	exec("ping ".$ipAddress." -w 0.25 -c 1");
	$timeEnd = microtime(true);
	$latency = intval(($timeEnd - $timeStart)*1000);
	if($latency >= 250)
	{
		$latency = 250;
	}
	return [$latency*100/250, $latency];
}



switch ($_GET['function']){
	case getCpuLoad:
		echo getCpuLoad();
	break;
	
	case getRamUsage:
		echo getRamUsage()[0];
	break;
	
	case getRamUsageBar:
		echo getRamUsage()[1];
	break;
	
	case getHDDUsage:
		echo getHDDUsage();
	break;
	
	case getLatencyBar:
		echo getLatency()[0];
	break;
	
	case getLatency:
		echo getLatency()[1];
	break;
	
	case getHDDUsage:
		getHDDUsage();
	break;
}


?>
