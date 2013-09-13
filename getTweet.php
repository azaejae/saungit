<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "klubSaungIT";
$notweets = 30;
$consumerkey = "vmN3EgOruLuwzIwiDDafnw";
$consumersecret = "oZOvl0dmKC98wBwRgDh52cY7Ijyh188q42GOOdUXU";
$accesstoken = "234985533-SKWjMiwAlQn2E2xgjX1uNLrID7j0FjBv8AucLEkd";
$accesstokensecret = "URacHZhW15qqduhIf5kZzBQ8TA4AQ2qFEotlyzs";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>