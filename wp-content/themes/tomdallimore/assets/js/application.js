(function(){$(document).ready(function(){var a,b,c,d,e,f,g;return $("img").each(function(){return $(this).removeAttr("width"),$(this).removeAttr("height")}),$("[data-toggle=tooltip]").tooltip(),$("#twitter_div a").attr("target","_blank"),$("#blog .tencol p a").attr("target","_blank"),$("header #menu.mobile").click(function(){var a;return $("#dropdown").toggleClass("active"),$(this).toggleClass("active"),a=setInterval(function(){0===$("#dropdown ul li:not(.fadeInDown)").size()?clearInterval(a):$("#dropdown ul li:not(.fadeInDown)").first().addClass("fadeInDown")},400),$("#dropdown").hasClass("active")?$("#dropdown ul li").removeClass("fadeInDown"):void 0}),$(".social .links a:first-child").hover(function(){return $(".social").addClass("active")},function(){return $(".social").removeClass("active")}),$(".social .links a").tdSocialSharer(),g="https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=8d0b4b96dcede3850ffb7409076c507e&photoset_id=72157640433123824+&per_page=25&format=json&nojsoncallback=1",$.getJSON(g,function(a){var b,c,d,e,f;for(e=a.photoset.photo,f=[],c=0,d=e.length;d>c;c++)b=e[c],f.push($("#photography .row .tencol").append('<img src="http://farm'+b.farm+".staticflickr.com/"+b.server+"/"+b.id+"_"+b.secret+'_b.jpg"/>'));return f}),c=2,f=$(".page-count").data("pcount"),e=$("#post_type").data("search"),a=$("#post_type").data("category"),b=$("#work").data("work"),$(window).scroll(function(){return $(window).scrollTop()===$(document).height()-$(window).height()?c>f?!1:(d(c,e,a,b),c++):void 0}),d=function(a,b,c,d){return null==b&&null==c&&null==d?$.ajax({url:"http://localhost:8888/wp-admin/admin-ajax.php",type:"POST",data:"action=infinite_scroll&page_no="+a+"&loop_file=loop_blog",success:function(a){return $(".blog_loop").append(a)}}):null!=c?$.ajax({url:"http://localhost:8888/wp-admin/admin-ajax.php",type:"POST",data:"action=infinite_scroll&page_no="+a+"&loop_file=loop_blog&archive_category="+c,success:function(a){return $(".blog_loop").append(a)}}):null!=b?$.ajax({url:"http://localhost:8888/wp-admin/admin-ajax.php",type:"POST",data:"action=infinite_scroll&page_no="+a+"&loop_file=loop_blog&search_query="+b,success:function(a){return $(".blog_loop").append(a)}}):null!=d&&$.ajax({url:"http://localhost:8888/wp-admin/admin-ajax.php",type:"POST",data:"action=infinite_scroll&page_no="+a+"&loop_file=loop_work&archive_work=work",success:function(a){return $(".blog_loop").append(a)}}),!1}}),$.fn.tdSocialSharer=function(a){var b;return b=$.extend({popUpWidth:550,popUpHeight:450,popUpTop:100,useCurrentLocation:!1},a),this.each(function(a,c){return $(this).bind("click",function(a){var c,d,e,f,g,h,i,j,k,l,m,n;switch(a.preventDefault(),g=$(this).data("social"),n=b.popUpWidth,c=b.popUpHeight,e=screen.height,f=screen.width,d=Math.round(f/2-n/2),k=b.popUpTop,l=void 0,m=b.useCurrentLocation,j=m?window.location:encodeURIComponent(g.url),i=g.text,h=encodeURIComponent(g.image),g.type){case"facebook":l="http://www.facebook.com/sharer.php?u="+j+"&t="+i;break;case"twitter":l="http://twitter.com/share?url="+j+"&text="+i;break;case"plusone":l="https://plusone.google.com/_/+1/confirm?hl=en&url="+j}return window.open(l,"","left="+d+" , top="+k+", width="+n+", height="+c+", personalbar=0, toolbar=0, scrollbars=1, resizable=1")})})}}).call(this);