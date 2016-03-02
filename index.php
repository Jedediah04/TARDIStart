<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<title>Start - T.A.R.D.I.S.</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/ressources/style.css">
	<link rel="icon" type="ico" href="/ressources/img/tardis.ico">
	<meta name="viewport" content="width=device-width">
	<script src='/ressources/jquery.min.js'></script>
	
	<!-- background aléatoire -->
	<?php
		  $bg = array('bg1.jpg', 'bg2.jpg', 'bg3.jpg'); // liste des images
		  $i = rand(0, count($bg)-1); // génération d'un nombre aléatoire
		  $selectedBg = $bg[$i]; // ajout du nom de l'image pour inclusion CSS
	?>

	<!-- CSS dans header pour backgroud aléatoire -->
	<style type="text/css">
		html, body{
			margin: 0; padding: 0;
			width: 100%; height: 95%;
			font-family: "Droid Sans", "Liberation Sans", "DejaVu Sans", "Segoe UI", Sans-Serif; font-size: 10pt;
			background: #EAEAEA;
			background: url('./ressources/img/<?php echo $selectedBg; ?>') no-repeat;
			color: #ffffff;
			-webkit-background-size: 100%;
			-moz-background-size: 100%;
			-o-background-size: 100%;
			background-size: 100%;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			width: 100%;
			background-attachment: fixed;
			background-position: center center;
			padding-bottom: 0px;
			margin-bottom: 0px;
		}
	</style>
</head>

<body onload="javascript:init();">
	<!-- particles.js container -->
	<div id="particles-js"></div>
	
	<!-- scripts particles -->
	<script src="/ressources/particles.js/particles.js"></script>
	<script src="/ressources/particles.js/app.js"></script>

	<!-- contenu -->
	<div class="center">
		<div class="content" id="form" style="top: 0px; opacity: 1;">
			<!-- logo -->
			<div id="logotop"></div>
			<!-- recherche -->
			<span class="fa fa-search"></span>
			<input type="text" id="q" value="" placeholder="Allons-y..." onkeypress="javascript:handleQuery(event,this.value);" onfocus="this.value=this.value" />
			<br>
			
			<?php
				// CPU USAGE
				$loads = sys_getloadavg();
				$core_nums = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
				$load = round($loads[0]/($core_nums + 1)*100, 2);
				echo 'CPU : '.$load.'% ';
				
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
				echo ' | RAM : '.round((($free/1024)/1024),2).' Go ';
				
				// HDD USAGE
				$bytes = disk_free_space("."); 
				$si_prefix = array( 'o', 'Ko', 'Mo', 'Go', 'To', 'EB', 'ZB', 'YB' );
				$base = 1024;
				$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
				$used = sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
				$totalRAM=ereg_replace("[^0-9]","",$used); 
				$bytes = disk_total_space("."); 
				$si_prefix = array( 'o', 'Ko', 'Mo', 'Go', 'To', 'EB', 'ZB', 'YB' );
				$base = 1024;
				$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
				$total = sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
				$totalRAM=ereg_replace("[^0-9]","",$total); 
				$used = $total - $used;
				echo ' | HDD : '.$used.' Go ';
				
				// UPTIME
				exec("uptime", $system); // get the uptime stats 
				$string = $system[0]; // this might not be necessary 
				$uptime = explode(" ", $string); // break up the stats into an array 
				$up_days = $uptime[3]; // grab the days from the array 
				$hours = explode(":", $uptime[7]); // split up the hour:min in the stats 
				$up_hours = $hours[0]; // grab the hours 
				$mins = $hours[1]; // get the mins 
				$up_mins = str_replace(",", "", $mins); // strip the comma from the mins 
				echo " |  UP : " . $up_days . " JOURS ";
			?>
			
			<!-- liens -->
			<!-- voir http://fontawesome.io/icons/ pour le nom des icones -->
			<div id="links">
				<a class="item" href="https://domain.tld/rutorrent" TITLE="ruTorrent">
					<span class="fa fa-download"></span>
					<div id="lien">ruTorrent</div>
				</a>
				<a class="item" href="https://app.plex.tv" TITLE="Plex">
					<span class="fa fa-play-circle-o"></span>
					<div id="lien">Plex</div>
				</a>
				<a class="item" href="https://domain.tld/sickrage/" TITLE="Sickrage">
					<span class="fa fa-television"></span>
					<div id="lien"> Sickrage</div>
				</a>
				<a class="item" href="https://domain.tld/app/glype" TITLE="Proxy">
					<span class="fa fa-globe"></span>
					<div id="lien">Proxy</div>
				</a>
				<a class="item" href="https://webmail.domain.tld" TITLE="Rainloop">
					<span class="fa fa-envelope"></span>
					<div id="lien"> Rainloop</div>
				</a>
				<a class="item" href="https://cloud.domain.tld" TITLE="ownCloud">
					<span class="fa fa-cloud"></span>
					<div id="lien">ownCloud</div>
				</a>
				<br>
				<br>
				<a href="https://img.domain.tld/" TITLE="Lutim">
					<span class="fa fa-file-image-o"></span>
					<div id="lien">Lutim</div>
				</a>
				<a href="https://file.domain.tld/" TITLE="Lufi">
					<span class="fa fa-file-o"></span>
					<div id="lien">Lufi</div>
				</a>
				<a href="https://domain.tld/app/paste" TITLE="ZeroBin">
					<span class="fa fa-file-text-o"></span>
					<div id="lien">Paste</div>
				</a>
				<a href="https://rss.domain.tld/" TITLE="Selfoss">
					<span class="fa fa-rss-square"></span>
					<div id="lien">Selfoss</div>
				</a>
				<a href="https://codiad.domain.tld" TITLE="Codiad">
					<span class="fa fa-file-code-o"></span>
					<div id="lien">Codiad</div>
				</a>
				<a href="https://shield.domain.tld" TITLE="LibreNMS">
					<span class="fa fa-bar-chart"></span>
					<div id="lien">SHIELD</div>
				</a>
			</div>
		</div>
	</div>
	
	<!-- script recherche -->
    <script src="/ressources/start.js"></script>
</body>
</html>
