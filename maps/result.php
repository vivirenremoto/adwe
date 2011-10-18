<?php

// documentación http://code.google.com/apis/maps/documentation/geocoding/

$url = 'http://maps.google.com/maps/api/geocode/xml?address=' . urlencode( $_GET['location'] ) . '&sensor=false';
$data = file_get_contents( $url );
$xml = simplexml_load_string( $data );

?>
<html>
<head>
	<title>Resultado</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>

<h1>¿Existe dirección?</h1>
<?php

echo '<pre>';
print_r( $xml );
echo '</pre>';

?>
</body>
</html>