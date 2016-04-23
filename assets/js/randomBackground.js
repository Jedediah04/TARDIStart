var randombackground =function() {
    $.post("theme.php?function=getBackgroundTheme", function(data){
	var bg = JSON.parse(data);
        var nb = Math.floor(Math.random() * bg.length);
        $('body').css('background-image', "url("+bg[nb]+")");
    });
    
};

$(function() {
    randombackground();
});
