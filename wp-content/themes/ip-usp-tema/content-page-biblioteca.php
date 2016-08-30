<?php 
	wp_reset_query();
	$args = array (
		'post_type'              => 'biblioteca-destaques',
		'posts_per_page'         => '3',
	);
	$the_query = new WP_Query( $args );

	if(is_single(112)) {
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
								
									<?php if(get_field('link_externo')) : ?>
										<h1><a href="<?php echo get_field('link_externo'); ?>" target="_blank"><?php the_title(); ?></a></h1>
									<?php else: ?>
										<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									<?php endif; ?>
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
<?php 
	} else { ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="header row">
				<div class="col-md-10 col-md-offset-1">
					<p class="categoria"><?php the_category(", "); ?></p>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<!-- <p class="linhafina"><?php the_excerpt(); ?></p> -->
				</div>
			</div><!--  row  -->
			<?php if(!empty(get_the_tags())) : ?>
			<div class="row metainfo">
				<div class="col-md-10 col-md-offset-1">
					<ul class="list-inline tags">
						<?php the_tags( '<li>#', '</li><li>#', '</li>' ); ?>
					</ul>
				</div>
			</div><!--  row  -->
			<?php endif; ?>
		</article>

	<?php } ?>

<div class="row content biblioteca">
	<div class="col-md-10 col-md-offset-1">

	<?php	while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>

	<?php 
	if(is_single(112)) { ?>

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

		<?php } ?>

	</div>
</div><!--  row  -->
