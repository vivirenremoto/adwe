<?php

// afiliación https://ebaypartnernetwork.com/
// conseguir app_id de desarrollador https://developer.ebay.com/
$app_id = 'MiquelCa-078d-4b12-a3a1-dae848176896';
$limit = 10;
$campid = 5336676875;
$customid = 'REGALOS';

// documentación http://developer.ebay.com/devzone/shopping/docs/concepts/ShoppingAPI_FormatOverview.html
$url = 'http://open.api.ebay.com/shopping?appid=' . $app_id . '&version=527&Currency=EUR&ItemsAvailableTo=ES&MaxEntries=' . $limit . '&PageNumber=1&ItemSort=BestMatchPlusPrice&siteid=0&callname=FindItemsAdvanced&responseencoding=xml&callback=true&QueryKeywords=' . urlencode( $_POST['search'] );
$data = file_get_contents( $url );
$xml = simplexml_load_string( $data );
$items = array();
if( $xml->SearchResult->ItemArray->Item ){
	foreach( $xml->SearchResult->ItemArray->Item as $item ){		
		$url = (string) $item->ViewItemURLForNaturalSearch[0];
		$url = str_replace('http://cgi.ebay.com/', 'http://rover.ebay.com/rover/1/1185-53479-19255-0/1?campid=' . $campid . '&toolid=10001&campid=5336676875&customid=' . $customid . '&mpre=http%3A%2F%2Fcgi.ebay.com%2F', $url);
		$items[] = array(
			'title' => (string) $item->Title,
			'url' =>  $url,
			'img' => (string) $item->GalleryURL,
			'price' => (string) $item->ConvertedCurrentPrice
			);
	}
}

?>
<html>
<head>
	<title>Buscar en ebay.es</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>

	<h1>Buscar en ebay.es</h1>
	<?php if( $items ): ?>
		<?php foreach( $items as $item ): ?>
			<p><img src="<?=$item['img']?>" width="48" height="48" align="absmiddle"/> <a href="<?=$item['url']?>"><?=$item['title']?></a> <span style="color:green"><?=$item['price']?>€</span></p>
		<?php endforeach ?>
	<?php else: ?>
		<p>sin resultados</p>
	<?php endif ?>
</body>
</html>