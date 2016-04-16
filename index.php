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
$json = file_get_contents('admin/service.json');
$data = json_decode($json, true);
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
					<div class="ui-progress" style="width:<?= getCpuLoad();?>%"></div>
				</div>
				<span><?= getCpuLoad();?>%</span>
			</div>


			<div class="RAM">
				<span>RAM</span>
				<div class="ui-progress-bar ui-container" id="RAMbar">
					<div class="ui-progress" style="width: <?= getRamUsage()[0]; ?>%"></div>
				</div>
				<span><?= getRamUsage()[1];?>%</span>
			</div>

			<div class="HDD"> 
				<span>HDD</span> 
				<div class="ui-progress-bar ui-container" id="HDDbar"> 
					<div class="ui-progress" style="width: <?= getHDDUsage(); ?>%"></div> 
				</div> 
				<span><?= getHDDUsage();?>%</span> 
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
				<a href="<?= $data[0][lien] ?>" TITLE="<?= $data[0][titre] ?>">
					<span class="fa <?= $data[0][icone] ?>"></span>
					<div id="lien"><?= $data[0][titre] ?></div>
				</a>
				<a href="<?= $data[1][lien] ?>" TITLE="<?= $data[1][titre] ?>">
					<span class="fa <?= $data[1][icone] ?>"></span>
					<div id="lien"><?= $data[1][titre] ?></div>
				</a>
				<a href="<?= $data[2][lien] ?>/" TITLE="<?= $data[2][titre] ?>">
					<span class="fa <?= $data[2][icone] ?>"></span>
					<div id="lien"><?= $data[2][titre] ?></div>
				</a>
			</div>

			<div class="CLOUD">
				<div class="link2">
					CLOUD<br>
					<img src="./assets/img/link.png">
				</div>
				<a href="<?= $data[3][lien] ?>" TITLE="<?= $data[3][titre] ?>">
					<span class="fa <?= $data[3][icone] ?>"></span>
					<div id="lien"><?= $data[3][titre] ?></div>
				</a>
				<a href="<?= $data[4][lien] ?>" TITLE="<?= $data[4][titre] ?>">
					<span class="fa <?= $data[4][icone] ?>"></span>
					<div id="lien"><?= $data[4][titre] ?></div>
				</a>
				<a href="<?= $data[5][lien] ?>" TITLE="<?= $data[5][titre] ?>">
					<span class="fa <?= $data[5][icone] ?>"></span>
					<div id="lien"><?= $data[5][titre] ?></div>
				</a>
			</div>

			<br>
			<br>

			<div class="HOSTING">
				<a href="<?= $data[6][lien] ?>" TITLE="<?= $data[6][titre] ?>">
					<span class="fa <?= $data[6][icone] ?>"></span>
					<div id="lien"><?= $data[6][titre] ?></div>
				</a>
				<a href="<?= $data[7][lien] ?>" TITLE="<?= $data[7][titre] ?>">
					<span class="fa <?= $data[7][icone] ?>"></span>
					<div id="lien"><?= $data[7][titre] ?></div>
				</a>
				<a href="<?= $data[8][lien] ?>" TITLE="<?= $data[8][titre] ?>">
					<span class="fa <?= $data[8][icone] ?>"></span>
					<div id="lien"><?= $data[8][titre] ?></div>
				</a>
				<div class="link3">
					<img src="./assets/img/link_rev.png"><br>
					HOSTING
				</div>
			</div>

			<div class="MISC">
				<a href="<?= $data[9][lien] ?>" TITLE="<?= $data[9][titre] ?>">
					<span class="fa <?= $data[9][icone] ?>"></span>
					<div id="lien"><?= $data[9][titre] ?></div>
				</a>
				<a href="<?= $data[10][lien] ?>" TITLE="<?= $data[10][titre] ?>">
					<span class="fa <?= $data[10][icone] ?>"></span>
					<div id="lien"><?= $data[10][titre] ?></div>
				</a>
				<a href="<?= $data[11][lien] ?>" TITLE="<?= $data[11][titre] ?>">
					<span class="fa <?= $data[11][icone] ?>"></span>
					<div id="lien"><?= $data[11][titre] ?></div>
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
