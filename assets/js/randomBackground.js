var bg = ['bg1.jpg', 'bg2.jpg', 'bg3.jpg'];

var randombackground =function() {
    var nb = Math.floor((Math.random() * (bg.length-1)) + 1);
    $('body').css('background', "url('./assets/img/"+bg[nb]+"')");
};

$(function() {
    randombackground();
});