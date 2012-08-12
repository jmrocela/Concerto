<?php
/*!
 * Concerto - a fresh and new wordpress theme framework for everyone
 *
 * http://themeconcert.com/concerto
 *
 * @version: 1.0
 * @package: Concerto
 * @copyright: see LICENSE
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing).
 */

/**
 * Build the Concerto Navigation
 */
function buildConcertoNavigation() {
	global $stage;

	$container = (CONCERTO_CONFIG_HTML == 5) ? 'nav': 'div';
	$pre = '<' . $container . ' class="menu"><ul>';
	$post = '</ul></' . $container . '>';
	
	$pages = (get_option('concerto_' . $stage . '_general_menu_use_pages') == 1 && get_option('concerto_' . $stage . '_general_menu_pages_items')) ? wp_list_pages(array('title_li' => '', 'echo' => 0, 'include' => implode(',', get_option('concerto_' . $stage . '_general_menu_pages_items')))): '';
	$categories = (get_option('concerto_' . $stage . '_general_menu_use_categories') == 1 && get_option('concerto_' . $stage . '_general_menu_categories_items')) ? wp_list_categories(array('depth' => 1, 'title_li' => '', 'echo' => 0, 'include' => implode(',', get_option('concerto_' . $stage . '_general_menu_categories_items')))): '';
	$tags = (get_option('concerto_' . $stage . '_general_menu_use_tags') == 1 && get_option('concerto_' . $stage . '_general_menu_tags_items')) ? wp_list_categories(array('taxonomy' => 'post_tag', 'depth' => 1, 'walker' => new Walker_Tag(), 'title_li' => '', 'echo' => 0, 'include' => implode(',', get_option('concerto_' . $stage . '_general_menu_tags_items')))): '';

	$menu = $pages . str_replace(' current-cat', ' current_page_item current-cat', $categories) . str_replace(' current-tag', ' current_page_item current-tag', $tags);

	$menu = apply_filters('concerto_filter_access', $menu);
	echo $pre . $menu . $post;
}

/**
 * Custom Walker Class for Tags
 */
class Walker_Tag extends Walker {

	var $tree_type = 'post_tag';

	var $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

	function start_el($output, $term, $depth, $args) {
		extract($args);

		$term_name = esc_attr( $term->name);
		$term_name = apply_filters( 'list_cats', $term_name, $term );
		$link = '<a href="' . get_term_link( $term, $term->taxonomy ) . '" ';
		if ( $use_desc_for_title == 0 || empty($term->description) )
			$link .= 'title="' . sprintf(__( 'View all posts tagged with %s' ), $term_name) . '"';
		else
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $term->description, $term ) ) ) . '"';
		$link .= '>';
		$link .= $term_name . '</a>';

		if ( (! empty($feed_image)) || (! empty($feed)) ) {
			$link .= ' ';

			if ( empty($feed_image) )
				$link .= '(';

			$link .= '<a href="' . get_term_feed_link( $term->term_id, $term->taxonomy, $feed_type ) . '"';

			if ( empty($feed) )
				$alt = ' alt="' . sprintf(__( 'Feed for all posts tagged with %s' ), $term_name ) . '"';
			else {
				$title = ' title="' . $feed . '"';
				$alt = ' alt="' . $feed . '"';
				$name = $feed;
				$link .= $title;
			}

			$link .= '>';

			if ( empty($feed_image) )
				$link .= $name;
			else
				$link .= "<img src='$feed_image'$alt$title" . ' />';
			$link .= '</a>';
			if ( empty($feed_image) )
				$link .= ')';
		}

		if ( isset($show_count) && $show_count )
			$link .= ' (' . intval($term->count) . ')';

		if ( isset($show_date) && $show_date ) {
			$link .= ' ' . gmdate('Y-m-d', $term->last_update_timestamp);
		}

		if ('list' == $args['style']) {
			$output .= "\t<li";
			$class = 'tag-item tag-item-'.$term->term_id;
			if (is_tag($term->slug))
				$class .=  ' current-tag';
			$output .=  ' class="'.$class.'"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}

}

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