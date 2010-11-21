<?php

class ConcertoLoop {
	
	public function __construct() {
		// We are operating in a Custom page
		if (CONCERTO_CONFIG_CUSTOM) {
			$this->custompage();
		} else { // Normal Loop
			if (have_posts()) {
				while (have_posts()){
					the_post();
					if (is_single()) {
						$this->single();
					} else {
						$this->index();
					}
				}
			}
		}
	}
	
	public function article($context = null) {
		require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'article.php';
	}
	
	public function custompage() {
		require CONCERTO_HTML . CONCERTO_CONFIG_HTML . _DS . 'custom_page.php';
	}
	
	public function index() {
		$this->article('index');
	}

	public function single() {
		$this->article('single');
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