<?php

//	Allows you to insert items
//	after post somewhat gracefully
//	Post 1 is after post 1
//	Post 2 is after post 2
function betweenPosts($numPost) {

	$sContent = '';

	switch ($numPost) {
		
		case 1:
			$sContent = 'between-ad';
			break;
	}

	if ($sContent) {
		echo('<div class="entry">');
		
		if ($sContent == 'between-ad') {
			include('ad-between.php');
		} else {
			echo($sContent);
		}
		
		echo('</div>');
	}
}

//	Returns a smart title
function get_seosense_title() {

	if (is_single() || is_page()) {
		wp_title('');
	} else {
		if (is_category()) {
			$cat_desc = trim(strip_tags(category_description()));
			echo($cat_desc ? $cat_desc : single_cat_title('', false));
		} else {
			if ($_GET['tag'])
				echo($_GET['tag'] . " - Tag");
			else
				bloginfo('description');		
		}
	}
	echo(" - ");
	bloginfo('name');

}

?>