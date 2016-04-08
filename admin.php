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
$json = file_get_contents('settings/service.json');
$data = json_decode($json, true);
?>

<!-- particles.js container -->
<div id="particles-js"></div>

<!-- contenu -->
<div class="center">
	<div class="content" id="form" style="top: 0px; opacity: 1;">
		<!-- logo -->
		<div id="logotop"></div>
		<br>

  <table>
    <thead>
      <tr>
        <th>Lien</th>
        <th>Titre</th>
        <th>Icone</th>
        <th>Preview</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item) { ?>
      <tr>
        <td class= "editable" id=<?= $item[id] ?>_lien><?= $item[lien] ?></td>
        <td class= "editable" id=<?= $item[id] ?>_titre><?= $item[titre] ?></td>
        <td class= "editable" id=<?= $item[id] ?>_icone><?= $item[icone] ?></td>
        <td><i class="fa fa-2x <?= $item[icone] ?>"></i></td>
       </tr>
	<?php } ?>
    </tbody>
  </table>
	
		</div>
	</div>

<!-- script recherche -->
<script src='./assets/bower/jquery/dist/jquery.min.js'></script>
<script src="./assets/bower/particles.js/particles.min.js"></script>
<script src="./assets/bower/jeditable/jquery.jeditable.js"></script>
<script src="./assets/js/search.js"></script>
<script src="./assets/js/app.js"></script>
<script src="./assets/js/randomBackground.js"></script>
<script src="./assets/js/admin.js"></script>
</body>
</html>
