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
    // RAM USAGE
    $data = explode("\n", file_get_contents("/proc/meminfo"));
    $meminfo = array();
    foreach ($data as $line) {
        list($key, $val) = explode(":", $line);
        $meminfo[$key] = trim($val);
    }
    $totalRAM = $meminfo[MemTotal];
    $totalRAM=ereg_replace("[^0-9]","",$totalRAM);
    $cachedRAM = $meminfo[Cached];
    $cachedRAM=ereg_replace("[^0-9]","",$cachedRAM);
    $free=$totalRAM-$cachedRAM;
    $used = $totalRAM-$free;
    $percent = ($used/$totalRAM)*100;
    return [$percent, round($percent,0)];
}

function getHDDUsage() { 
    $ddfree = disk_free_space("/home"); 
    $ddtotal = disk_total_space("/home"); 
    $freeHDD = $ddtotal - $ddfree; 
    $percentHDD = ($freeHDD/$ddtotal)*100; 
    return round($percentHDD,0); 
}
