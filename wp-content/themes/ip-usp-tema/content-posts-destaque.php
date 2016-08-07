<?php if (in_array ('noticia', array_keys($wp_query->query) ) ) : ?>

	<?php 
		wp_reset_query();
		$args = array (
			'post_type'              => array( 'noticia' ),
			'posts_per_page'         => '3',
			'order'                  => 'DESC',
			'orderby'                => 'date',
		);
		$the_query = new WP_Query( $args ); 
	?>

	<?php if ( $the_query->have_posts() ) { ?>
		<div id="destaque-posts-slider" class="liquid-slider">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>			
			<div>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row header">
						<div class="col-md-12 ">
							<p class="categoria"><?php the_category(", "); ?></p>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-10">
							<div class="linhafina"><?php the_excerpt(); ?></div>
						</div>
					</div>
				</article>
			</div>
		<?php endwhile; // end of the loop. ?>
		</div>
	<?php } else { ?>
		<article>
			<p>Nenhuma notícia recente.</p>
		</article>
	<?php }
		/* Restore original Post Data */
		wp_reset_query();
	?>

	<div class="row seletor-holder">
		<div class="col-md-2">
			<?php seletorPosts($the_query); ?>
		</div>
	</div>
		
<?php elseif (in_array ('evento', array_keys($wp_query->query) ) ) : ?>

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
	
	<?php if ( $the_query->have_posts() ) { ?>
		<div id="destaque-posts-slider" class="liquid-slider">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<div class="row header">
							<div class="col-md-12">
								<p class="categoria"><?php the_category(", "); ?></p>
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="data">
									<img src="<?php bloginfo('template_url'); ?>/imgs/icon-evento.png" alt=""><?php the_date('d M Y','',''); ?>
								</div>
							</div>
						</div>
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

	<div class="row seletor-holder">
		<div class="col-md-2">
			<?php seletorPosts($the_query); ?>
		</div>
	</div>

<?php endif; ?>