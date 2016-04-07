setInterval(function() {
		
	//Refresh the CPU load
	$.get( "./statsServ.php?function=getCpuLoad", function(data) {
		$('.CPUMonitoring').text(data+"%");
		$('#CPUbar .ui-progress').css("width", data+"%");
	});

	//Refresh the RAM usage
	$.get( "./statsServ.php?function=getRamUsage", function(data) {
		$('.RAMMonitoring').text(data+"%");
	});

	//Refresh the RAM bar
	$.get( "./statsServ.php?function=getRamUsageBar", function(data) {
		$('#RAMbar .ui-progress').css("width", data+"%");
	});
		
	//Refresh the Latency
	$.get( "./statsServ.php?function=getLatency", function(data) {
		$('.LatencyMonitoring').text(data+" ms");
	});

	//Refresh the Latency bar
	$.get( "./statsServ.php?function=getLatencyBar", function(data) {
		$('#Latencybar .ui-progress').text(data);
		$('#Latencybar .ui-progress').css("width", data+"%");
	});
		
	//Refresh the HDD load
	$.get( "./statsServ.php?function=getHDDUsage", function(data) {
		$('.HDDMonitoring').text(data+"%");
		$('#HDDbar .ui-progress').css("width", data+"%");
	});
}, 1000);
