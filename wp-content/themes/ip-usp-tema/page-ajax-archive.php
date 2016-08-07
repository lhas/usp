<?php 
/**
 * @package unite
 * Template Name: Ajax - Archive
 */

	$args = array (
		'offset'				 => intval($_GET['offset']) * 10,
		'posts_per_page'         => '10',
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'post_type' 			 => 'any',
	);
	if (isset($_GET['cat'])){
		$args['category_name'] = $_GET['cat'];
	}
	if (isset($_GET['search'])) {
		$args['s'] = $_GET['search'];
	}

	$the_query = new WP_Query( $args );

	

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
		<article <?php post_class(array("item")); ?> style="opacity:0;">
			<?php if ( get_field( 'imagem_de_busca') ): ?>
			<div class="text-center">
				<a href="<?php the_permalink(); ?>">
					<img src="<?php echo get_field( 'imagem_de_busca') ?>" alt="<?php the_title(); ?>" width="300" height="225">
				</a>
			</div>
			<?php endif ?>
			<div class="content">
				<p class="categoria"><?php the_category(", "); ?></p>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-type">
					<?php 
						echo get_post_type_object( get_post_type( ) )->labels->singular_name; 
					?>
				</div>						
			</div>
		</article>

		<?php endwhile; // end of the loop. ?>
	<?php } else { ?>
		false
	<?php } ?>