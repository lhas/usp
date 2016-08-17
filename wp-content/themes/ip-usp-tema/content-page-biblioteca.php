<?php 
	wp_reset_query();
	$args = array (
		'post_type'              => 'biblioteca-destaques',
		'posts_per_page'         => '3',
	);
	$the_query = new WP_Query( $args ); 
?>
<div id="destaque-biblioteca">	
	<?php if ( $the_query->have_posts() ) { ?>
		<div id="destaque-biblioteca-slider" class="liquid-slider">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="row header">
							<div class="col-md-10 col-md-offset-1 ">
								<p class="categoria"><?php the_category(", "); ?></p>
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
		<div class="col-md-2 col-md-offset-1">
			<?php seletorPosts($the_query,null, null, true); ?>
		</div>
	</div>
</div>

<div class="row content biblioteca">
	<div class="col-md-10 col-md-offset-1">

	<?php	while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>

		<div class="row boxes-links">
			<?php if ( is_active_sidebar( 'biblioteca_01' ) ) : ?>
				<?php dynamic_sidebar( 'biblioteca_01' ); ?>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'biblioteca_02' ) ) : ?>
				<?php dynamic_sidebar( 'biblioteca_02' ); ?>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'biblioteca_03' ) ) : ?>
				<?php dynamic_sidebar( 'biblioteca_03' ); ?>
			<?php endif; ?>
		</div>
	</div>
</div><!--  row  -->
