$(document).ready ->
  
  # Remove img width and height from http://wpwizard.net/jquery/remove-img-height-and-width-with-jquery/	
  $("img").each ->
    $(this).removeAttr "width"
    $(this).removeAttr "height"
    $("#twitter_div a").attr "target", "_blank"

