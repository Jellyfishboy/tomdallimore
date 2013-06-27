<?php
  $tweets = getTweets(3, billy_dallimore);
  foreach($tweets as $tweet){

      if($tweet['text']){
        echo '<li>';
          $the_tweet = $tweet['text'];

          if(is_array($tweet['entities']['user_mentions'])){
              foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
                  $the_tweet = preg_replace(
                      '/@'.$user_mention['screen_name'].'/i',
                      '<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
                      $the_tweet);
              }
          }
          if(is_array($tweet['entities']['hashtags'])){
              foreach($tweet['entities']['hashtags'] as $key => $hashtag){
                  $the_tweet = preg_replace(
                      '/#'.$hashtag['text'].'/i',
                      '<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank">#'.$hashtag['text'].'</a>',
                      $the_tweet);
              }
          }
          if(is_array($tweet['entities']['urls'])){
              foreach($tweet['entities']['urls'] as $key => $link){
                  $the_tweet = preg_replace(
                      '`'.$link['url'].'`',
                      '<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
                      $the_tweet);
              }
          }

          echo $the_tweet;
          echo '</li>';
      } else {
          echo '
          <br /><br />
          <a href="http://twitter.com/YOURUSERNAME" target="_blank">Click here to read YOURUSERNAME\'S Twitter feed</a>';
      }
  }
?>