<?php

include_once('./statsServ.php');

function get_json($JSONFile){
	$json = file_get_contents($JSONFile);
	$data = json_decode($json, true);
	return $data;
}

$data = get_json('./settings/theme.json');
$focusTheme = $data[focusTheme];

foreach ($data[theme] as $element) {
	if($focusTheme == $element[name]){
			$iconTheme = $element[icon];
			$titlePage = $element[title];
	}
}

$uppy = getUpTime();
$jsonService = file_get_contents('./settings/service.json');
$dataService = json_decode($jsonService, true);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<title><?php echo $titlePage; ?></title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="icon" type="ico" href="<?php echo $iconTheme;?>">
	<link rel="stylesheet" href="./assets/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<!-- script javascript -->
<script src='./assets/bower/jquery/dist/jquery.min.js'></script>
<script src="./assets/bower/particles.js/particles.min.js"></script>
<script src="./assets/js/app.js"></script>
<?php
include_once('./assets/js/search.php');
include_once('./assets/js/randomBackground.php');
?>


<body>
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
				<a href="<?= $dataService[0][lien] ?>" TITLE="<?= $dataService[0][titre] ?>">
					<span class="fa <?= $dataService[0][icone] ?>"></span>
					<div id="lien"><?= $dataService[0][titre] ?></div>
				</a>
				<a href="<?= $dataService[1][lien] ?>" TITLE="<?= $dataService[1][titre] ?>">
					<span class="fa <?= $dataService[1][icone] ?>"></span>
					<div id="lien"><?= $dataService[1][titre] ?></div>
				</a>
				<a href="<?= $dataService[2][lien] ?>/" TITLE="<?= $dataService[2][titre] ?>">
					<span class="fa <?= $dataService[2][icone] ?>"></span>
					<div id="lien"><?= $dataService[2][titre] ?></div>
				</a>
			</div>

			<div class="CLOUD">
				<div class="link2">
					CLOUD<br>
					<img src="./assets/img/link.png">
				</div>
				<a href="<?= $dataService[3][lien] ?>" TITLE="<?= $dataService[3][titre] ?>">
					<span class="fa <?= $dataService[3][icone] ?>"></span>
					<div id="lien"><?= $dataService[3][titre] ?></div>
				</a>
				<a href="<?= $dataService[4][lien] ?>" TITLE="<?= $dataService[4][titre] ?>">
					<span class="fa <?= $dataService[4][icone] ?>"></span>
					<div id="lien"><?= $dataService[4][titre] ?></div>
				</a>
				<a href="<?= $dataService[5][lien] ?>" TITLE="<?= $dataService[5][titre] ?>">
					<span class="fa <?= $dataService[5][icone] ?>"></span>
					<div id="lien"><?= $dataService[5][titre] ?></div>
				</a>
			</div>

			<br>
			<br>

			<div class="HOSTING">
				<a href="<?= $dataService[6][lien] ?>" TITLE="<?= $dataService[6][titre] ?>">
					<span class="fa <?= $dataService[6][icone] ?>"></span>
					<div id="lien"><?= $dataService[6][titre] ?></div>
				</a>
				<a href="<?= $dataService[7][lien] ?>" TITLE="<?= $dataService[7][titre] ?>">
					<span class="fa <?= $dataService[7][icone] ?>"></span>
					<div id="lien"><?= $dataService[7][titre] ?></div>
				</a>
				<a href="<?= $dataService[8][lien] ?>" TITLE="<?= $dataService[8][titre] ?>">
					<span class="fa <?= $dataService[8][icone] ?>"></span>
					<div id="lien"><?= $dataService[8][titre] ?></div>
				</a>
				<div class="link3">
					<img src="./assets/img/link_rev.png"><br>
					HOSTING
				</div>
			</div>

			<div class="MISC">
				<a href="<?= $dataService[9][lien] ?>" TITLE="<?= $dataService[9][titre] ?>">
					<span class="fa <?= $dataService[9][icone] ?>"></span>
					<div id="lien"><?= $dataService[9][titre] ?></div>
				</a>
				<a href="<?= $dataService[10][lien] ?>" TITLE="<?= $dataService[10][titre] ?>">
					<span class="fa <?= $dataService[10][icone] ?>"></span>
					<div id="lien"><?= $dataService[10][titre] ?></div>
				</a>
				<a href="<?= $dataService[11][lien] ?>" TITLE="<?= $dataService[11][titre] ?>">
					<span class="fa <?= $dataService[11][icone] ?>"></span>
					<div id="lien"><?= $dataService[11][titre] ?></div>
				</a>
				<div class="link4">
					<img src="./assets/img/link_rev.png"><br>
					MISC.
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
