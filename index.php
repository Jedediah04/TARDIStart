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
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<?php include_once('./statsServ.php'); 
$uptime = getUpTime()[0];
if(getUpTime()[0] === 1): $uppy = $uptime . " jour"; else: $uppy = $uptime . " jours"; endif;
?>

<!-- particles.js container -->
<div id="particles-js"></div>

<!-- contenu -->
<div class="center">
	<div class="content" id="form" style="top: 0px; opacity: 1;">
		<!-- logo -->
		<div id="logotop"></div>
		<!-- recherche -->
		<div class="search-box">
		<span class="fa fa-search"></span>
		<input type="text" id="search" placeholder="Je fonctionne depuis <?= $uppy ?>..."/>
		</div>
		<br>

		<!-- monitoring -->
		<div class="monitoring">
			<div class="CPU">
				<span>CPU</span>
				<div class="ui-progress-bar ui-container" id="CPUbar">
					<div class="ui-progress" style="width:<?= getCPULoad();?>%"></div>
				</div>
				<span><?= getCPULoad();?>%</span>
			</div>


			<div class="RAM">
				<span>RAM</span>
				<div class="ui-progress-bar ui-container" id="RAMbar">
					<div class="ui-progress" style="width: <?= getRAMUsage()[0]; ?>%"></div>
				</div>
				<span><?= getRAMUsage()[1];?>%</span>
			</div>

			<div class="HDD"> 
				<span>HDD</span> 
				<div class="ui-progress-bar ui-container" id="HDDbar"> 
					<div class="ui-progress" style="width: <?= getHDDUsage(); ?>%"></div> 
				</div> 
				<span><?= getHDDUsage();?>%</span> 
			</div>
			
			<div class="Latency"> 
				<span>Latency</span> 
				<div class="ui-progress-bar ui-container" id="Latencybar"> 
					<div class="ui-progress" style="width: <?= getLatency()[0]; ?>%"></div> 
				</div> 
				<span><?= getLatency()[1];?> ms</span> 
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
<script src='./assets/bower/jquery/dist/jquery.min.js'></script>
<script src="./assets/bower/particles.js/particles.min.js"></script>
<script src="./assets/js/search.js"></script>
<script src="./assets/js/app.js"></script>
<script src="./assets/js/randomBackground.js"></script>
</body>
</html>
