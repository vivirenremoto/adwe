<html>
<head>
	<title>Fotos flickr</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
</head>
<body>

	<!-- demo de http://api.jquery.com/jQuery.getJSON/ -->
	<!-- documentación http://www.flickr.com/services/feeds/docs/photos_public/ -->

	<h1>Fotos flickr</h1>
	<div id="images"></div>
	
	
	<script>	
	  $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
	  {
	    tags: "dogs",
	    format: "json"
	  },
	  function(data) {
	    $.each(data.items, function(i,item){
	      $("<img/>").attr("src", item.media.m).appendTo("#images");
	      if ( i == 3 ) return false;
	    });
	  });
	</script>
	
</body>
</html>