<?php

// http://www.achingbrain.net/stuff/php/akismet
require 'akismet/Akismet.class.php';

// https://akismet.com/signup/
$WordPressAPIKey = '5fbc98de8812';

$akismet = new Akismet(false,$WordPressAPIKey);
$akismet->setCommentContent( $_POST['comment'] );
 
if($akismet->isCommentSpam()){
	echo 'spam';
}else{
	echo 'valido';
}

?>