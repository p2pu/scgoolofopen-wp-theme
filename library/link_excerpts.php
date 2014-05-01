<?php

function keep_my_links($text) {
	global $post;
	$excerpt_length = 0;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace('\]\]\>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<a>');
		$excerpt_length = 60;

		if (str_word_count($text, 0) > $excerpt_length) {
			$words = str_word_count($text, 2);
			$pos = array_keys($words);
			$text = substr($text, 0, $pos[$excerpt_length]) . '...  <a href="'. get_permalink($post->ID) .'">' . __('Countinue reading') . ' &raquo;</a>';
		}
	}
	return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'keep_my_links');

?>