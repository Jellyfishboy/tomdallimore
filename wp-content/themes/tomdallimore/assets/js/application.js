// Generated by CoffeeScript 1.6.3
(function() {
  $(document).ready(function() {
    return $("img").each(function() {
      $(this).removeAttr("width");
      $(this).removeAttr("height");
      return $("#twitter_div a").attr("target", "_blank");
    });
  });

}).call(this);