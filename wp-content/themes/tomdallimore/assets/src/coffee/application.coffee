$(document).ready ->
  
  $("img").each ->
    $(this).removeAttr "width"
    $(this).removeAttr "height"
  $("#twitter_div a").attr "target", "_blank"

  $('#blog .tencol p a').attr 'target', '_blank'