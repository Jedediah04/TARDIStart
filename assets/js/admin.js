$(document).ready(function() { 
      $('#service .editable').editable('./saveService.php', { 
        callback : function(value, settings) { 
        window.location.reload(); 
      }}); 
 
      $('#shortcut .editable').editable('./saveShortcut.php', { 
        callback : function(value, settings) { 
        window.location.reload(); 
      }}); 
});

$(document).ready(function() { 
    $('#new').click(function() { 
      $.post('save.php',  
      {  
        value : 'new' 
      }, 
      function(value, settings) { 
         window.location.reload(); 
      }, 
      "text" 
    )}); 
});