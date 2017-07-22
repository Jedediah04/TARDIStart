<?php

function getUpTime() {
    // UPTIME
    $data_uptime = file_get_contents('/proc/uptime');
    $data_uptime = explode(' ', $data_uptime);
    $data_uptime = trim($data_uptime[0]);
    $time = [];
    $time['min'] = $data_uptime / 60;
    $time['hours'] = $time['min'] / 60;
    $time['days'] = floor($time['hours'] / 24);
    $time['hours'] = floor($time['hours'] - $time['days'] * 24);
    $time['min'] = floor($time['min'] - $time['days'] * 60 * 24 - $time['hours'] * 60);
    $result = '';
        if ($time['days'] != 0) {
            $result = $time['days'] . ' jours ';
        }
        if ($time['hours'] != 0) {
            $result .= $time['hours'] . ' h ';
        }
        $result .= $time['min'] . ' min';
        return $result;
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
