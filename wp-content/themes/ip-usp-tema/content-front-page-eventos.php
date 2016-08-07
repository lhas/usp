<?php 
	wp_reset_query();
	$args = array (
		'post_type'              => array( 'evento' ),
		'posts_per_page'         => '3',
		'order'                  => 'ASC',
		'orderby'                => 'date',
		'post_status' 			 => 'future',
	);
	$the_query = new WP_Query( $args ); 
?>
<div class="row header">
	<div class="col-xs-2 seletor-holder">
		<?php seletorPosts($the_query, "eventos-slider"); ?>
	</div>
	<div class="col-xs-10 titulo">
		<h1>Eventos</h1>
	</div>
</div>
<?php if ( $the_query->have_posts() ) { ?>
	<div id="eventos-slider" class="liquid-slider">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div>
				<?php if ( get_field( 'imagem_de_busca') ): ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="row">
							<div class="col-xs-2 metainfo">
								<div class="data">
									<strong>
										<img src="<?php bloginfo('template_url'); ?>/imgs/icon-evento.png" /><br>
										<?php the_date('d\<\b\r\/\>M\<\b\r\/\>Y','',''); ?>
									</strong>
								</div>
							</div>
							<div class="col-xs-8 resumo">
								<?php if ( get_field( 'imagem_de_busca') ): ?>
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo get_field( 'imagem_de_busca') ?>" alt="<?php the_title(); ?>" width="300" height="225">
									</a>
								<?php endif; ?>
								<p class="categoria"><?php the_category(", "); ?></p>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="metainfo">
									<ul class="list-inline tags">
										<?php the_tags( '<li>#', '</li><li>#', '</li>' ); ?>
									</ul>
								</div>
								<div class="local"><i class="fa fa-2x fa-map-marker"></i> <span>Auditório Carolina Bori – Instituto de Psicologia</span></div>
							</div>
						</div><!--  row  -->
					</article>
				<?php else: ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="row">
							<div class="col-xs-2 metainfo">
								<div class="data">
									<strong>
										<img src="<?php bloginfo('template_url'); ?>/imgs/icon-evento.png" /><br>
										<?php the_date('d\<\b\r\/\>M\<\b\r\/\>Y','',''); ?>
									</strong>
								</div>
							</div>
							<div class="col-xs-8 resumo">
								<p class="categoria"><?php the_category(", "); ?></p>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="metainfo">
									<ul class="list-inline tags">
										<?php the_tags( '<li>#', '</li><li>#', '</li>' ); ?>
									</ul>
								</div>
								<div class="local"><i class="fa fa-2x fa-map-marker"></i> <span>Auditório Carolina Bori – Instituto de Psicologia</span></div>
							</div>
						</div><!--  row  -->
					</article>

					<?php $the_query->the_post(); ?>

					<p>&nbsp;</p>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="row">
							<div class="col-xs-2 metainfo">
								<div class="data">
									<strong>
										<img src="<?php bloginfo('template_url'); ?>/imgs/icon-evento.png" /><br>
										<?php the_date('d\<\b\r\/\>M\<\b\r\/\>Y','',''); ?>
									</strong>
								</div>
							</div>
							<div class="col-xs-8 resumo">
								<p class="categoria"><?php the_category(", "); ?></p>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="metainfo">
									<ul class="list-inline tags">
										<?php the_tags( '<li>#', '</li><li>#', '</li>' ); ?>
									</ul>
								</div>
								<div class="local"><i class="fa fa-2x fa-map-marker"></i> <span>Auditório Carolina Bori – Instituto de Psicologia</span></div>
							</div>
						</div><!--  row  -->
					</article>
				<?php endif; ?>
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