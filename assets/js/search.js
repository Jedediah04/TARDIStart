var search = [ // Search engines
    ["", "https://www.google.com/#q="], // Google (Default)
    ["!g", "https://www.google.com/#q="], // Google
    ["!i", "https://www.google.com/search?tbm=isch&q="], // Google Images
    ["!y", "https://www.youtube.com/results?search_query="], // YouTube
    ["!r", "https://www.reddit.com/search?q="], // Reddit
    ["!h", "https://github.com/search?q="], // GitHub
    ["!d", "https://duckduckgo.com/?q="], // DuckDuckGo
    ["!w", "http://en.wikipedia.org/w/index.php?search="], // Wikipedia
];

var ss = "";

$(function () {
    $('#search').keydown(function(e) {
        var key = e.keyCode || e.which;

        if (key == 13) {
            var q = this.value;
            if (q.lastIndexOf("!") != -1) { // if "!" is found
                var x = q.lastIndexOf("!"),
                    found = false;

                for (var i = 0; i < search.length; i++) {
                    if (search[i][0] == q.substr(x)) { // Find "!?"
                        found = true;
                        window.location = search[i][1] + q.substr(0, x).replace(/&/g, "%26");
                    }
                }
                if (!found) { // Invalid "!?", use default
                    window.location = ss + q.substr(0, x).replace(/&/g, "%26");
                }
            } else { // "!?" where not specified, use default
                window.location = ss + q.replace(/&/g, "%26");
            }
        }
    });
});