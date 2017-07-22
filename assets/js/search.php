<script type="text/javascript">
var searcher = {
  <?php
    $json = file_get_contents('./settings/shortcut.json');
    $data = json_decode($json, true);
    foreach($data as $element){
      echo '"'.$element[shortcut].'":"'.$element[link].'"';
      if(end($data)[id] != $element[id]){
        echo ",";
      }
    }
  ?>
};
var ss = "";
$(function () {
    $('#search').keydown(function(e) {
        var key = e.keyCode || e.which;
        if (key == 13) {
            var search = this.value;
            if (search.lastIndexOf("!") == 0) { // if "!" is found
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
</script>