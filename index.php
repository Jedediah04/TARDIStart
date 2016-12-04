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
$uppy = getUpTime();
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
			<div  class="CPU" >
				<span>CPU</span>
				<div class="ui-progress-bar ui-container" id="CPUbar">
					<div class="ui-progress" style="width:<?= getCpuLoad();?>%"></div>
				</div>
				<span id="CPU"><?= getCpuLoad();?>%</span>
			</div>


			<div class="RAM">
				<span>RAM</span>
				<div class="ui-progress-bar ui-container" id="RAMbar">
					<div class="ui-progress" style="width: <?= getRamUsage()[0]; ?>%"></div>
				</div>
				<span id="RAM"><?= getRamUsage()[1];?>%</span>
			</div>

			<div class="HDD"> 
				<span>HDD</span> 
				<div class="ui-progress-bar ui-container" id="HDDbar"> 
					<div class="ui-progress" style="width: <?= getHDDUsage(); ?>%"></div> 
				</div> 
				<span id="HDD"><?= getHDDUsage();?>%</span> 
			</div>
		</div>

		<!-- liens -->
		<!-- voir http://fontawesome.io/icons/ pour le nom des icones -->
		<div id="links">
        
    <?php 
    $i = 1 ;
    foreach ($data[dashboard] as $menu => $liens) 
        {?>
        
			<div id="<?= $menu ?>">
            
            <?php if ( $i <= 2 ){?>
				<div class="link<?= $i ?>"><?= $liens[nom] ?><br>
					<img src="./assets/img/link.png">
				</div>
            <?php } ?>
            
                    <?php foreach ($liens[menus] as $lien) { ?>
                        
                            <a href="<?= $lien[lien] ?>" TITLE="<?= $lien[titre] ?>">
                                <span class="fa <?= $lien[icone] ?>"></span>
                                <div id="lien"><?= $lien[titre] ?></div>
                            </a>
                    <?php } ?>
                    
            
                <?php if ( $i > 2 ){?>
                    <div class="link<?= $i ?>">
                        <img src="./assets/img/link_rev.png"><br>
                        <?= $liens[nom] ?>
                    </div>
                <?php } ?>
            
			</div>
    <?php $i = $i + 1;
    } ?>
    
			
		</div>
	</div>
</div>

<!-- script recherche -->
<script src='./assets/bower/jquery/dist/jquery.min.js'></script>
<script src="./assets/bower/particles.js/particles.min.js"></script>
<script src="./assets/js/search.js"></script>
<script src="./assets/js/app.js"></script>
<script src="./assets/js/randomBackground.js"></script>
<script src="./assets/js/reload.js"></script>
</body>
</html>