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

$stage = get_option('concerto_stage');

// Style Variables							
$fonts = array(
				'body' => get_option('concerto_' . $stage . '_design_fonts_body'),
				'menu' => get_option('concerto_' . $stage . '_design_fonts_menu'),
				'header' => get_option('concerto_' . $stage . '_design_fonts_header'),
				'content' => get_option('concerto_' . $stage . '_design_fonts_content'),
				'content-title' => get_option('concerto_' . $stage . '_design_fonts_content_title'),
				'sidebar' => get_option('concerto_' . $stage . '_design_fonts_sidebar'),
				'footer' => get_option('concerto_' . $stage . '_design_fonts_footer')
			);

$sizes = array(
				'body' => get_option('concerto_' . $stage . '_design_sizes_body'),
				'menu' => get_option('concerto_' . $stage . '_design_sizes_menu'),
				'header-title' => get_option('concerto_' . $stage . '_design_sizes_header_title'),
				'header-description' => get_option('concerto_' . $stage . '_design_sizes_header_description'),
				'content' => get_option('concerto_' . $stage . '_design_sizes_content'),
				'content-title' => get_option('concerto_' . $stage . '_design_sizes_content_title'),
				'content-meta' => get_option('concerto_' . $stage . '_design_sizes_content_meta'),
				'sidebar' => get_option('concerto_' . $stage . '_design_sizes_sidebar'),
				'h1' => get_option('concerto_' . $stage . '_design_sizes_h1'),
				'h2' => get_option('concerto_' . $stage . '_design_sizes_h2'),
				'h3' => get_option('concerto_' . $stage . '_design_sizes_h3'),
				'h4' => get_option('concerto_' . $stage . '_design_sizes_h4'),
				'h5' => get_option('concerto_' . $stage . '_design_sizes_h5'),
				'h6' => get_option('concerto_' . $stage . '_design_sizes_h6'),
				'footer' => get_option('concerto_' . $stage . '_design_sizes_footer')
			);

$colors = array();
$colors['background'] = array(
				'site' => get_option('concerto_' . $stage . '_design_colors_background_site'),
				'container' => get_option('concerto_' . $stage . '_design_colors_background_container'),
				'header' => get_option('concerto_' . $stage . '_design_colors_background_header'),
				'header-image' =>  ((get_option('concerto_' . $stage . '_design_header_mode') == 3 || get_option('concerto_' . $stage . '_design_header_mode') == 4) && get_option('concerto_' . $stage . '_design_header_image')) ? get_option('concerto_' . $stage . '_design_header_image'): null,
				'main' => get_option('concerto_' . $stage . '_design_colors_background_main'),
				'content' => get_option('concerto_' . $stage . '_design_colors_background_content'),
				'footer' => get_option('concerto_' . $stage . '_design_colors_background_footer'),
				'menu' => get_option('concerto_' . $stage . '_design_colors_background_menu'),
				'menu-active' => get_option('concerto_' . $stage . '_design_colors_background_menu_active'),
				'menu-hover' => get_option('concerto_' . $stage . '_design_colors_background_menu_hover'),
				'article' => get_option('concerto_' . $stage . '_design_colors_background_article'),
				'comment-odd' => get_option('concerto_' . $stage . '_design_colors_background_comment_odd'),
				'comment-even' => get_option('concerto_' . $stage . '_design_colors_background_comment_even')
			);


$colors['borders'] = array(
				'common' => get_option('concerto_' . $stage . '_design_colors_borders_common'),
				'menu' => get_option('concerto_' . $stage . '_design_colors_borders_menu'),
				'menu-active' => get_option('concerto_' . $stage . '_design_colors_borders_menu_active'),
				'menu-hover' => get_option('concerto_' . $stage . '_design_colors_borders_menu_hover'),
				'article-top' => get_option('concerto_' . $stage . '_design_colors_borders_article_top'),
				'article-bottom' => get_option('concerto_' . $stage . '_design_colors_borders_article_bottom'),
				'article' => get_option('concerto_' . $stage . '_design_colors_borders_article'),
				'comment' => get_option('concerto_' . $stage . '_design_colors_borders_comment'),
				'comment-top' => get_option('concerto_' . $stage . '_design_colors_borders_comment_top'),
				'comment-bottom' => get_option('concerto_' . $stage . '_design_colors_borders_comment_bottom'),
				'commentlist-top' => get_option('concerto_' . $stage . '_design_colors_borders_commentlist_top'),
				'commentlist-bottom' => get_option('concerto_' . $stage . '_design_colors_borders_commentlist_bottom')
			);

