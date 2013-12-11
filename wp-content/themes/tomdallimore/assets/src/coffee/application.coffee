$(document).ready ->
  
  $("img").each ->
    $(this).removeAttr "width"
    $(this).removeAttr "height"
  $("#twitter_div a").attr "target", "_blank"

  $('#blog .tencol p a').attr 'target', '_blank'
  
  unless /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
      $('[data-toggle=tooltip]').tooltip()