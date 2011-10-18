<html>
<head>
	<title>Generar gráfico y QR</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script>
	function generar_chart(){
		url = 'http://chart.googleapis.com/chart?cht=p&chd=t:' + $('#value1').val() + ',' + $('#value2').val() + ',' + $('#value3').val() + '&chs=300x150&chl=' + $('#label1').val() + '|' + $('#label2').val() + '|' + $('#label3').val();
		$('#chart').attr('src',url);
	}
	function generar_qr(){
		url = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=' + $('#url').val();
		$('#chart').attr('src',url);
	}
	</script>
</head>
<body>

	<!-- documentación http://code.google.com/apis/chart/ -->

	<h1>Generar gráfico</h1>
	<form action="javascript:generar_chart()" method="get">
		<p>etiqueta1 <input id="label1" size="20" value="chrome"/> <input id="value1" size="10" value="80"/></p>
		<p>etiqueta2 <input id="label2" size="20" value="firefox"/> <input id="value2" size="10" value="18"/></p>
		<p>etiqueta3 <input id="label3" size="20" value="ie"/> <input id="value3" size="10" value="2"/></p>
		<input type="submit" value="generar"/>
	</form>
	
	<br/>
	
	<h1>Generar QR</h1>
	<form action="javascript:generar_qr()" method="get">
		<p><input id="url" size="48" value="http://miquelcamps.com"/></p>
		<input type="submit" value="generar"/>
	</form>
	
	
	<img id="chart"/>
	
</body>
</html>