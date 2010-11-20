<?php

class ConcertoLoop {
	
	public function __construct() {
		if (is_single()) {
			$this->single();
		} else {
			$this->index();
		}
	}
	
	public function article() {
		do_action('concerto_before_article');
		// Determine the HTML version we are using
		if (CONCERTO_CONFIG_HTML == 5) {
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<?php do_action('concerto_article_title'); ?>
				<div class="entry-meta">
					<?php do_action('concerto_article_meta'); ?>
				</div>
			</header>
			<section class="entry-content">
				<?php do_action('concerto_article_content'); ?>
			</section>
			<footer>
				<div class="entry-utility">
					<?php do_action('concerto_article_utility'); ?>
				</div>
			</footer>
		</article>
		<?php
		} else {
			// not HTML5 markup still not done
		}
		do_action('concerto_after_article');
		do_action('concerto_article_comments');
	}
	
	public function index() {
		if (have_posts()) {
			while (have_posts()){
				the_post();
				$this->article();
			}
		}
	}

	public function single() {
		if (have_posts()) {
			while (have_posts()){
				the_post();
				$this->article();
			}
		}
	}

	public function home() {}
	public function frontpage() {}
	public function feed() {}
	public function page() {}
	public function archive() {}
	public function category() {}
	public function search() {}
	public function tag() {}
	public function notfound() {}
	
}

?>