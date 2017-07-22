<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<title>Start - T.A.R.D.I.S.</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="icon" type="ico" href="../assets/img/tardis.ico">
	<link rel="stylesheet" href="../assets/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style>
	.center .content {
    		height: 800px;
	}
    	</style>
</head>

<!-- script recherche -->
<script src='../assets/bower/jquery/dist/jquery.min.js'></script>
<script src="../assets/bower/particles.js/particles.min.js"></script>
<script src="../assets/bower/jeditable/jquery.jeditable.js"></script>
<script src="../assets/js/app.js"></script>
<script src="../assets/js/admin.js"></script>

<body style="background-image: url(&quot;../assets/img/bg1.jpg&quot;);">

<?php
include_once('../statsServ.php'); 

$uptime = getUpTime()[0];
$jsonService = file_get_contents('../settings/service.json');
$dataService = json_decode($jsonService, true);

if(getUpTime()[0] === 1): $uppy = $uptime . " jour"; else: $uppy = $uptime . " jours"; endif;
?>

<!-- particles.js container -->
<div id="particles-js"></div>

<!-- contenu -->
<div class="center">
	<div class="content" id="form" style="top: 0px; opacity: 1;">
		<!-- logo -->
		<div id="logotop"></div>
		<br>
    <h1>Homepage links</h1>
    <table id="service" >
      <thead>
        <tr>
          <th>Lien</th>
          <th>Titre</th>
          <th>Icone</th>
          <th>Preview</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($dataService as $itemService) { ?>
        <tr>
          <td class= "editable" id=<?= $itemService[id] ?>_lien><?= $itemService[lien] ?></td>
          <td class= "editable" id=<?= $itemService[id] ?>_titre><?= $itemService[titre] ?></td>
          <td class= "editable" id=<?= $itemService[id] ?>_icone><?= $itemService[icone] ?></td>
          <td><i class="fa fa-2x <?= $itemService[icone] ?>"></i></td>
         </tr>
  	<?php } ?>
      </tbody>
    </table>

<?php
$jsonShortcut = file_get_contents('../settings/shortcut.json');
$dataShortcut = json_decode($jsonShortcut, true);
?>

    <h1>Research shortcut</h1>
    <table id="shortcut">
      <thead>
        <tr>
          <th>Shortcut</th>
          <th>Link</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($dataShortcut as $itemShortcut) { ?>
        <tr>
          <td class= "editable" id=<?= $itemShortcut[id] ?>_shortcut><?= $itemShortcut[shortcut] ?></td>
          <td class= "editable" id=<?= $itemShortcut[id] ?>_link><?= $itemShortcut[link] ?></td>
        </tr>
    <?php } ?>
      </tbody>
    </table>  
    </div>
	</div>
</body>
</html>
