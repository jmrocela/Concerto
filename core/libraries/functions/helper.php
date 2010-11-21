<?php

/**
 * Article Pagination method
 * URL: http://www.artofblog.com/thesis-page-navigation/
 * Author: Adam Baird
 * Author URL: http://www.adambaird.net/
 */
function numbered_page_nav($prelabel = '', $nxtlabel = '', $pages_to_show = 6, $always_show = false) {
	global $request, $posts_per_page, $wpdb, $paged;

	$custom_range = round($pages_to_show/2);
	if (!is_single()) {
		if(!is_category()) {
			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);
		}
		else {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);
		}
		$blog_post_count = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $blog_post_count");
		$max_page = ceil($numposts /$posts_per_page);
		if(empty($paged)) {
			$paged = 1;
		}
		if($max_page > 1 || $always_show) {
			echo '<div id="nav-below" class="navigation">';
			if ($paged >= ($pages_to_show-2)) {
				echo '<div class="page-number"><a href="'.get_pagenum_link().'">1</a></div><div class="elipses">...</div>';
			}
			for($i = $paged - $custom_range; $i <= $paged + $custom_range; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
						echo '<div class="current-page-number">' . $i . '</div>';
					}
					else {
						echo '<div class="page-number"><a href="'.get_pagenum_link($i).'">'.$i.'</a></div>';
					}
				}
			}
			if (($paged+$custom_range) < ($max_page)) {
				echo '<div class="elipses">...</div><div class="page-number"><a href="'.get_pagenum_link($max_page).'">'.$max_page.'</a></div>';
			}
			echo '<div class="page-nav-intro">Page ' . $paged . ' of ' . $max_page . '</div></div>';
		}
	}
}

?>