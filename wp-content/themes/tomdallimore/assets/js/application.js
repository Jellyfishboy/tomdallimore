(function() {
  $(document).ready(function() {
    var url;
    $("img").each(function() {
      $(this).removeAttr("width");
      return $(this).removeAttr("height");
    });
    $("#twitter_div a").attr("target", "_blank");
    $('#blog .tencol p a').attr('target', '_blank');
    url = "http://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=8d0b4b96dcede3850ffb7409076c507e&photoset_id=72157640433123824+&per_page=15&format=json&nojsoncallback=1";
    $.getJSON(url, function(res) {
      var photo, _i, _len, _ref, _results;
      _ref = res.photoset.photo;
      _results = [];
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        photo = _ref[_i];
        _results.push($('#photography .row .tencol').append('<img src="http://farm' + photo.farm + '.staticflickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_b.jpg"/>'));
      }
      return _results;
    });
    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      return $('[data-toggle=tooltip]').tooltip();
    }
  });

}).call(this);
