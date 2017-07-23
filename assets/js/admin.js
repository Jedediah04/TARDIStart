$(document).ready(function() { 

  function callbackService(value, settings) {
      $("#service").load(location.href + " #service", function() {
          $('#service .editable').editable('./saveService.php', {callback:callback});
      });
  }

  function callbackShortcut(value, settings) {
      $("#shortcut").load(location.href + " #shortcut", function() {
          $('#shortcut .editable').editable('./saveShortcut.php', {callback:callbackShortcut});
      });
  }

  $('#service .editable').editable('./saveService.php', {callback:callbackService});
  $('#shortcut .editable').editable('./saveShortcut.php', {callback:callbackShortcut});

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