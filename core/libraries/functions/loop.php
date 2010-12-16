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
					} else if (is_page()) {
						$this->page();
					} else if (is_search()) {
						$this->search();
					}  else if (is_archive()) {
						$this->archive();
					}  else if (is_category()) {
						$this->category();
					}  else if (is_tag()) {
						$this->tag();
					} else {
						$this->index();
					}
				}
			}
		}
	}
	
	public function article($context = null) {
		$article = 'index';
		switch ($context) {
			case "single":
				$article = 'single';
			break;
			case "page":
				$article = 'page';
			break;
			case "search":
				$article = 'search';
			break;
			case "archive":
				$article = 'archive';
			break;
			case "category":
				$article = 'category';
			break;
			case "tag":
				$article = 'tag';
			break;
			case "index":
			default;
				$article = 'index';
			break;
		}
		require CONCERTO_HTML_DIR . $article . '.php';
	}
	
	public function custompage() {
		require CONCERTO_HTML_DIR . 'custom_page.php';
	}
	
	public function index() {
		$this->article('index');
	}

	public function single() {
		$this->article('single');
	}
	
	public function page() {
		$this->article('page');
	}
	
	public function search() {
		$this->article('search');
	}
	
	public function archive() {
		$this->article('archive');
	}
	
	public function category() {
		$this->article('category');
	}
	
	public function tag() {
		$this->article('tag');
	}
	
}

?>