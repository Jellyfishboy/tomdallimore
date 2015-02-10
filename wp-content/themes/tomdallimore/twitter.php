<?php
  $tweets = getTweets('tom_dallimore', 3);
  foreach($tweets as $tweet){

      if($tweet['text']){
        echo '<li>';
          $the_tweet = $tweet['text'];
          foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
              $the_tweet = preg_replace(
                  '/@'.$user_mention['screen_name'].'/i',
                  '<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
                  $the_tweet);
          }
          foreach($tweet['entities']['hashtags'] as $key => $hashtag){
              $the_tweet = preg_replace(
                  '/#'.$hashtag['text'].'/i',
                  '<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank">#'.$hashtag['text'].'</a>',
                  $the_tweet);
          }
          foreach($tweet['entities']['urls'] as $key => $link){
              $the_tweet = preg_replace(
                  '`'.$link['url'].'`',
                  '<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
                  $the_tweet);
          }
          echo $the_tweet;
          echo '<span>'.humanTiming(strtotime($tweet['created_at'])) . ' ago</span>';
          echo '</li>';
      } else {
          echo '
          <br /><br />
          <a href="http://twitter.com/YOURUSERNAME" target="_blank">Click here to read YOURUSERNAME\'S Twitter feed</a>';
      }
  }
  function humanTiming ($time)
  {

      $time = time() - $time; // to get the time since that moment

      $tokens = array (
          31536000 => 'year',
          2592000 => 'month',
          604800 => 'week',
          86400 => 'day',
          3600 => 'hour',
          60 => 'minute',
          1 => 'second'
      );

      foreach ($tokens as $unit => $text) {
          if ($time < $unit) continue;
          $numberOfUnits = floor($time / $unit);
          return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
      }

  }
?>