$(function() {
    $.post("theme.php?function=getLogo", function(data){
	$('#logotop').css('background-image', "url("+data+")");
    });
    
});

