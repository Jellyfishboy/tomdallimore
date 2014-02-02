$(document).ready ->
  
  $("img").each ->
    $(this).removeAttr "width"
    $(this).removeAttr "height"
  $("#twitter_div a").attr "target", "_blank"

  $('#blog .tencol p a').attr 'target', '_blank'

  url = "http://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=31d03fb6defae4a7e134b97320a30360&photoset_id=72157640433123824&per_page=15&format=json&nojsoncallback=1&auth_token=72157640431165964-4481186fc0a3dc57&api_sig=681d0ca75ca84278945be7121a9c4057"
  $.getJSON url, (res) ->
    for photo in res.photoset.photo
        $('#photography .row .tencol').append '<img src="http://farm'+photo.farm+'.staticflickr.com/'+photo.server+'/'+photo.id+'_'+photo.secret+'_b.jpg"/>'

  
  unless /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
      $('[data-toggle=tooltip]').tooltip()