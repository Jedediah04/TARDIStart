<?php

function getActiveTheme(){
	//get the data theme
	$dataTheme = "settings/theme.json";
	$json = file_get_contents($dataTheme);
	$arrayTheme = json_decode($json, true);

	//get the active theme name
	$activeTheme = $arrayTheme["theme-focus"];

	//get the active theme
	foreach($arrayTheme["theme"] as $element){
		if($element["title"]==$activeTheme){
			$backgroundArray = $element;
			return $backgroundArray;
		}
	}
}

function getBackgroundTheme(){
	$activeTheme = getActiveTheme();
	$activeBackground = $activeTheme["background"];
	echo json_encode($activeBackground);
}

function getLogo(){
	$activeTheme = getActiveTheme();
	$activeLogo = $activeTheme["logo"];
	echo $activeLogo;
}

function getIcon(){
        $activeTheme = getActiveTheme();
        $activeIcon = $activeTheme["icon"];
        return $activeIcon;
}

function getTitle(){
        $activeTheme = getActiveTheme();
        $activeTitle = $activeTheme["title"];
        return $activeTitle;
}



if(isset($_GET['function']) && !empty($_GET['function'])){
	$function = $_GET['function'];
	switch ($function){
		case getBackgroundTheme :
			getBackgroundTheme();
		break;
		case getLogo :
			getLogo();
		break;
	}
}

?>
