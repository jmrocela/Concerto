<?php
/*!
 * Concerto 1.0 beta
 * http://themeconcert.com/concerto
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing). This file serves as the Base Class for setting up administration pages.
 */

require '../../../../../wp-config.php';





// Style Variables							
$fonts = array(
				'body' => get_option('concerto_design_fonts_body'),
				'menu' => get_option('concerto_design_fonts_menu'),
				'header' => get_option('concerto_design_fonts_header'),
				'content' => get_option('concerto_design_fonts_content'),
				'content-title' => get_option('concerto_design_fonts_content_title'),
				'sidebar' => get_option('concerto_design_fonts_sidebar'),
				'footer' => get_option('concerto_design_fonts_footer')
			);

$sizes = array(
				'body' => get_option('concerto_design_sizes_body'),
				'menu' => get_option('concerto_design_sizes_menu'),
				'header-title' => get_option('concerto_design_sizes_header_title'),
				'header-description' => get_option('concerto_design_sizes_header_description'),
				'content' => get_option('concerto_design_sizes_content'),
				'content-title' => get_option('concerto_design_sizes_content_title'),
				'content-meta' => get_option('concerto_design_sizes_content_meta'),
				'sidebar' => get_option('concerto_design_sizes_sidebar'),
				'h1' => get_option('concerto_design_sizes_h1'),
				'h2' => get_option('concerto_design_sizes_h2'),
				'h3' => get_option('concerto_design_sizes_h3'),
				'h4' => get_option('concerto_design_sizes_h4'),
				'h5' => get_option('concerto_design_sizes_h5'),
				'h6' => get_option('concerto_design_sizes_h6'),
				'footer' => get_option('concerto_design_sizes_footer')
			);

$colors['background'] = array(
				'site' => get_option('concerto_design_colors_background_site'),
				'container' => get_option('concerto_design_colors_background_container'),
				'header' => get_option('concerto_design_colors_background_header'),
				'main' => get_option('concerto_design_colors_background_main'),
				'content' => get_option('concerto_design_colors_background_content'),
				'footer' => get_option('concerto_design_colors_background_footer'),
				'menu' => get_option('concerto_design_colors_background_menu'),
				'menu-active' => get_option('concerto_design_colors_background_menu_active'),
				'menu-hover' => get_option('concerto_design_colors_background_menu_hover'),
				'article' => get_option('concerto_design_colors_background_article'),
				'comment-odd' => get_option('concerto_design_colors_background_comment_odd'),
				'comment-even' => get_option('concerto_design_colors_background_comment_even')
			);

$colors['borders'] = array(
				'common' => get_option('concerto_design_colors_borders_common'),
				'menu' => get_option('concerto_design_colors_borders_menu'),
				'menu-active' => get_option('concerto_design_colors_borders_menu_active'),
				'menu-hover' => get_option('concerto_design_colors_borders_menu_hover'),
				'article-top' => get_option('concerto_design_colors_borders_article_top'),
				'article-bottom' => get_option('concerto_design_colors_borders_article_bottom'),
				'article' => get_option('concerto_design_colors_borders_article'),
				'comment' => get_option('concerto_design_colors_borders_comment'),
				'comment-top' => get_option('concerto_design_colors_borders_comment_top'),
				'comment-bottom' => get_option('concerto_design_colors_borders_comment_bottom'),
				'commentlist-top' => get_option('concerto_design_colors_borders_commentlist_top'),
				'commentlist-bottom' => get_option('concerto_design_colors_borders_commentlist_bottom')
			);

