// CREDIT : http://codepen.io/travis-g/pen/VYWeoG

var $ = function(id) {
  return document.getElementById(id);
};

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

function init() {
  for (var i = 0; i < search.length; i++)
    if (search[i][0] == "") ss = search[i][1];
  if (ss == "") {
    alert("Error: Missing default search engine!");
  }

  build();

  $('q').value = "";
  //$('q').focus();   //uncomment to autofocus the searchbar
}

function handleQuery(e, q) { // Handle search query
  var key = e.keyCode || e.which; // get keypress

  if (key == 13) { // on "Enter"
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
}
