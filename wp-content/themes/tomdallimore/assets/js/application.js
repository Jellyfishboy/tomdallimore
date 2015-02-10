(function() {
  $(document).ready(function() {
    var url;
    $("img").each(function() {
      $(this).removeAttr("width");
      return $(this).removeAttr("height");
    });
    $('[data-toggle=tooltip]').tooltip();
    $("#twitter_div a").attr("target", "_blank");
    $('#blog .tencol p a').attr('target', '_blank');
    $('header #menu.mobile').click(function() {
      var interval;
      $('#dropdown').toggleClass('active');
      $(this).toggleClass('active');
      interval = setInterval(function() {
        if ($('#dropdown ul li:not(.fadeInDown)').size() === 0) {
          clearInterval(interval);
        } else {
          $('#dropdown ul li:not(.fadeInDown)').first().addClass('fadeInDown');
        }
      }, 400);
      if ($('#dropdown').hasClass('active')) {
        return $('#dropdown ul li').removeClass('fadeInDown');
      }
    });
    $('.social .links a:first-child').hover((function() {
      return $('.social').addClass('active');
    }), function() {
      return $('.social').removeClass('active');
    });
    $('.social .links a').tdSocialSharer();
    url = "https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=8d0b4b96dcede3850ffb7409076c507e&photoset_id=72157640433123824+&per_page=25&format=json&nojsoncallback=1";
    return $.getJSON(url, function(res) {
      var photo, _i, _len, _ref, _results;
      _ref = res.photoset.photo;
      _results = [];
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        photo = _ref[_i];
        _results.push($('#photography .row .tencol').append('<img src="http://farm' + photo.farm + '.staticflickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_b.jpg"/>'));
      }
      return _results;
    });
  });

  $.fn.tdSocialSharer = function(options) {
    var settings;
    settings = $.extend({
      popUpWidth: 550,
      popUpHeight: 450,
      popUpTop: 100,
      useCurrentLocation: false
    }, options);
    return this.each(function(index, value) {
      return $(this).bind("click", function(evt) {
        var height, left, sHeight, sWidth, social, socialImage, socialText, socialURL, top, url, useCurrentLoc, width;
        evt.preventDefault();
        social = $(this).data("social");
        width = settings.popUpWidth;
        height = settings.popUpHeight;
        sHeight = screen.height;
        sWidth = screen.width;
        left = Math.round((sWidth / 2) - (width / 2));
        top = settings.popUpTop;
        url = void 0;
        useCurrentLoc = settings.useCurrentLocation;
        socialURL = (useCurrentLoc ? window.location : encodeURIComponent(social.url));
        socialText = social.text;
        socialImage = encodeURIComponent(social.image);
        switch (social.type) {
          case "facebook":
            url = "http://www.facebook.com/sharer.php?u=" + socialURL + "&t=" + socialText;
            break;
          case "twitter":
            url = "http://twitter.com/share?url=" + socialURL + "&text=" + socialText;
            break;
          case "plusone":
            url = "https://plusone.google.com/_/+1/confirm?hl=en&url=" + socialURL;
        }
        return window.open(url, "", "left=" + left + " , top=" + top + ", width=" + width + ", height=" + height + ", personalbar=0, toolbar=0, scrollbars=1, resizable=1");
      });
    });
  };

}).call(this);
