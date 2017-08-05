<?php

function get_json($JSONFile){
  $json = file_get_contents($JSONFile);
  $data = json_decode($json, true);
  return $data;
}

$data = get_json('../settings/theme.json');
$focusTheme = $data[focusTheme];

foreach ($data[theme] as $element) {
  if($focusTheme == $element[name]){
      $iconTheme = $element[icon];
      $titlePage = $element[title];
  }
}

$dataTheme = get_json('../settings/theme.json');
$dataService = get_json('../settings/service.json');
$dataShortcut = get_json('../settings/shortcut.json');;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
  <title><?php echo $titlePage; ?></title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="icon" type="ico" href=.<?php echo $iconTheme;?>>
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
        <?php
        }
        ?>
      </tbody>
    </table>

    <h1>Shortcut settings</h1>
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
        <?php
        }
        if($dataShortcut == NULL){
          $itemShortcut = 0;
        }
        ?>
        <tr>
          <td class= "editable" id=<?= $itemShortcut[id]+1 ?>_shortcut>Your new shortcut</td>
          <td class= "editable" id=<?= $itemShortcut[id]+1 ?>_link>Your new link</td>
        </tr>
      </tbody>
    </table>
    <div id="theme">

      <h1>Theme settings</h1>
      Name of the current theme : <span class="editable" id="focusTheme"><?php echo $dataTheme[focusTheme]; ?></span>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Icon</th>
            <th>Title of the page</th>
            <th>Title image</th>
            <th>Background</th>
          </tr>
        </thead>
        <tbody>

        <?php foreach ($dataTheme[theme] as $itemTheme) { ?>
          <tr>
            <td class= "editable" id=<?= $itemTheme[id] ?>_name><?= $itemTheme[name] ?></td>
            <td class= "editable" id=<?= $itemTheme[id] ?>_icon><?= $itemTheme[icon] ?></td>
            <td class= "editable" id=<?= $itemTheme[id] ?>_title><?= $itemTheme[title] ?></td>
            <td class= "editable" id=<?= $itemTheme[id] ?>_titleImage><?= $itemTheme[titleImage] ?></td>

            <td>
            <table>
              <?php
              foreach ($itemTheme[background] as $keyThemeBackground => $valueThemeBackground) {
              ?>
                <tr>
                  <span class= "editable" id=<?php echo $itemTheme[id]."_background_".$keyThemeBackground; ?> ><?php echo $valueThemeBackground; ?></span>
                </tr><br>
                <?php
                if(end($itemTheme[background]) == $valueThemeBackground){
                ?>
                  <tr>
                    <span class= "editable" id=<?php echo $itemTheme[id]; ?>_background_<?php echo $keyThemeBackground+1; ?> >Your new background</span>
                  </tr>
                <?php 
                }
                ?>
              <?php
              } 
              if($itemTheme[background] == NULL){
                ?>
                <tr>
                  <span class= "editable" id=<?php echo $itemTheme[id]; ?>_background_0 >Your new background</span>
                </tr>
                <?php
              }
              ?>
            </table>
            </td>
          </tr>
          <?php
          if(end($dataTheme[theme]) == $itemTheme){
            if($dataTheme == NULL){
              $itemTheme = 0;
            }
            ?>
            <tr>
              <td class= "editable" id=<?= $itemTheme[id]+1 ?>_name>Your new theme name</td>
              <td class= "editable" id=<?= $itemTheme[id]+1 ?>_icon>Your new icon</td>
              <td class= "editable" id=<?= $itemTheme[id]+1 ?>_title>Your new title</td>
              <td class= "editable" id=<?= $itemTheme[id]+1 ?>_titleImage>Your new image</td>
              <td>
              <table>
                <tr>
                  <span class= "editable" id=<?php echo $itemTheme[id]+1; ?>_background_0 >Your new background</span>
                </tr><br>
              </table>
              </td>
            </tr>
          <?php
          }
        }
        ?>
        </tbody>
      </table>  
    </div>
    </div>
	</div>
</body>
</html>
