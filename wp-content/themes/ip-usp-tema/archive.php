<?php
/**
 * The template for displaying Archive Results pages.
 *
 * @package unite
 */

get_header(); ?>
	
	<div class="container conteudo conteudo-archive">
		<div class="resultados">
			<?php get_template_part( 'content', 'archive' ); ?>
		</div>

		<div class="text-center ver-mais" <?php if($wp_query->post_count < 10): ?> style="display:none;"<?php endif; ?>>
			<a href="http://143.107.57.235/site/?page_id=6895" class="post-link btn btn-primary btn-laranja" data-load=".conteudo-archive .resultados" data-offset="1" data-cat="<?php echo get_the_category()[0]->slug; ?>">Ver Mais</a>
		</div>
		
	</div>

<?php get_footer(); ?>