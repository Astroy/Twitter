<?php

$data = file_get_contents("php://input");
if($data)
{
    require_once('../libraries/TwitterAPIExchange.php'); //Library for Twitter API OAuth

    $settings = array(
        'oauth_access_token' => "22826043-d7Qu0A9src6FN3z1FQDN5XggZVK9BR1klBhA39rt2",
        'oauth_access_token_secret' => "OBI3lZJXVCeNh5NidyBlYogQJhWasVZtHHtbrrdDFymyc",
        'consumer_key' => "wARpcC7ojvaoz4SP63ulxyXkF",
        'consumer_secret' => "rzKPSbbJZhLr3mOHmyz8IIAnKn4RZd5WB6ZVm5c4cpCVl2hWRb"
    );  //Twitter Application Data

    $url = 'https://api.twitter.com/1.1/search/tweets.json';
    $requestMethod = 'GET';
    $twitter = new TwitterAPIExchange($settings);


    $search_data=json_decode($data);

    if(isset($search_data->textSearch) && !empty($search_data->textSearch)){

        $getfield = '?q='.$search_data->textSearch;

        echo $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();
    }




}
?>