<?php

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

require_once( get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
require_once( get_template_directory() . '/inc/customizer.php' );

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

function post_type_category_tag_search( $query ) {
    if ( ($query->is_category() || $query->is_tag() || $query->is_search()) && $query->is_main_query() && !is_admin()) {
        $query->set( 'post_type', 'any' );
        $query->set( 'posts_per_page', '10');
        //$query->set('post_status', 'future');
    }
    if (!is_admin() && is_page_template("page-ajax-archive.php")) {
   		$query->set( 'post_type', 'any' );
       	$query->set( 'posts_per_page', '10');
       	//$query->set( 'post_status', 'future');
    }
}
add_action( 'pre_get_posts', 'post_type_category_tag_search' );

function register_footer_widgets() {

	register_sidebar( array(
		'name'          => 'Footer 01',
		'id'            => 'footer_01',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 02',
		'id'            => 'footer_02',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 03',
		'id'            => 'footer_03',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 04',
		'id'            => 'footer_04',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
	) );

}
add_action( 'widgets_init', 'register_footer_widgets' );

function register_biblioteca_widgets() {

	register_sidebar( array(
		'name'          => 'Biblioteca 01',
		'id'            => 'biblioteca_01',
		'before_widget' => '<div class="col-md-4 box-branco">',
		'after_widget'  => '</div>',
		'before_title' => '<h4>',
		'after_title' => '<h4>',
	) );
	register_sidebar( array(
		'name'          => 'Biblioteca 02',
		'id'            => 'biblioteca_02',
		'before_widget' => '<div class="col-md-4 box-branco">',
		'after_widget'  => '</div>',
		'before_title' => '<h4>',
		'after_title' => '<h4>',
	) );
	register_sidebar( array(
		'name'          => 'Biblioteca 03',
		'id'            => 'biblioteca_03',
		'before_widget' => '<div class="col-md-4 box-branco">',
		'after_widget'  => '</div>',
		'before_title' => '<h4>',
		'after_title' => '<h4>',
	) );

}
add_action( 'widgets_init', 'register_biblioteca_widgets' );

function register_menus(){
	register_nav_menus( array('primary' => __( 'Menu Primário', 'the-next' ), ));    
	register_nav_menus( array('secondary' => __( 'Menu Secundário', 'the-next' ), ));
	register_nav_menus( array('biblioteca' => __( 'Menu Biblioteca', 'the-next' ), ));
}
add_action( 'after_setup_theme', 'register_menus' );


function seletorPosts($the_query, $name = null, $force_total = null, $change_crop = false){
	$i = 0;
	echo '<ul class="list-inline seletor">';

		if(empty($force_total)) {
			while ( $the_query->have_posts() ) : $the_query->the_post(); 
				if ($the_query->current_post == 0) {

					if(!$change_crop) {
						echo '<li class="active">';
					} else {
						echo '<li class="active changeCrop">';
					}

					echo '<a href="javascript:void(0);" data-seletor="'.$i.'">';
					echo '<i class="fa fa-circle"></i>';
					echo '</a>';
					echo '</li>';
				} else {

					if(!$change_crop) {
						echo '<li class="">';
					} else {
						echo '<li class="changeCrop">';
					}
					
					echo '<a href="javascript:void(0);" data-seletor="'.$i.'">';
					echo '<i class="fa fa-circle"></i>';
					echo '</a>';
					echo '</li>';
				}
			$i++;
			endwhile;
		} else {
			echo '<li class="active"><a href="javascript:void(0);" data-seletor="'.$i.'"><i class="fa fa-circle"></i></a></li>';
			for($i = 1; $i< $force_total; $i++) {
				echo '<li><a href="javascript:void(0);" data-seletor="'.$i.'"><i class="fa fa-circle"></i></a></li>';
			}
		}
	echo '</ul>';

}

function set_custom_bg($page_id = null){

	if(empty($page_id)) {
		$page_id = get_queried_object_id();
	}


	if ( has_post_thumbnail( $page_id ) && $page_id > 0 ) :
	    $image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );
	    $image = $image_array[0];
	else :
	    $image = get_template_directory_uri() . '/imgs/bg-teste.jpg';
	endif;
	return $image;
}

/* Função para contabilizar posts populares */
function wpb_set_post_views($postID) {
	$count_key = 'wpb_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/* Função que adiciona hook para contabilizar views populares */
function wpb_track_post_views ($post_id) {
	if ( !is_single() ) return;
	if ( empty ( $post_id) ) {
		global $post;
		$post_id = $post->ID;    
	}
	wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

// Bootstrap pagination function

function wp_bs_pagination($pages = '', $range = 4){  
	$showitems = ($range * 2) + 1;  
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == ''){
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
		if(!$pages){
			$pages = 1;
		}
	}   

	if(1 != $pages){
		echo '<div class="text-center">'; 
		echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">Página '.$paged.' de '.$pages.'</span></span></li>';
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' aria-label='Primeira'>&laquo;<span class='hidden-xs'> Primeira</span></a></li>";
		if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Anterior'>&lsaquo;<span class='hidden-xs'> Anterior</span></a></li>";

		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? "<li class=\"active\"><span>".$i." <span class=\"sr-only\">(current)</span></span>
				</li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Próximo'><span class='hidden-xs'>Próximo </span>&rsaquo;</a></li>";  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Última'><span class='hidden-xs'>Última </span>&raquo;</a></li>";

		echo "</ul></nav>";
		echo "</div>";
	}
}

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
}

function change_wp_search_size($query) {
    if ( $query->is_search ) // Make sure it is a search page
        $query->query_vars['posts_per_page'] = 9999; // Change 10 to the number of posts you would like to show

    return $query; // Return our modified query variables
}
add_filter('pre_get_posts', 'change_wp_search_size');