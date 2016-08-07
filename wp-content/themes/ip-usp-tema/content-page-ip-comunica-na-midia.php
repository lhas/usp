<?php 
	wp_reset_query();
	$args = array (
		'post_type' => array( 'any' ),
		'posts_per_page' => '3',
		'order' => 'DESC',
		'orderby' => 'date',
		'category__in'  	 => '24',
	);
	$the_query = new WP_Query( $args ); 
?>

<div class="row header">
	<div class="col-md-2 seletor-holder">
		<?php seletorPosts($the_query); ?>
	</div>
	<div class="col-md-10 titulo">
		<h1>IP Na Mídia</h1>
	</div>
</div>
<?php if ( $the_query->have_posts() ) { ?>
	<div id="na-midia-slider" class="liquid-slider">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row">
						<div class="col-md-2 metainfo">
							<div class="data">
								<strong>
									<img src="<?php bloginfo('template_url'); ?>/imgs/icon-evento.png" /><br>
									<?php the_date('d\<\b\r\/\>M\<\b\r\/\>Y','',''); ?>
								</strong>
							</div>
						</div>
						<div class="col-md-8 resumo">
							<?php if ( get_field( 'imagem_de_busca') ): ?>
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo get_field( 'imagem_de_busca') ?>" alt="<?php the_title(); ?>" width="300" height="225">
								</a>
							<?php endif; ?>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="metainfo">
								<ul class="list-inline tags">
									<?php the_tags( '<li>#', '</li><li>#', '</li>' ); ?>
								</ul>
							</div>
							<div class="local"><p><i class="fa fa-2x fa-newspaper-o"></i> Revista fapesp, maio 2015</p></div>
						</div>
					</div><!--  row  -->
				</article>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div>
<?php } else { ?>
	<article>
		<p>Nenhum evento recente.</p>
	</article>
<?php }
	/* Restore original Post Data */
	wp_reset_query();
?>