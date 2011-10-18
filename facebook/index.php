<?php

// https://github.com/facebook/php-sdk
require 'facebook_sdk/src/facebook.php';


$facebook = new Facebook(array(
  'appId'  => '182629061816524',
  'secret' => '8e664c852a26db5898fadfd3fbcb2810',
));


$user = $facebook->getUser();

if ($user) {
  try {
    $user_profile = $facebook->api('/me');
    $user_likes = $facebook->api('/me/likes');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {

  // http://developers.facebook.com/docs/reference/api/permissions/
  $par['scope'] = "email, user_birthday, user_likes, user_about_me, user_location";
  $loginUrl = $facebook->getLoginUrl($par);
}

?>
<html>
  <head>
    <title>facebook connect</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  </head>
  <body>
    <h1>facebook connect</h1>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
      <pre><?php print_r( $user_profile ) ?></pre>
      <pre><?php print_r( $user_likes ) ?></pre>
    <?php else: ?>
      <div>
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>
    
  </body>
</html>
