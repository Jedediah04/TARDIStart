
<script type="text/javascript">
	<?php
	$data = get_json('./settings/theme.json');
	$focusTheme = $data[focusTheme];

	echo "var bg = [";
	foreach ($data[theme] as $element) {
		if($focusTheme == $element[name]){
			$titleImage = $element[titleImage];

			foreach ($element[background] as $background) {
				echo '"'.$background.'"';
		      	if(end($element[background])!= $background){
		        	echo ",";
		    	}
		    	else{
		    		echo "];";
		    	}
			}
		}
	}

	?>


	var randombackground = function() {
	    var nb = Math.floor(Math.random() * bg.length);
	    $('body').css('background-image', "url('./assets/img/"+bg[nb]+"')");
	};

	$(function() {
	    randombackground();
	   	$("#logotop").css("background-image", "url('./assets/img/<?php echo $titleImage; ?>')");
	});

</script>