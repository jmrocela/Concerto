<?php
/*!
 * Concerto - a fresh and new wordpress theme framework for everyone
 *
 * http://themeconcert.com/concerto
 *
 * @version: 1.0
 * @package: Concerto
 *
 * [WARNING]
 * This is restricted file and should not be modified in any way(unless you know what
 * you are doing).
 */

/**
 * Include the Theme Files
 */
require_once CONCERTO_FUNCS . 'helpers.php';
require_once CONCERTO_FUNCS . 'document.php';
require_once CONCERTO_FUNCS . 'loop.php';
require_once CONCERTO_FUNCS . 'article.php';
require_once CONCERTO_FUNCS . 'comments.php';
require_once CONCERTO_FUNCS . 'comment.php';
require_once CONCERTO_FUNCS . 'widgets.php';
	
/**
 * Include the Page Files
 */
require_once CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'head.php';
require_once CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . CONCERTO_CONFIG_LAYOUT . '.php';
require_once CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'foot.php';

?>