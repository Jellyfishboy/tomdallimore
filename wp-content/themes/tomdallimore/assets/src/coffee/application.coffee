$(document).ready ->
  
  $("img").each ->
    $(this).removeAttr "width"
    $(this).removeAttr "height"
  $("#twitter_div a").attr "target", "_blank"

  $('#blog .tencol p a').attr 'target', '_blank'

  $('#dropdown ul').append '<li class="animated"><a href="#"><div class="icon-search"></div></a></li>'

  $('header #menu.mobile').click ->
    $('#dropdown').toggleClass 'active'
    $(@).toggleClass 'active'
    interval = setInterval(->
      if $('#dropdown ul li:not(.fadeInDown)').size() is 0
        clearInterval interval
      else
        $('#dropdown ul li:not(.fadeInDown)').first().addClass 'fadeInDown'
      return
    , 400)
    if $('#dropdown').hasClass 'active'
      $('#dropdown ul li').removeClass 'fadeInDown'
    # $('.content').toggleClass 'active-mobile-menu'
  # $('#blog .twocol h2').hover (->
  #   $(@).parent().parent().find('.social').css 'opacity', '1'
  # ), ->
  #   $(@).parent().parent().find('.social').css 'opacity', '0'

  $('.social .links a:first-child').hover (->
    $(@).parent().parent().find('.icon-caret-up').css 'color', '#4CC4DB'
  ), ->
    $(@).parent().parent().find('.icon-caret-up').css 'color', '#E6E6E6'

  url = "http://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=8d0b4b96dcede3850ffb7409076c507e&photoset_id=72157640433123824+&per_page=15&format=json&nojsoncallback=1"
  
  $.getJSON url, (res) ->
    for photo in res.photoset.photo
        $('#photography .row .tencol').append '<img src="http://farm'+photo.farm+'.staticflickr.com/'+photo.server+'/'+photo.id+'_'+photo.secret+'_b.jpg"/>'

  
  unless /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
      $('[data-toggle=tooltip]').tooltip()