$colors['fonts'] = array(
				'site' => get_option('concerto_' . $stage . '_design_colors_fonts_site'),
				'header-title' => get_option('concerto_' . $stage . '_design_colors_fonts_header_title'),
				'header-description' => get_option('concerto_' . $stage . '_design_colors_fonts_header_description'),
				'menu' => get_option('concerto_' . $stage . '_design_colors_fonts_menu'),
				'menu-active' => get_option('concerto_' . $stage . '_design_colors_fonts_menu_active'),
				'menu-hover' => get_option('concerto_' . $stage . '_design_colors_fonts_menu_hover'),
				'footer' => get_option('concerto_' . $stage . '_design_colors_fonts_footer'),
				'link' => get_option('concerto_' . $stage . '_design_colors_fonts_link'),
				'link-hover' => get_option('concerto_' . $stage . '_design_colors_fonts_link_hover'),
				'visited' => get_option('concerto_' . $stage . '_design_colors_fonts_link_visited'),
				'comment-meta' => get_option('concerto_' . $stage . '_design_colors_fonts_comment_meta'),
				'content-title' => get_option('concerto_' . $stage . '_design_colors_fonts_content_title'),
				'content-link' => get_option('concerto_' . $stage . '_design_colors_fonts_content_link'),
				'content-link-hover' => get_option('concerto_' . $stage . '_design_colors_fonts_content_link_hover'),
				'meta' => get_option('concerto_' . $stage . '_design_colors_fonts_content_meta'),
				'respond' => get_option('concerto_' . $stage . '_design_colors_fonts_respond')
			);

$borders = array(
				'container' => get_option('concerto_' . $stage . '_design_borders_container'),
				'header' => get_option('concerto_' . $stage . '_design_borders_header'),
				'header-top' => get_option('concerto_' . $stage . '_design_borders_header_top'),
				'header-bottom' => get_option('concerto_' . $stage . '_design_borders_header_bottom'),
				'menu' => get_option('concerto_' . $stage . '_design_borders_menu'),
				'footer' => get_option('concerto_' . $stage . '_design_borders_footer'),
				'footer-top' => get_option('concerto_' . $stage . '_design_borders_footer_top'),
				'footer-bottom' => get_option('concerto_' . $stage . '_design_borders_footer_bottom'),
				'article' => get_option('concerto_' . $stage . '_design_borders_article'),
				'article-top' => get_option('concerto_' . $stage . '_design_borders_article_top'),
				'article-bottom' => get_option('concerto_' . $stage . '_design_borders_article_bottom'),
				'comment' => get_option('concerto_' . $stage . '_design_borders_comment'),
				'comment-top' => get_option('concerto_' . $stage . '_design_borders_comment_top'),
				'comment-bottom' => get_option('concerto_' . $stage . '_design_borders_comment_bottom'),
				'commentlist-top' => get_option('concerto_' . $stage . '_design_borders_commentlist_top'),
				'commentlist-bottom' => get_option('concerto_' . $stage . '_design_borders_commentlist_bottom'),
				'table' => get_option('concerto_' . $stage . '_design_borders_table')
			);

// Width Assignments
$width = array(
		'content' => ($content = get_option('concerto_' . $stage . '_design_layout_columns_width_content')) ? $content: 600,
		'sidebar1' => ($sidebar1 = get_option('concerto_' . $stage . '_design_layout_columns_width_sidebar1')) ? $sidebar1: 300,
		'sidebar2' => (get_option('concerto_' . $stage . '_design_layout_columns') == 3) ? get_option('concerto_' . $stage . '_design_layout_columns_width_sidebar2'): 0
	);
$width['container'] = (get_option('concerto_' . $stage . '_design_layout_columns_width_content') + get_option('concerto_' . $stage . '_design_layout_columns_width_sidebar1')) + (get_option('concerto_' . $stage . '_design_page_padding') * 4) + 18 + ($borders['container'] * 2);
$width['container'] += (get_option('concerto_' . $stage . '_design_layout_columns') == 3) ? ($width['sidebar2'] + 30) + ($borders['container'] * 3): 0;

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
foreach ($borders as $element => $size) {
	$inherit = explode('-', $size);
	if (count($inherit) > 1) {
		if ($inherit[0] == 'inherit') {
			$borders[$element] = $borders[$inherit[1]];
		}
	}
}

function blackorwhite($hex) {
        $hex = str_replace('#', '', $hex);
        $red = hexdec(substr($hex, 0,2));
        $green = hexdec(substr($hex, 2,2));
        $blue = hexdec(substr($hex, 4,2));
		if ($red >= 127 && $green >= 127 && $blue >= 127) {
			return '000000';
		} else {
			return 'ffffff';
		}
}

