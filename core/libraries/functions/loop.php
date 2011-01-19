<?php
/**
 * Concerto LOOP API
 *
 * This is the base class for calling loops within concerto. Simple extend the class and call it
 * on the loop hook and you can easily customize your loops
 */
class ConcertoLoop {
	
	/**
	 * Constructor
	 *
	 * Must be initialized by the child class by using parent::__construct();
	 * this will perform the necessary things to call on your child class.
	 */
	public function __construct() {
		if (CONCERTO_CONFIG_CUSTOM) {
			$this->custompage();
		} else {
			if (have_posts()) {
				if (is_single()) {
					$this->single();
				} else if (is_page()) {
					$this->page();
				} else if (is_search()) {
					$this->search();
				} else if (is_archive() && !is_category() && !is_tag()) {
					$this->archive();
				} else if (is_category()) {
					$this->category();
				} else if (is_tag()) {
					$this->tag();
				} else {
					$this->index();
				}
			} else if (is_404()) {
				$this->fourohfour();
			} else {
				$this->nothing();
			}
		}
	}
	
	/**
	 * Article
	 *
	 * The article being looped. You can customize this by calling a different file.
	 */
	public function article($context = null) {
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
			case "404":
				$article = '404';
			break;
			case "nothing":
				$article = 'nothing';
			break;
			case "index":
			default;
				$article = 'index';
			break;
		}
		require CONCERTO_HTML_DIR . $article . '.php';
	}
	
	/**
	 * Custom Page
	 *
	 * A custom page for the user
	 */
	public function custompage() {
		require CONCERTO_HTML_DIR . 'custom_page.php';
	}
	
	/**
	 * Index
	 *
	 * Loops the index Page. nothing fancy
	 */
	public function index() {
		while (have_posts()){
			the_post();
			$this->article('index');
		}
	}
	
	/**
	 * Single
	 *
	 * Gets the entry for the requested post
	 */
	public function single() {
		while (have_posts()){
			the_post();
			$this->article('single');
		}
	}
	
	/**
	 * Page
	 *
	 * Gets the entry for the requested page
	 */
	public function page() {
		while (have_posts()) {
			the_post();
			$this->article('page');
		}
	}
	
	/**
	 * Search
	 *
	 * Loops the result from your Request query.
	 */
	public function search() {
		echo '<h2 class="context-title">Search Results for "' . get_search_query() . '"</h2>';
		while (have_posts()) {
			the_post();
			$this->article('search');
		}
	}
	
	/**
	 * Archive
	 *
	 * Loops the entries from your Archive
	 */
	public function archive() {
		$title = '';
		if (is_author()) {
			$title = 'by ' . wp_title('', false);
		} else if (is_month()) {
			$title = 'on' . single_month_title(' ', false);
		}
	
		echo '<h2 class="context-title">All posts ' . $title . '</h2>';
		while (have_posts()) {
			the_post();
			$this->article('archive');
		}
	}
	
	/**
	 * Category
	 *
	 * Gets the entries for the Category page
	 */
	public function category() {
		echo '<h2 class="context-title">You are browsing "';
		single_cat_title();
		echo '"</h2>';
		while (have_posts()) {
			the_post();
			$this->article('category');
		}
	}
	
	/**
	 * Tag
	 *
	 * Gets the entries for the Tag page
	 */
	public function tag() {
		echo '<h2 class="context-title">You are browsing "';
		single_tag_title();
		echo '"</h2>';
		while (have_posts()) {
			the_post();
			$this->article('tag');
		}
	}
	
	/**
	 * 404
	 *
	 * Returns the 404 page
	 */
	public function fourohfour() {
		$this->article('404');
	}
	
	/**
	 * Nothing
	 *
	 * Returns when there are no results to show
	 */
	public function nothing() {
		$this->article('nothing');
	}
	
}

?>