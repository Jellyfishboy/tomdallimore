$(document).ready ->
  
  $("img").each ->
    $(this).removeAttr "width"
    $(this).removeAttr "height"
    $("#twitter_div a").attr "target", "_blank"

  $('nav li').find('a').text('')  
  $('nav li:first-child').find('a').addClass 'icomoon-home'
  $('nav li:nth-child(2)').find('a').addClass 'icomoon-notebook'
  $('nav li:last-child').find('a').addClass 'icomoon-user'