function torgba($hex) {
        $hex = str_replace('#', '', $hex);
        $red = hexdec(substr($hex, 0,2));
        $green = hexdec(substr($hex, 2,2));
        $blue = hexdec(substr($hex, 4,2));
        return array($red, $green, $blue);
}

// Border Assignments [header,footer,article,comment]

if (true) {
// Display as a CSS file
header('Content-type: text/css');
?>
/**
 * This file was generated by Concerto <?php echo CONCERTO_VERSION . "\n"; ?>
 */
body{font-family:<?php echo $fonts['body']; ?>;background-color:<?php echo $colors['background']['site']; ?>;color:<?php echo $colors['fonts']['site']; ?>;font-size:<?php echo $sizes['body']; ?>px;line-height:<?php echo $sizes['body'] + 6; ?>px;}
#header{border-bottom:<?php echo $borders['header-bottom']; ?>px solid <?php echo $colors['borders']['common']; ?>;background-color:<?php echo $colors['background']['header']; ?><?php echo ($colors['background']['header-image']) ? ";background-image:url('" . $colors['background']['header-image'] . "');background-repeat:no-repeat;background-position:center;background-attachment:scroll": ''; ?>; }
#branding{padding:<?php echo get_option('concerto_' . $stage . '_design_page_padding') + 50; ?>px <?php echo get_option('concerto_' . $stage . '_design_page_padding'); ?>px <?php echo get_option('concerto_' . $stage . '_design_page_padding') + 20; ?>px;}
#branding #site-title{font-family:<?php echo $fonts['header']; ?>;font-size:<?php echo $sizes['header-title']; ?>px;}
#branding #site-title a{color:<?php echo $colors['fonts']['header-title']; ?>;}
#branding p#site-description{font-size:<?php echo $sizes['header-description']; ?>px;color:<?php echo $colors['fonts']['header-description']; ?>;}
#access{margin-bottom:-<?php echo $borders['menu']; ?>px;}
#access .menu{width:<?php echo $width['container'] - (get_option('concerto_' . $stage . '_design_page_padding') * 2); ?>px;padding:0 <?php echo get_option('concerto_' . $stage . '_design_page_padding'); ?>px;}
#access ul li a{font-family:<?php echo $fonts['menu']; ?>;color:<?php echo $colors['fonts']['menu']; ?>;background-color:<?php echo $colors['background']['menu']; ?>;border:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu']; ?>;border-bottom:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;}
#access ul li.current_page_item a,#access ul li.current_page_item a:hover,#access ul li.current_page_parent a{border:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;border-bottom:<?php echo $borders['menu']; ?>px solid transparent;}
#access ul li a:hover{border:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-hover']; ?>;}
#access ul li a.active{border:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;border-bottom:<?php echo $borders['menu']; ?>px solid transparent;}
#access ul li ul.children{border:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;margin-top:-<?php echo $borders['menu']; ?>px;}
#access ul li ul.children li a{border-top:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;}
#access ul li ul.children li a:hover{border-top:<?php echo $borders['menu']; ?>px solid <?php echo $colors['borders']['menu-active']; ?>;}
.container {width:<?php echo $width['container']; ?>px; margin: 0 AUTO; padding: <?php echo get_option('concerto_' . $stage . '_design_page_padding'); ?>px; }
.normal-page #main {background-color:<?php echo $colors['background']['main']; ?>; }
.normal-page #main .container {background-color:<?php echo $colors['background']['content']; ?>; }
.normal-page #content {width:<?php echo $width['content']; ?>px;border-right:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.custom-page #content{padding:<?php echo get_option('concerto_' . $stage . '_design_page_padding'); ?>px;}
.context-title{padding:0 <?php echo get_option('concerto_' . $stage . '_design_article_padding'); ?>px <?php echo get_option('concerto_' . $stage . '_design_article_padding') + get_option('concerto_' . $stage . '_design_article_padding'); ?>px;}
#footer{font-size:<?php echo $sizes['footer']; ?>px;border-top:<?php echo $borders['footer-top']; ?>px solid <?php echo $colors['borders']['common']; ?>;background-color:<?php echo $colors['background']['footer']; ?>;color:<?php echo $colors['fonts']['footer']; ?>;}
.sidebars{font-family:<?php echo $fonts['sidebar']; ?>;font-size:<?php echo $sizes['sidebar']; ?>px;line-height:<?php echo $sizes['sidebar'] + 7; ?>px;}
.concerto_sidebar_main{border-left:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;width:<?php echo $width['sidebar1']; ?>px;margin-left:-<?php echo $borders['container']; ?>px;}
.concerto_sidebar_secondary{border-left:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;width:<?php echo $width['sidebar2']; ?>px;}
.wrapped #header, .wrapped #footer{border-width: <?php echo $borders['container']; ?>px;}
.wrapped #access .menu{width:<?php echo $width['container']; ?>px;}
.wrapped #main{background-color:<?php echo $colors['background']['content']; ?>;border-left:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;border-right:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.post,.page{margin-bottom:<?php echo get_option('concerto_' . $stage . '_design_page_padding') + 20; ?>px;}
.type-post,.type-page{padding:<?php echo get_option('concerto_' . $stage . '_design_article_padding'); ?>px <?php echo get_option('concerto_' . $stage . '_design_article_padding'); ?>px <?php echo get_option('concerto_' . $stage . '_design_article_padding') + 20; ?>px;}
.entry-title,.entry-title a{font-family:<?php echo $fonts['content-title']; ?>;font-size:<?php echo $sizes['content-title']; ?>px;color:<?php echo $colors['fonts']['content-title']; ?>;line-height:<?php echo $sizes['content-title'] + 2; ?>px;}
.entry-meta{font-family:<?php echo $fonts['content']; ?>;color:<?php echo $colors['fonts']['comment-meta']; ?>;font-size:<?php echo $sizes['content-meta']; ?>px;line-height:<?php echo $sizes['content-meta'] + 5; ?>px;}
.entry-meta a{color:<?php echo $colors['fonts']['comment-meta']; ?>;}
.entry-content{font-family:<?php echo $fonts['content']; ?>;font-size:<?php echo $sizes['content']; ?>px;line-height:<?php echo $sizes['content'] + 7; ?>px;}
.entry-utility,.entry-utility a{font-family:<?php echo $fonts['content']; ?>;color:<?php echo $colors['fonts']['comment-meta']; ?>;font-size:<?php echo $sizes['content-meta']; ?>px;}
.entry-utility #entry-author-info{border: 1px solid <?php echo $colors['borders']['common']; ?>;background-color:<?php echo $colors['background']['header']; ?>;}
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
#content .navigation{font-family:<?php echo $fonts['content']; ?>;padding:0 <?php echo get_option('concerto_' . $stage . '_design_article_padding'); ?>px;}
#content .navigation a{color:<?php echo $colors['fonts']['comment-meta']; ?>;font-size:<?php echo $sizes['content-meta']; ?>px;font-family:<?php echo $fonts['content']; ?>;}
#content table{border:1px solid <?php echo $colors['borders']['common']; ?>;}
#content table td,#content table th{border-bottom:<?php echo $borders['table']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.entry-title a:hover,.entry-meta a:hover,.entry-utility a:hover{color:<?php echo $colors['fonts']['content-link']; ?>;}
.normal-page #content .entry-content img{max-width:<?php echo $width['content'] - 15; ?>px;} /* image widths should be dynamic */
.normal-page #content .entry-content .attachment img{max-width:<?php echo $width['content']; ?>px;}
#comments{font-family:<?php echo $fonts['content']; ?>;padding:0 <?php echo get_option('concerto_' . $stage . '_design_article_padding'); ?>px;}
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
/*columns*/
.column2order.normal-page #content{border-left:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.column2order .sidebars{border-right:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.column2order.normal-page #content{border-left:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.column2order .sidebars{<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;margin-right:-<?php echo $borders['container']; ?>px;}
.column3order .concerto_sidebar_main{margin-left:-<?php echo $borders['container']; ?>px;}
.column4order.normal-page #content{border-left:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.column4order .concerto_sidebar_main{border-right:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;margin-right:-<?php echo $borders['container']; ?>px;}
.column4order .concerto_sidebar_secondary{margin-left:-<?php echo $borders['container']; ?>px;}
.column5order.normal-page #content{border-left:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.column5order .concerto_sidebar_main{border-right:<?php echo $borders['container']; ?>px solid <?php echo $colors['borders']['common']; ?>;}
.column5order .concerto_sidebar_secondary{margin-left:-<?php echo $borders['container']; ?>px;}
<?php if (get_option('concerto_' . $stage . '_design_glow') == 1) { ?>.wrapped #main {-moz-box-shadow: 0 0 10px rgba(<?php echo implode(',', torgba(blackorwhite($colors['background']['site']))); ?>,0.2);-webkit-box-shadow: 0 0 10px rgba(<?php echo implode(',', torgba(blackorwhite($colors['background']['site']))); ?>,0.2);}<?php } ?>
<?php if (get_option('concerto_' . $stage . '_design_engrave') == 1) { ?>#main {text-shadow: 0 1px 0 rgba(<?php echo implode(',', torgba(blackorwhite($colors['fonts']['site']))); ?>,0.3);}<?php } ?>
<?php
	}
?>