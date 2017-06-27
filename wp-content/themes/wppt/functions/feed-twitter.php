<?php
/**
 * Get Twitter posts
 */

function get_twitter(){

	$SETUP = array('USER' =>  get_config(PM::get_option( 'social', 'twitter' )), 'MAXIMUM_ROWS' => 20);
	// DEFINES
	foreach ($SETUP as $i => $v) {
		if ($i == 'DATE_FORMAT' && $v == '') {
			define("DATE_FORMAT", 'g:m A M jS'); // Default, incase left blank
		} else {
			define("$i", $v);
		}
	}

	include_once('/var/www/shared/twitterincludes/CacheTwitter.php');
	$t = new CacheTwitter(10); // 10 min cache
	$twitterAvailable = $t->twitterAvailable();
	$userTimeline = $t->userTimeline(USER, MAXIMUM_ROWS);

	if ($twitterAvailable):
		if ($userTimeline):
			foreach ($userTimeline as $tweet):

				$hasImage = (property_exists($tweet->entities, 'media'));

				$twitterPosts[strtotime($tweet->created_at)] = [
					'content'=>twitter::convertLinks($tweet->text),
					'hasImage'=>$hasImage,
					'image'=>($hasImage ? $tweet->entities->media[0]->media_url : null),
					'platform'=>'twitter',
					'user'=>'@'.$tweet->user->screen_name,
					'url'=>'http://www.twitter.com/'.$tweet->user->screen_name.'/status/'.$tweet->id,
					'popularity'=>$tweet->retweet_count + $tweet->favorite_count
				];

			endforeach;
		endif;
	endif;

	return $twitterPosts;

}