<?php if ( have_posts() ) {
	while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="header row">
				<div class="col-md-10 col-md-offset-1">
					<p class="categoria"><?php the_category(", "); ?></p>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<!-- <p class="linhafina"><?php the_excerpt(); ?></p> -->
				</div>
			</div><!--  row  -->
			<div class="row metainfo">
				<div class="col-md-10 col-md-offset-1">
					<ul class="list-inline tags">
						<?php the_tags( '<li>#', '</li><li>#', '</li>' ); ?>
					</ul>
				</div>
			</div><!--  row  -->
			<div class="row content">
				<div class="col-md-10 col-md-offset-1">
					<?php the_content(); ?>
				</div>
			</div><!--  row  -->
		</article>
		
	<?php endwhile; // end of the loop. ?>

	<?php get_template_part( 'content', 'single-relacionados' ); ?>
	
<?php } else { ?>
	<article>
		<p>Nenhuma notícia.</p>
	</article>
<?php } ?>