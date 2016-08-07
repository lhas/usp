<?php 
/**
 * @package unite
 * Template Name: Ajax - Eventos
 */

	$args = array (
		'offset'				 => (intval($_GET['offset']) * 5),
		'posts_per_page'         => '5',
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'post_type' 			 => 'evento'
	);

	if (isset($_GET['post_status'])) {
		$args['post_status'] = 'future';
		$args['order'] = 'ASC';
		$args['offset'] = 3 + (intval($_GET['offset']) * 5);
	}

	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
		<article class="row">
			<div class="resumo <?php if (has_post_thumbnail()): ?> col-md-9 <?php else: ?> col-md-12 <?php endif; ?>">
				<p class="categoria"><?php the_category(", "); ?></p>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="data">
					<img src="<?php bloginfo('template_url'); ?>/imgs/icon-evento.png" /><?php the_date('d M Y','',''); ?>
				</div>
			</div>
		</article>					
		<?php endwhile; // end of the loop. ?>
	<?php } else { ?>
		<article>
			<p>Nenhum resultado.</p>
		</article>
	<?php } ?>