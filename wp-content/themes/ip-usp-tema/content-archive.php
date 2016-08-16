<?php if ( have_posts() ) { ?>
	
	<?php while ( have_posts() ) : the_post(); ?>
		
		<article <?php post_class(array("item")); ?> style="opacity: 0;">
			<?php if ( get_field( 'imagem_de_busca') ): ?>
			<div class="text-center">
				<a href="<?php the_permalink(); ?>">
					<img src="<?php echo get_field( 'imagem_de_busca') ?>" alt="<?php the_title(); ?>" width="300" height="225">
				</a>
			</div>
			<?php endif ?>
			<div class="content">
				<?php if ( get_post_type() != 'evento' ): ?>
					<p class="categoria"><?php the_category(", "); ?></p>
				<?php endif; ?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<?php if( get_post_type() == 'noticia' ): ?>
					<div class="data"><img src="<?php bloginfo('template_url'); ?>/imgs/icon-noticia.png" /> <?php the_date('d M Y','',''); ?></div>
				<?php elseif( get_post_type() == 'evento' ): ?>
					<div class="data"><img src="<?php bloginfo('template_url'); ?>/imgs/icon-evento.png" /> <?php the_field('data'); ?></div>
				<?php endif ?>

				<div class="post-type">
					<?php 
						echo get_post_type_object( get_post_type( ) )->labels->singular_name; 
					?>
				</div>

			</div>
		</article>

	<?php endwhile; // end of the loop. ?>
	
	
<?php } else { ?>
	<article style="width: 100%; height: 300px; float: left;">
		<h2 style="font-size: 20px;">Infelizmente não encontramos nenhum resultado para <strong><?php echo $_GET['s']; ?></strong></h2>
		<br>
		<p>
		Procure por outros termos para encontrar o que está buscando. <br>
		Obrigado.</p>
	</article>
<?php }
	/* Restore original Post Data */
	wp_reset_query();
?>