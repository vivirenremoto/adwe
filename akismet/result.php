<?php

// http://www.achingbrain.net/stuff/php/akismet
require 'akismet/Akismet.class.php';

// https://akismet.com/signup/
$WordPressAPIKey = '5fbc98de8812';
$MyBlogURL = 'http://miquelcamps.com/services/adwe/akismet/';

$akismet = new Akismet($MyBlogURL ,$WordPressAPIKey);
//$akismet->setCommentAuthor($name);
//$akismet->setCommentAuthorEmail($email);
//$akismet->setCommentAuthorURL($url);
//$akismet->setPermalink('http://www.example.com');
$akismet->setCommentContent( $_POST['comment'] );
 
if($akismet->isCommentSpam()){
	echo 'spam';
}else{
	echo 'valido';
}

?>