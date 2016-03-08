<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<title>Start - T.A.R.D.I.S.</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="icon" type="ico" href="./assets/img/tardis.ico">
	<link rel="stylesheet" href="./assets/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<meta name="viewport" content="width=device-width">
	<script src='/ressources/jquery.min.js'></script>
	
	<!-- background aléatoire -->
	<?php
		  $bg = array('bg1.jpg', 'bg2.jpg', 'bg3.jpg'); // liste des images
		  $i = rand(0, count($bg)-1); // génération d'un nombre aléatoire
		  $selectedBg = $bg[$i]; // ajout du nom de l'image pour inclusion CSS
	?>

	<!-- CSS dans header pour background aléatoire -->
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
	<script src="/ressources/particles/particles.js"></script>
	<script src="/ressources/particles/app.js"></script>

	<?php	
		// UPTIME
		exec("uptime", $system); // get the uptime stats 
		$string = $system[0]; // this might not be necessary 
		$uptime = explode(" ", $string); // break up the stats into an array 
		$up_days = $uptime[3]; // grab the days from the array 
	?>

	<!-- contenu -->
	<div class="center">
		<div class="content" id="form" style="top: 0px; opacity: 1;">
			<!-- logo -->
			<div id="logotop"></div>
			<!-- recherche -->
			<span class="fa fa-search"></span>
			<input type="text" id="search" placeholder="Je fonctionne depuis <?= getUpTime()[0]; ?> jour(s)."/>
			<br>
			
			<!-- monitoring -->
			<div class="monitoring">
				<div class="CPU">
					<?php
						// CPU USAGE
						$loads = sys_getloadavg();
						$core_nums = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
						$load = round($loads[0]/($core_nums + 1)*100, 0);
						echo 'CPU';
						echo "
						<div class=\"ui-progress-bar ui-container\" id=\"CPUbar\">
							<div class=\"ui-progress\" style=\"width: $load%;\">
								<!--<span class=\"ui-label\">$load%</span>-->
							</div>
						</div>
						";
						echo $load.'% ';
					?>
				</div>
				
				<div class="RAM">	
					<?php
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
						echo 'RAM';
						echo "
						<div class=\"ui-progress-bar ui-container\" id=\"RAMbar\">
							<div class=\"ui-progress\" style=\"width: $percent%;\">
								<!--<span class=\"ui-label\">$percent%</span>-->
							</div>
						</div>
						";
						echo round($percent,0).'%';
					?>	
				</div>
				
				<div class="HDD">			
					<?php
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
						$freeHDD = $total - $used;
						$percentHDD = ($freeHDD/$total)*100;
						echo 'HDD';
						echo "
						<div class=\"ui-progress-bar ui-container\" id=\"HDDbar\">
							<div class=\"ui-progress\" style=\"width: $percentHDD%;\">
								<!--<span class=\"ui-label\">$load%</span>-->
							</div>
						</div>
						";
						echo round($percentHDD,0).'%';
					?>	
				</div>
			</div>
			
			<!-- liens -->
			<!-- voir http://fontawesome.io/icons/ pour le nom des icones -->
			<div id="links">
				<div class="SEEDBOX">
					<div class="link1">
						SEEDBOX<br>
						<img src="./assets/img/link.png">
					</div>
					<a href="https://domain.tld/rutorrent" TITLE="ruTorrent">
						<span class="fa fa-download"></span>
						<div id="lien">ruTorrent</div>
					</a>
					<a href="https://app.plex.tv/web/app" TITLE="Plex">
						<span class="fa fa-play-circle-o"></span>
						<div id="lien">Plex</div>
					</a>
					<a href="https://domain.tld/sickrage/" TITLE="Sickrage">
						<span class="fa fa-television"></span>
						<div id="lien"> Sickrage</div>
					</a>
				</div>
				
				<div class="CLOUD">
					<div class="link2">
						CLOUD<br>
						<img src="./assets/img/link.png">
					</div>
					<a href="https://rss.domain.tld" TITLE="Selfoss">
						<span class="fa fa-rss-square"></span>
						<div id="lien">Selfoss</div>
					</a>
					<a href="https://webmail.domain.tld" TITLE="Rainloop">
						<span class="fa fa-envelope"></span>
						<div id="lien"> Rainloop</div>
					</a>
					<a href="https://cloud.domain.tld" TITLE="ownCloud">
						<span class="fa fa-cloud"></span>
						<div id="lien">ownCloud</div>
					</a>
				</div>
				
				<br>
				<br>
				
				<div class="HOSTING">
					<a href="https://img.domain.tld" TITLE="Lutim">
						<span class="fa fa-file-image-o"></span>
						<div id="lien">Lutim</div>
					</a>
					<a href="https://file.domain.tld" TITLE="Lufi">
						<span class="fa fa-file-o"></span>
						<div id="lien">Lufi</div>
					</a>
					<a href="https://paste.domain.tld" TITLE="ZeroBin">
						<span class="fa fa-file-text-o"></span>
						<div id="lien">Paste</div>
					</a>
					<div class="link3">
						<img src="./assets/img/link_rev.png"><br>
						HOSTING
					</div>
				</div>
				
				<div class="MISC">
					<a href="https://domain.tld/app/glype" TITLE="Proxy">
						<span class="fa fa-globe"></span>
						<div id="lien">Proxy</div>
					</a>
					<a href="https://codiad.domain.tld" TITLE="Codiad">
						<span class="fa fa-file-code-o"></span>
						<div id="lien">Codiad</div>
					</a>
					<a href="https://shield.domain.tld" TITLE="LibreNMS">
						<span class="fa fa-bar-chart"></span>
						<div id="lien">SHIELD</div>
					</a>
					<div class="link4">
						<img src="./assets/img/link_rev.png"><br>
						MISC.
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- script recherche -->
    	<script src="/ressources/start.js"></script>
</body>
</html>
