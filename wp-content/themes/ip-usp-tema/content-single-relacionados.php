<div class="row relacionados">
	<div class="col-md-12 titulo">
		<h2>
		<?php if ('evento' == get_post_type() ) : ?>
			Próximos eventos
		<?php else: ?>
			Noticias Relacionadas
		<?php endif; ?>
		</h2>
	</div>
	
<?php 
	wp_reset_query();
	
	if ('noticia' == get_post_type() ){
		$args = array(
			'post_type'				 => 'noticia',
			'posts_per_page'         => '3',
			'order'                  => 'DESC',
			'orderby'                => 'date',
			'post__not_in' => array(get_the_ID()),
		);		
	} else if ('evento' == get_post_type() ){
		$args = array(
			'post_type'              => 'evento',
			'post_status' 			 => 'future',
			'posts_per_page'         => '3',
			'order'                  => 'ASC',
			'orderby'                => 'date',
			'post__not_in' => array(get_the_ID()),
		);
	}
	
	
	/* Muda o post_type se for evento. Layout é idêntico, */
	
	
	$the_query = new WP_Query( $args );

?>


<?php if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class( array("col-md-4") ); ?>>
		<p class="categoria"><?php the_category(", "); ?></p>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	</article>
		
	<?php endwhile; // end of the loop. ?>
<?php } else { ?>
	<article class="col-md-12">
		<p>Nenhum relacionado.</p>
	</article>
<?php }
	/* Restore original Post Data */
	wp_reset_query();
?>

</div>