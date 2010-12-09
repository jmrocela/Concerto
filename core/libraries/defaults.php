<?php
update_option('concerto_options', 
		array(
			'install' => array(
							'version' => '1.0',
							'level' => 'beta',
							'license' => 'personal',
							'license_on' => 'http://projects/concerto/',
							'license_key' => 'a26de47be042ec06bbn3',
						),
			'general' => array(
							'syndication_url' => '',
							'scripts_head' => '',
							'scripts_footer' => '',
							'scripts_libraries' => array(
													'jquery' => false,
													'jquery_ui' => false
												),
							'menu' => 'default',
							'menu_items' => '{}', //serialized
							'show_home' => true,
							'show_feed' => true,
							'stage' => 'default',
							'language' => 'adm_en_us'
						),
			'design' => array(
							'html_version' => 5,
							'page_structure' => 'fullwidth',
							'paginate' => true,
							'layout_columns' => 2,
							'layout_columns_order' => 1,
							'layout_columns_width' => array(
														'content' => 580,
														'sidebar' => 300,
														'sidebar' => 0,
													),
							'page_padding' => 10,
							'divide_factor' => 8.7878, // makes the divider appear between the main content and the sidebars
							
							'header' => array(
											'title' => true,
											'description' => true,
										),
							'bylines' => array(
											'page' => array(
															'author' => true,
															'published_date' => true,
													  ),
											'post' => array(
															'author' => true,
															'published_date' => true,
													  )
										),
							'meta' => array(
											'show_edit_link' => true,
											'comment_number' => true,
											'categories' => true,
											'tags' => true,
										),
							'posts' => array(
											'excerpts' => false,
											'readmore_text' => '',
											'posts_navigations' => true,
										),
							'comments' => array(
											'is_closed_show_message' => true,
										),
							'archive_display' => 'excerpts',
							
							'fonts' => array(
											'body' => 'arial',
											'menu' => 'inherit-body',
											'header' => 'inherit-body',
											'content' => 'georgia',
											'content-header' => 'arial',
											'sidebar' => 'inherit-content',
											'footer' => 'inherit-body',
										),
							'sizes' => array(
											'body' => 12,
											'menu' => 'inherit-body',
											'header-title' => 40,
											'header-description' => 14,
											'content' => 15,
											'content-title' => 28,
											'content-meta' => 13,
											'h1' => 28,
											'h2' => 25,
											'h3' => 20,
											'h4' => 16,
											'h5' => 14,
											'h6' => 12
										),
							'colors' => array(
											'background' => array(
																'site' => '#ffffff',
																'container' => '#ffffff',
																'header' => '#fdfdfd',
																'content' => '#ffffff',
																'footer' => '#fdfdfd',
																'menu' => '#ffffff',
																'menu-active' => '#ffffff',
																'menu-hover' => '#ffffff',
																'article' => '#ffffff',
																'comment-odd' => '#fafafa',
																'comment-even' => '#ffffff'
															),
											'borders' => array(
																'common' => '#dddddd',
																'menu' => '#eeeeee',
																'menu-active' => '#dddddd',
																'menu-hover' => '#dddddd',
																'article-top' => 'transparent',
																'article-bottom' => 'transparent',
																'article' => 'transparent',
																'comment' => 'transparent',
																'comment-top' => 'transparent',
																'comment-bottom' => '#e7e7e7',
																'commentlist-top' => '#e7e7e7'
															),
											'fonts' => array(
																'site' => '#000000',
																'header-title' => '#000000',
																'header-description' => '#666666',
																'menu' => '#000000',
																'menu-active' => '#000000',
																'menu-hover' => '#000000',
																'footer' => '#666666',
																'link' => '#245cba',
																'link-hover' => '#ff4b33',
																'byline', => '#666666',
																'content-link' => '#245cba',
																'content-link-hover' => '#ff4b33',
																'meta' => '#666666',
																'respond' => '#888888',
															)
										),
							'borders' => array(
											'container' => 0,
											'header' => 0,
											'header-top' => 0,
											'header-bottom' => 1,
											'menu' => 1,
											'footer' => 0,
											'footer-top' => 1,
											'footer-bottom' => 0,
											'article' => 0,
											'article-top' => 0,
											'article-bottom' => 0,
											'comment' => 0,
											'comment-top' => 0,
											'comment-bottom' => 1,
											'commentlist-top' => 1
										),
							'comments' => array(
											'position' = '{}', //serialized [comments, trackbacks, respond]
											'display' => array(
															'number' => '',
															'avatar' => '',
															'author' => '',
															'date' => '',
															'edit' => '',
														),
											'avatar-size' => 40,
											'time' => true,
											'time-format' => 'F j, Y',
											'body' => '{}', //serialized [vcard, body, reply]
											'trackback-date' => true,
										),
							'glow' => false, // add a glow effect to the outer borders of your page
							'engrave' => false, // add an engrave effect to texts
						),
			'extensions' => array(
							'cache' => array(
											'enabled' => false,
										),
							'seo' => array(
											'enabled' => false,
										),
							'social' => array(
											'enabled' => false,
										),
							'thumbnail' => array(
											'enabled' => false,
										),
						)
		)
	);
?>