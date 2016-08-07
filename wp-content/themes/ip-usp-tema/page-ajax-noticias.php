<?php 
/**
 * @package unite
 * Template Name: Ajax - Noticias
 */

	$args = array (
		'offset'				 => 3 + (intval($_GET['offset']) * 5),
		'posts_per_page'         => '5',
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'post_type' 			 => 'noticia'
	);

	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class( array("row") ); ?>>
			<div class="resumo col-md-12">
				<p class="categoria"><?php the_category(", "); ?></p>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="linhafina"><?php the_excerpt(); ?></p>
			</div>
			<?php if ( get_field( 'imagem_de_busca') ): ?>
				<a href="<?php the_permalink(); ?>">
					<img src="<?php echo get_field( 'imagem_de_busca') ?>" alt="<?php the_title(); ?>" width="300" height="225">
				</a>
			<?php endif; ?>
		</article>				
		<?php endwhile; // end of the loop. ?>
	<?php } else { ?>
		<article>
			<p>Nenhum resultado.</p>
		</article>
	<?php } ?>