<?php
/*!
 * Concerto 1.0 beta
 * http://themeconcert.com/concerto
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing). This file serves as the Base Class for setting up administration pages.
 */

/**
 * Include the Theme Files
 */
require CONCERTO_FUNCS . 'helpers.php';
require CONCERTO_FUNCS . 'document.php';
require CONCERTO_FUNCS . 'loop.php';
require CONCERTO_FUNCS . 'article.php';
require CONCERTO_FUNCS . 'comments.php';
require CONCERTO_FUNCS . 'comment.php';
require CONCERTO_FUNCS . 'widgets.php';
	
/**
 * Include the Page Files
 */
require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'head.php';
require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . CONCERTO_CONFIG_LAYOUT . '.php';
require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'foot.php';

?>