$colors['fonts'] = array(
				'site' => get_option('concerto_design_colors_fonts_site'),
				'header-title' => get_option('concerto_design_colors_fonts_header_title'),
				'header-description' => get_option('concerto_design_colors_fonts_header_description'),
				'menu' => get_option('concerto_design_colors_fonts_menu'),
				'menu-active' => get_option('concerto_design_colors_fonts_menu_active'),
				'menu-hover' => get_option('concerto_design_colors_fonts_menu_hover'),
				'footer' => get_option('concerto_design_colors_fonts_footer'),
				'link' => get_option('concerto_design_colors_fonts_link'),
				'link-hover' => get_option('concerto_design_colors_fonts_link_hover'),
				'visited' => get_option('concerto_design_colors_fonts_link_visited'),
				'comment-meta' => get_option('concerto_design_colors_fonts_comment_meta'),
				'content-title' => get_option('concerto_design_colors_fonts_content_title'),
				'content-link' => get_option('concerto_design_colors_fonts_content_link'),
				'content-link-hover' => get_option('concerto_design_colors_fonts_content_link_hover'),
				'meta' => get_option('concerto_design_colors_fonts_content_meta'),
				'respond' => get_option('concerto_design_colors_fonts_respond')
			);

$borders = array(
				'container' => get_option('concerto_design_borders_container'),
				'header' => get_option('concerto_design_borders_header'),
				'header-top' => get_option('concerto_design_borders_header_top'),
				'header-bottom' => get_option('concerto_design_borders_header_bottom'),
				'menu' => get_option('concerto_design_borders_menu'),
				'footer' => get_option('concerto_design_borders_footer'),
				'footer-top' => get_option('concerto_design_borders_footer_top'),
				'footer-bottom' => get_option('concerto_design_borders_footer_bottom'),
				'article' => get_option('concerto_design_borders_article'),
				'article-top' => get_option('concerto_design_borders_article_top'),
				'article-bottom' => get_option('concerto_design_borders_article_bottom'),
				'comment' => get_option('concerto_design_borders_comment'),
				'comment-top' => get_option('concerto_design_borders_comment_top'),
				'comment-bottom' => get_option('concerto_design_borders_comment_bottom'),
				'commentlist-top' => get_option('concerto_design_borders_commentlist_top'),
				'commentlist-bottom' => get_option('concerto_design_borders_commentlist_bottom'),
				'table' => get_option('concerto_design_borders_table')
			);

// Width Assignments
$width = array(
		'container' => (get_option('concerto_design_layout_columns_width_content') + get_option('concerto_design_layout_columns_width_sidebar1') + get_option('concerto_design_layout_columns_width_sidebar2')) + (get_option('concerto_design_page_padding') * 4) + 20,
		'content' => get_option('concerto_design_layout_columns_width_content'),
		'sidebar1' => get_option('concerto_design_layout_columns_width_sidebar1'),
		'sidebr2' => get_option('concerto_design_layout_columns_width_sidebar2')
	);
	
// Font Assignments
foreach ($fonts as $element => $font) {
	$inherit = explode('-', $font);
	if (count($inherit) > 1) {
		if ($inherit[0] == 'inherit') {
			$fonts[$element] = $fonts[$inherit[1]];
		}
	}
}
foreach ($sizes as $element => $size) {
	$inherit = explode('-', $size);
	if (count($inherit) > 1) {
		if ($inherit[0] == 'inherit') {
			$sizes[$element] = $sizes[$inherit[1]];
		}
	}
}

// Border Assignments [header,footer,article,comment]

// Separate definition for wrapped page layout

