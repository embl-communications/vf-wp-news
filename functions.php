<?php

// CHILD THEME CSS FILE
// 
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; 
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}


// POST THUMBNAILS
// 
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

// ESTIMATED READING TIME 
// 
function reading_time() {
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);
		if ($readingtime == 1) {
	$timer = " min";
		} else {
	$timer = " min";
}
	$totalreadingtime = $readingtime . $timer;
		return $totalreadingtime;
}

if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

//ASSIGNING CLASSES TO CATEGORIES
//
add_filter('wp_list_categories', 'add_slug_class_wp_list_categories');
function add_slug_class_wp_list_categories($list) {

    $cats = get_categories('hide_empty=0');
    foreach($cats as $cat) {
        $find = 'cat-item-' . $cat->term_id . '"';
        $replace = 'cat-item-' . $cat->slug . ' cat-item-' . $cat->term_id . '"';
        $list = str_replace( $find, $replace, $list );
        $find = 'cat-item-' . $cat->term_id . ' ';
        $replace = 'cat-item-' . $cat->slug . ' cat-item-' . $cat->term_id . ' ';
        $list = str_replace( $find, $replace, $list );
    }

    return $list;
}

 ?>


<?php 

// POPULAR POSTS
// 
function shapeSpace_popular_posts($post_id) {
	$count_key = 'popular_posts';
	$count = get_post_meta($post_id, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '0');
	} else {
		$count++;
		update_post_meta($post_id, $count_key, $count);
	}
}

function shapeSpace_track_posts($post_id) {
	if (!is_single()) return;
	if (empty($post_id)) {
		global $post;
		$post_id = $post->ID;
	}
	shapeSpace_popular_posts($post_id);
}
add_action('wp_head', 'shapeSpace_track_posts');

//GET THE AVATAR
//
function get_avatar_img_url() {
  $user_email = get_the_author_meta( 'user_email' );
 
  $url = 'http://gravatar.com/avatar/' . md5( $user_email );
  $url = add_query_arg( array(
    's' => 80,
    'd' => 'mm',
  ), $url );
  return esc_url_raw( $url );
}

//ADDING CLASS TO CATEGORY
//
function add_class_to_category( $thelist, $separator, $parents){
    $class_to_add = 'vf-link';
    return str_replace('<a href="',  '<a class="'. $class_to_add. '" href="', $thelist);
}

add_filter('the_category', __NAMESPACE__ . '\\add_class_to_category',10,3);

?>