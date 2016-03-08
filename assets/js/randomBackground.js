var bg = ['bg1.jpg', 'bg2.jpg', 'bg3.jpg'];

var randombackground =function() {
    var nb = Math.floor(Math.random() * bg.length);
    $('body').css('background-image', "url('./assets/img/"+bg[nb]+"')");
};

$(function() {
    randombackground();
});