if (true) {
// Display as a CSS file
header('Content-type: text/css');
?>
/**
 * This file was generated by Concerto <?php echo CONCERTO_VERSION . "\n"; ?>
 */
body{font-family:<?php echo $fonts['body']; ?>;background:<?php echo $colors['background']['site']; ?>;color:<?php echo $colors['fonts']['site']; ?>;font-size:<?php echo $sizes['body']; ?>px;line-height:<?php echo $sizes['body'] + 6; ?>px;}
#header{border-bottom:<?php echo $borders['header-bottom']; ?>px solid <?php echo $colors['borders']['common']; ?>;background:<?php echo $colors['background']['header']; ?>;}
#branding{padding:<?php echo get_option('concerto_design_page_padding') + 50; ?>px <?php echo get_option('concerto_design_page_padding'); ?>px <?php echo get_option('concerto_design_page_padding') + 20; ?>px;}
#branding h1#site-title{font-family:<?php echo $fonts['header']; ?>;font-size:<?php echo $sizes['header-title']; ?>px;}
#branding h1#site-title a{color:<?php echo $colors['fonts']['header-title']; ?>;}
#branding p#site-description{font-size:<?php echo $sizes['header-description']; ?>px;color:<?php echo $colors['fonts']['header-description']; ?>;}
#access{margin-bottom:-<?php echo $borders['menu']; ?>px;}
#access .menu{width:<?php echo $width['container'] - (get_option('concerto_design_page_padding') * 2); ?>px;padding:0 <?php echo get_option('concerto_design_page_padding'); ?>px;}
#access ul li a{font-family:<?php echo $fonts['menu']; ?>;color:<?php echo $colors['fonts']['menu']; ?>;background:<?php echo $colors['background']['menu']; ?>;border:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu']; ?>;border-bottom:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;}
#access ul li.current_page_item a,#access ul li.current_page_item a:hover{border:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;border-bottom:<?php echo $borders['menu']; ?>px solid transparent;}
#access ul li a:hover{border:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-hover']; ?>;}
#access ul li a.active{border:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;border-bottom:<?php echo $borders['menu']; ?>px solid transparent;}
#access ul li ul.children{border:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;margin-top:-<?php echo $borders['menu']; ?>px;}
#access ul li ul.children li a{border-top:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;}
#access ul li ul.children li a:hover{border-top:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;}
.container {width:<?php echo $width['container']; ?>px; margin: 0 AUTO; padding: <?php echo get_option('concerto_design_page_padding'); ?>px; }
.normal-page #main .container {background:<?php echo $colors['background']['main']; ?>; }
.normal-page #content {width:<?php echo $width['content']; ?>px;border-right:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.custom-page #content{padding:<?php echo get_option('concerto_design_page_padding'); ?>px;}
#footer{font-size:<?php echo $sizes['footer']; ?>px;border-top:<?php echo $borders['footer-top']; ?>px solid <?php echo $colors['borders']['common']; ?>;background:<?php echo $colors['background']['footer']; ?>;color:<?php echo $colors['fonts']['footer']; ?>;}
.sidebars{border-left:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;width:<?php echo get_option('concerto_design_layout_columns_width_sidebar1') - get_option('concerto_design_layout_columns_width_sidebar2'); ?>px;font-family:<?php echo $fonts['sidebar']; ?>;font-size:<?php echo $sizes['sidebar']; ?>px;line-height:<?php echo $sizes['sidebar'] + 7; ?>px;}
.wrapped #header, .wrapped #footer{border-width: <?php echo $borders['container']; ?>px;}
.wrapped #access .menu{width:<?php echo $width['container']; ?>px;}
.wrapped #main{background:<?php echo $colors['background']['main']; ?>;border-left:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;border-right:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.post,.page{margin-bottom:<?php echo get_option('concerto_design_page_padding') + 20; ?>px;}
.type-post,.type-page{padding:<?php echo get_option('concerto_design_page_padding'); ?>px <?php echo get_option('concerto_design_page_padding'); ?>px <?php echo get_option('concerto_design_page_padding') + 20; ?>px;}
.entry-title,.entry-title a{font-family:<?php echo $fonts['content-title']; ?>;font-size:<?php echo $sizes['content-title']; ?>px;color:<?php echo $colors['fonts']['content-title']; ?>;line-height:<?php echo $sizes['content-title'] + 2; ?>px;}
.entry-meta{font-family:<?php echo $fonts['content']; ?>;color:<?php echo $colors['fonts']['comment-meta']; ?>;font-size:<?php echo $sizes['content-meta']; ?>px;line-height:<?php echo $sizes['content-meta'] + 5; ?>px;}
.entry-meta a{color:<?php echo $colors['fonts']['comment-meta']; ?>;}
.entry-content{font-family:<?php echo $fonts['content']; ?>;font-size:<?php echo $sizes['content']; ?>px;line-height:<?php echo $sizes['content'] + 7; ?>px;}
.entry-utility,.entry-utility a{font-family:<?php echo $fonts['content']; ?>;color:<?php echo $colors['fonts']['comment-meta']; ?>;font-size:<?php echo $sizes['content-meta']; ?>px;}
.entry-utility #entry-author-info{border: 1px solid <?php echo $colors['borders']['common']; ?>;background:<?php echo $colors['background']['header']; ?>;}
.entry-utility #author-description h2{color:<?php echo $colors['fonts']['header-title']; ?>;}
.entry-utility #author-description #author-link a{color:<?php echo $colors['fonts']['link']; ?>;}
.sidebars a:hover{color:<?php echo $colors['fonts']['link-hover']; ?>;}
#content .entry-content a:visited{color:<?php echo $colors['fonts']['visited']; ?>;}
#content .entry-content h1{font-size:<?php echo $sizes['h1']; ?>px;font-family:<?php echo $fonts['content-title']; ?>;}
#content .entry-content h2{font-size:<?php echo $sizes['h2']; ?>px;font-family:<?php echo $fonts['content-title']; ?>;}
#content h3{font-size:<?php echo $sizes['h3']; ?>px;}
#content h4{font-size:<?php echo $sizes['h4']; ?>px;font-family:<?php echo $fonts['content-title']; ?>;}
#content h5{font-size:<?php echo $sizes['h5']; ?>px;}
#content h6{font-size:<?php echo $sizes['h6']; ?>px;}
#content .entry-content hr{border:0;border-top:1px solid <?php echo $colors['borders']['common']; ?>;height:1px;}
#content .navigation{font-family:<?php echo $fonts['content']; ?>;padding:0 <?php echo get_option('concerto_design_article_padding'); ?>px;}
#content .navigation a{color:<?php echo $colors['fonts']['comment-meta']; ?>;font-size:<?php echo $sizes['content-meta']; ?>px;font-family:<?php echo $fonts['content']; ?>;}
#content table{border:1px solid <?php echo $colors['borders']['common']; ?>;}
#content table td,#content table th{border-bottom:<?php echo $borders['table']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.entry-title a:hover,.entry-meta a:hover,.entry-utility a:hover{color:<?php echo $colors['fonts']['content-link']; ?>;}
.normal-page #content .entry-content img{max-width:<?php echo $width['content']; ?>px;}
.normal-page #content .entry-content .attachment img{max-width:<?php echo $width['content']; ?>px;}
#comments{font-family:<?php echo $fonts['content']; ?>;padding:0 <?php echo get_option('concerto_design_article_padding'); ?>px;}
h3#comments-title,h3#reply-title{color:<?php echo $colors['fonts']['site']; ?>;font-size:<?php echo $sizes['h3']; ?>px;}
.commentlist{font-family:<?php echo $fonts['content']; ?>;border-top:<?php echo $borders['commentlist-top']; ?>px solid <?php echo $colors['borders']['commentlist-top']; ?>;border-bottom:<?php echo $borders['commentlist-bottom']; ?>px solid <?php echo $colors['borders']['commentlist-bottom']; ?>;}
.commentlist li.comment{border-top:<?php echo $borders['comment-top']; ?>px solid <?php echo $colors['borders']['comment-top']; ?>;border-bottom:<?php echo $borders['comment-bottom']; ?>px solid <?php echo $colors['borders']['comment-bottom']; ?>;}
.commentlist li:last-child{border-bottom:none;}
.pinglist{border-bottom:1px solid <?php echo $colors['borders']['comment-bottom']; ?>;}
#respond{font-family:<?php echo $fonts['content']; ?>;}
#respond .required{color:<?php echo $colors['fonts']['content-link-hover']; ?>;font-weight:700;}
#respond label{color:<?php echo $colors['fonts']['respond']; ?>;}
#respond .form-allowed-tags{color:<?php echo $colors['fonts']['respond']; ?>;}
.widget_search{border:1px solid <?php echo $colors['borders']['common']; ?>;}
.comment-meta a:active,.comment-meta a:hover,.reply a:hover,a.comment-edit-link:hover{color:<?php echo $colors['fonts']['content-link-hover']; ?>;}
<?php
	}
?>