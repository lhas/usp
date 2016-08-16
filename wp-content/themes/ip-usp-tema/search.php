<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package unite
 */

get_header(); ?>

	<div class="container conteudo conteudo-search">
		<div class="resultados">
			<?php get_template_part( 'content', 'archive' ); ?>
		</div>
		
		<div class="text-center ver-mais" <?php if($wp_query->post_count < 10): ?> style="display:none;"<?php endif; ?>>
			<a href="<?php echo get_permalink(6895); ?>" class="post-link btn btn-primary btn-laranja" data-load=".conteudo-archive .resultados" data-offset="1" data-cat="<?php echo get_the_category()[0]->slug; ?>">Ver Mais</a>
		</div>
	</div><!--  container  -->

<?php get_footer(); ?>
