$(document).ready(function() {
      $('.editable').editable('save.php', {
        callback : function(value, settings) {
         window.location.reload();
    	}});
});
	$(document).ready(function() {
	    $('#new').click(function() {
	    	$.post('save.php', 
	    	{ 
	    		value : 'newLink'
	    	},
	    	function(value, settings) {
	         window.location.reload();
    		},
    		"text"
    	)});
	});