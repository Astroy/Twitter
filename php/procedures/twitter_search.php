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

    $requestMethod = 'GET';
    $twitter = new TwitterAPIExchange($settings);


    $search_data=json_decode($data);

    //multiple options for search depend on what fields are filled up

    if(isset($search_data->textSearch) && !empty($search_data->textSearch)){
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q='.$search_data->textSearch;

        if(isset($search_data->selectedLanguage) && !empty($search_data->selectedLanguage))
        {
            $getfield=$getfield."&lang=".$search_data->selectedLanguage->code;
        }

        echo $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();
    }
    else if(isset($search_data->getAllLanguages) && !empty($search_data->getAllLanguages) && $search_data->getAllLanguages = true)
    {
        $url = 'https://api.twitter.com/1.1/help/languages.json';
        echo $twitter->buildOauth($url, $requestMethod)
                 ->performRequest();
    }
    else if(isset($search_data->user) && !empty($search_data->user))
    {
        $url="https://api.twitter.com/1.1/statuses/user_timeline.json";
         $getfield = '?user_id='.$search_data->user->id;

        echo $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();
    }
    else if(isset($search_data->username) && !empty($search_data->username)){
        $url = 'https://api.twitter.com/1.1/users/search.json';
        $getfield = '?q='.$search_data->username;

        echo $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();
    }


}
?>
