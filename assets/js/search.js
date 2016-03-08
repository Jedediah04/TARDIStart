var searcher = {
    "":"https://www.google.com/#q=", // Google (Default)
    "!g":"https://www.google.com/#q=", // Google
    "!i":"https://www.google.com/search?tbm=isch&q=", // Google Images
    "!y":"https://www.youtube.com/results?search_query=", // YouTube
    "!r":"https://www.reddit.com/search?q=", // Reddit
    "!h":"https://github.com/search?q=", // GitHub
    "!d":"https://duckduckgo.com/?q=", // DuckDuckGo
    "!w":"http://en.wikipedia.org/w/index.php?search=" // Wikipedia
};

var ss = "";

$(function () {
    $('#search').keydown(function(e) {
        var key = e.keyCode || e.which;

        if (key == 13) {
            var search = this.value;
            if (search.lastIndexOf("!") != -1) { // if "!" is found
                var tab = search.split(' ');
                if (tab.length > 1 && searcher[tab[0]]) {
                    window.location = search.replace(tab[0]+" ", searcher[tab[0]]);
                }
            } else {
                window.location = searcher[""] + search;
            }
        }
    });
});