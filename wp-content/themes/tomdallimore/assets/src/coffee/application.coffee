$(document).ready ->
  
  $("img").each ->
    $(this).removeAttr "width"
    $(this).removeAttr "height"

  $('[data-toggle=tooltip]').tooltip()

  # Add target blank atttributes to links in blog posts
  $("#twitter_div a").attr "target", "_blank"
  $('#blog .tencol p a').attr 'target', '_blank'

  # $('#dropdown ul').append '<li class="animated"><a href="#"><div class="icon-search"></div></a></li>'

  # Mobile dropdown menu
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

  # Social tools
  $('.social .links a:first-child').hover (->
    $('.social').addClass 'active'
  ), ->
    $('.social').removeClass 'active'
  $('.social .links a').tdSocialSharer()

  # Display list of flickr photos
  url = "http://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=8d0b4b96dcede3850ffb7409076c507e&photoset_id=72157640433123824+&per_page=15&format=json&nojsoncallback=1"
  $.getJSON url, (res) ->
    for photo in res.photoset.photo
        $('#photography .row .tencol').append '<img src="http://farm'+photo.farm+'.staticflickr.com/'+photo.server+'/'+photo.id+'_'+photo.secret+'_b.jpg"/>'

  # Utilise tooltips on desktop only
  # unless /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
  

# Function for creating the social share popups
$.fn.tdSocialSharer = (options) ->
  
  #settings
  settings = $.extend(
    popUpWidth: 550 #Width of the Pop-Up Window
    popUpHeight: 450 #Height of the Pop-Up Window
    popUpTop: 100 #Top value for Pop-Up Window
    useCurrentLocation: false #Whether or not use current location for sharing
  , options)
  
  #Attach this plugin to each element in the DOM selected by jQuery Selector and retain statement chaining
  @each (index, value) ->
    
    #Respond to click event
    $(this).bind "click", (evt) ->
      evt.preventDefault()
      
      #Define
      social = $(this).data("social")
      width = settings.popUpWidth
      height = settings.popUpHeight
      sHeight = screen.height
      sWidth = screen.width
      left = Math.round((sWidth / 2) - (width / 2))
      top = settings.popUpTop
      url = undefined
      useCurrentLoc = settings.useCurrentLocation
      socialURL = (if (useCurrentLoc) then window.location else encodeURIComponent(social.url))
      socialText = social.text
      socialImage = encodeURIComponent(social.image)
      switch social.type
        when "facebook"
          url = "http://www.facebook.com/sharer.php?u=" + socialURL + "&t=" + socialText
        when "twitter"
          url = "http://twitter.com/share?url=" + socialURL + "&text=" + socialText
        when "plusone"
          url = "https://plusone.google.com/_/+1/confirm?hl=en&url=" + socialURL
        # when "pinterest"
        #   url = "http://pinterest.com/pin/create/button/?url=" + socialURL + "&media=" + socialImage + "&description=" + socialText
      
      #Finally fire the Pop-up
      window.open url, "", "left=" + left + " , top=" + top + ", width=" + width + ", height=" + height + ", personalbar=0, toolbar=0, scrollbars=1, resizable=1"