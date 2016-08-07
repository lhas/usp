<?php 
	wp_reset_query();
	$args = array (
		'post_type'              => array( 'noticia' ),
		'posts_per_page'         => '2',
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'category__not_in'  	 => '-255,-24',
		'offset' => '3',
	);
	$the_query = new WP_Query( $args ); 
?>

<?php if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
		<article <?php post_class(array("item col-md-6")); ?>>
			<div class="content">
				<p class="categoria"><?php the_category(", "); ?></p>
				<?php if ( get_field( 'imagem_de_busca') ): ?>
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo get_field( 'imagem_de_busca') ?>" alt="<?php the_title(); ?>" width="300" height="225">
						</a>
					<?php endif; ?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="linhafina"><?php echo get_post_meta('linhafina'); ?></div>
			</div>
		</article>

	<?php endwhile; // end of the loop. ?>
<?php } else { ?>
	<article>
		
	</article>
<?php }
	/* Restore original Post Data */
	wp_reset_query();
?>

<br style="clear:both;">