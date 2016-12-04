$(document).ready(function() {
    reload();
});

function reload()
		{		
            $.getJSON( "getStats.php", function( json ) {
                
                $("#CPU").html(json[0].cpu + "%");
                $("#CPUbar").children(0).css("width",json[0].cpu + "%");
                
                $("#RAM").html(json[0].ram[1] + "%");
                $("#RAMbar").children(0).css("width",json[0].ram[0] + "%");
                
                $("#HDD").html(json[0].hdd + "%");
                $("#HDDbar").children(0).css("width",json[0].hdd + "%");
                
                setTimeout(reload,1000);
                    });
			
			
		};