$(document).ready(function() { 

  function callbackService(value, settings) {
      $("#service").load(location.href + " #service", function() {
        $('#service .editable').editable('./saveService.php', {callback:callbackService, onblur : "submit"});
      });
  }

  function callbackShortcut(value, settings) {
    $("#shortcut").load(location.href + " #shortcut", function() {
        $('#shortcut .editable').editable('./saveShortcut.php', {callback:callbackShortcut, onblur : "submit"});
    });
  }

  function callbackTheme(value, settings) {
    $("#theme").load(location.href + " #theme", function() {
        $('#theme .editable').editable('./saveTheme.php', {callback:callbackTheme, onblur : "submit"});
    });
  }

  $('#service .editable').editable('./saveService.php', {callback:callbackService, onblur : "submit"});
  $('#shortcut .editable').editable('./saveShortcut.php', {callback:callbackShortcut, onblur : "submit"});
  $('#theme .editable').editable('./saveTheme.php', {callback:callbackTheme, onblur : "submit"});
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

