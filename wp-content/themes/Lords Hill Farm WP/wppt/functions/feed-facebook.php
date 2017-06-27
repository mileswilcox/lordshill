<?php
/**
 * Get Facebook Posts
 */

function get_facebook(){
	$facebookPosts = [];

	$facebookClient = PM::get_option( 'social', 'facebook_token' );

	$access_token = PM::get_option( 'social', 'facebook_token' );
	$app_secret = PM::get_option( 'social', 'facebook_secret' );

	$count = 1;
	$char_limit = 500;

    $json = wp_remote_get('https://graph.facebook.com/'.$facebookClient.'/feed?access_token='.$access_token.'|'.$app_secret);
    $feed = json_decode($json);



	 for($i = 0; $i < $count; $i++) :

		 	$entry = $feed->data[$i];
			if (!isset($entry->message)) : $count++; continue; endif;


		 // Filter out the crap images...
		 $hasImage = (isset($entry->picture) && !strstr($entry->picture, 'safe_image') && !strstr($entry->picture, '?oh=') && !strstr($entry->picture, '130x130'));

		 $likes = (isset($entry->likes) ? count($entry->likes->data) : 0);

		 $facebookPosts[strtotime($entry->created_time)] = [
			'content'=>$entry->message,
			'hasImage'=>$hasImage,
			'image'=>($hasImage ? str_replace('_s.jpg', '_o.jpg', $entry->picture) : null),
			'link'=>$entry->link,
			'platform'=>'facebook',
			'user'=>$entry->from->name,
			'url'=>'http://www.facebook.com/'.$facebookClient.'/facebookPosts/'.str_replace($entry->from->id.'_', '', $entry->id),
			'popularity'=>$likes
		];

	 endfor;

	return $facebookPosts;

}